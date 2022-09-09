<template>
    <header
        :class="($route.path === '/carrello' || $route.path === '/checkout') ? 'noJumbo' : ''">
        <div class="container header-container fluid-container">
            <div class="top-header">
                <router-link :to="{name: 'home'}" class="logo-container">
                    <h1 class="logo">Deliveb<i class="fa-solid fa-bomb fix-bomb"></i><i class="fa-solid fa-bomb fix-bomb"></i>m</h1>
                </router-link>
                <ul class="header-btns d-md-flex d-none">
                    <li><router-link :to="{name: 'home'}" class="navigation-list-element"><i class="fa-solid fa-house"></i></router-link></li>
                    <li><router-link :to="{name: 'cart'}" class="navigation-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link></li>
                    <li><a href="/admin" class="navigation-list-element"><i class="fa-solid fa-user"></i></a></li>
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
                    <li><router-link :to="{name: 'home'}" class="dropdown-list-element"><i class="fa-solid fa-house"></i> <h5>Home</h5></router-link></li>
                    <li><router-link :to="{name: 'cart'}" class="dropdown-list-element"><i class="fa-solid fa-cart-shopping"></i> <h5>Carrello</h5></router-link></li>
                    <li><a href="/admin" class="dropdown-list-element"><i class="fa-solid fa-user"></i><h5>Login</h5></a></li>
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
        }
    }
}
</script>

<style lang="scss" scoped>
header{
    background: linear-gradient(rgba(0,0,0,.75), rgba(0,0,0,0));
    .header-container{
        width: 100%;
        min-height: 200px;
        color: white;
        transition: .2s all;
        .top-header{
            display: flex;
            justify-content: space-between;
            .logo-container{
                color: inherit;
                text-decoration: none;
            }
            .logo{
                font-weight: bolder;
                font-size: 37px;
                margin: 25px 0 35px;
                .fix-bomb{
                    margin-left: 1px;
                    margin-right: -8px;
                    transition: .2s color;
                    &:hover{
                        color: #dd3546;
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
                        color: #dd3546;
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
                    color: #dd3546;
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
            background-color: rgba(255, 255, 255, .15);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            box-shadow: 0px 0px 15px black;
            .dropdown-btns{
                list-style: none;
                padding: 0;
                margin-bottom: 0;
                li{
                    padding: 0 20px;
                    .dropdown-list-element{
                        padding: 15px 0;
                        display: flex;
                        // display: flex;
                        align-items: center;
                        width: 100%;
                        opacity: inherit;
                        color: white;
                        text-decoration: none;
                        font-size: 35px;
                        transition: .2s all;
                        border-bottom: 2px solid lightgray;
                        &:hover{
                            color: rgb(200, 200, 200);
                        }
                        &:active{
                            color: #dd3546;
                        }
                        i{
                            width: 100px;
                        }
                        h5{
                            display: inline-block;
                            font-weight: bolder;
                            margin: 0;
                        }
                    }
                    &:last-of-type .dropdown-list-element{
                        margin-bottom: 0;
                        border-bottom: none;
                    }
                }
            }
            &.active{
                max-height: 500px;
            }
        }
    }
    &.noJumbo{
        background: linear-gradient(rgba($color: #ffe4c4, $alpha: .75), rgba(0,0,0,0));
        .header-container{
            color: #dd3546;
            .top-header{
                .logo .fix-bomb:hover{
                    color: #b42d3b;
                }
                .header-btns .navigation-list-element{
                    color: #dd3546;
                    &:hover{
                        color: #b42d3b;
                    }
                    &:active{
                        color: #4E54C8;
                    }
                }
                .hamburger-menu{
                    &:hover{
                        color: #b42d3b;
                    }
                    &:active{
                        color: #4E54C8;
                    }
                }
            }
            .header-dropdown-menu{
                box-shadow: 0px 0px 15px rgb(189, 189, 189);
                .dropdown-btns .dropdown-list-element{
                    color: #dd3546;
                    &:hover{
                        color: #b42d3b;
                    }
                    &:active{
                        color: #4E54C8;
                    }
                }
            }
        }
    }
    @media screen and (min-width: 450px) {
        .header-container .top-header .logo{
            font-size: 45px;
            margin: 20px 0 30px;
        }
    }
}
</style>
