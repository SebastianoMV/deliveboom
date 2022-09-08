<template>
    <header>
        <div class="container header-container">
            <div class="top-header">
                <h1 class="logo">Deliveb<i class="fa-solid fa-bomb fix-bomb"></i><i class="fa-solid fa-bomb fix-bomb"></i>m</h1>
                <ul class="header-btns d-md-flex d-none">
                    <li><router-link :to="{name: 'home'}" class="navigation-list-element"><i class="fa-solid fa-house"></i></router-link></li>

                    <li><router-link :to="{name: 'cart'}" class="navigation-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link></li>
                    <li><a href="/admin" class="navigation-list-element"><i class="fa-solid fa-user"></i></a></li>

                    <li><router-link :to="{name: 'cart'}" class="navigation-list-element"> <span > </span><i class="fa-solid fa-cart-shopping"></i></router-link>
                    </li>
                    <li><a href="/admin" class="navigation-list-element"><i class="fa-solid fa-right-to-bracket"></i></a></li>

                </ul>
                <i
                    class="hamburger-menu fa-solid fa-bars d-md-none d-block"
                    :class="activeMenu ? 'flipped':''"
                    @click="activeMenu = !activeMenu"></i>
            </div>
            <div
                class="header-dropdown-menu"
                :class="activeMenu ? 'active':''"
                v-if="headerWidth <= 768">
                <ul class="dropdown-btns">
                    <li><router-link :to="{name: 'home'}" class="dropdown-list-element"><i class="fa-solid fa-house"></i></router-link></li>

                    <li><router-link :to="{name: 'cart'}" class="dropdown-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link></li>
                    <li><a href="/admin" class="dropdown-list-element"><i class="fa-solid fa-user"></i></a></li>

                    <li><router-link :to="{name: 'cart'}" class="dropdown-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link>
                    </li>
                    <li><a href="/admin" class="dropdown-list-element"><i class="fa-solid fa-right-to-bracket"></i></a></li>

                </ul>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'HeaderComp',
    data(){
        return{
            activeMenu: false,
            headerWidth: document.documentElement.clientWidth,
            cartFlag: false,
            counteritems: '',

        }
    },

    created() {
        window.addEventListener("resize", this.headerWidthHandler);
    },
    destroyed() {
        window.removeEventListener("resize", this.headerWidthHandler);
    },
    methods: {
        headerWidthHandler(){
            this.headerWidth = document.documentElement.clientWidth;
            if(this.headerWidth > 768)
                this.activeMenu = false
        },
        // counter: function(){
        //     setInterval(function () {
        //         this.counteritems = 3
        //     }, 1000);
        // }

    },
    // computed:{
    //     counter(){
    //         return localStorage.getItem('cart') ? true : false
    //     }
    // },

    mounted() {
        console.log(JSON.parse(localStorage.getItem('cart')).length);
    },



}
</script>

<style lang="scss" scoped>
header{
    background: linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,0));
    .header-container{
        width: 100%;
        min-height: 100px;
        color: white;
        transition: .2s all;
        .top-header{
            display: flex;
            justify-content: space-between;
            .logo{
                font-weight: bolder;
                font-size: 37px;
                margin: 25px 0 35px;
                .fix-bomb{
                    margin-left: 1px;
                    margin-right: -8px;
                    transition: .2s color;
                    &:hover{
                        color: #FE3638;
                    }
                }
            }
            .header-btns{
                display: flex;
                margin: auto 0;
                list-style: none;
                column-gap: 30px;
                .navigation-list-element{
                    color: white;
                    text-decoration: none;
                    font-size: 25px;
                    transition: .2s color;
                    &:hover{
                        color: rgb(200, 200, 200);
                    }
                    &:active{
                        color: #FE3638;
                    }
                }
            }
            .hamburger-menu{
                cursor: pointer;
                margin: auto 0;
                font-size: 45px;
                transition: .2s all;
                &:hover{
                    color: rgb(200, 200, 200);
                }
                &:active{
                    color: #FE3638;
                }
                &.flipped{
                    transform: rotate(180deg);
                }
            }
        }
        .header-dropdown-menu{
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -ms-transition: all .5s;
            -o-transition: all .5s;
            transition: all .5s ease-in-out;
            overflow: hidden;
            max-height: 0;
            margin-bottom: 0;
            .dropdown-btns{
                list-style: none;
                padding: 0;
                margin-bottom: 0;
                li{
                    .dropdown-list-element{
                        display: block;
                        opacity: inherit;
                        color: white;
                        text-decoration: none;
                        font-size: 35px;
                        transition: .2s all;
                        margin-bottom: 30px;
                        &:hover{
                            color: rgb(200, 200, 200);
                        }
                        &:active{
                            color: #FE3638;
                        }
                    }
                    &:last-of-type .dropdown-list-element{
                        margin-bottom: 0;
                    }
                }
            }
            &.active{
                margin-bottom: -100px;
                max-height: 500px;
            }
        }
    }
    @media screen and (min-width: 450px) {
        .header-container .top-header .logo{
            font-size: 45px;
            margin: 20px 0 30px;;
        }
    }
}
</style>
