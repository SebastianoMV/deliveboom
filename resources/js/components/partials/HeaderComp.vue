<template>
    <header>
        <!-- <nav class="container navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Cucina <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <ul class="d-flex list-unstyled mb-0">
                    <li><router-link :to="{name: 'home'}" class="navigation-list-element"><i class="fa-solid fa-house"></i></router-link></li>
                    <li><router-link :to="{name: 'cart'}" class="navigation-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link></li>
                    <li><a href="/admin" class="navigation-list-element"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                </ul>
            </div>
        </nav> -->
        <div class="container header-container">
            <div class="top-header">
                <h1 class="logo">Deliveb<i class="fa-solid fa-bomb fix-bomb"></i><i class="fa-solid fa-bomb fix-bomb"></i>m</h1>
                <ul class="header-btns d-md-flex d-none">
                    <li><router-link :to="{name: 'home'}" class="navigation-list-element"><i class="fa-solid fa-house"></i></router-link></li>
                    <li><router-link :to="{name: 'cart'}" class="navigation-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link></li>
                    <li><a href="/admin" class="navigation-list-element"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                </ul>
                <i
                    class="hamburger-menu fa-solid fa-bars d-md-none d-block"
                    @click="activeMenu = !activeMenu"></i>
            </div>
            <div
                class="header-dropdown-menu d-md-none d-block"
                :class="activeMenu ? 'active':''">
                <ul class="dropdown-btns">
                    <li><router-link :to="{name: 'home'}" class="dropdown-list-element"><i class="fa-solid fa-house"></i></router-link></li>
                    <li><router-link :to="{name: 'cart'}" class="dropdown-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link></li>
                    <li><a href="/admin" class="dropdown-list-element"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                </ul>
            </div>
            <!-- <div class="row">
                <div class="col-md-9 col-12">
                    <h1 class="logo">Deliveb<i class="fa-solid fa-bomb fix-bomb"></i><i class="fa-solid fa-bomb fix-bomb"></i>m</h1>
                </div>
                <ul class="col-md-3 col-12 justify-content-md-end my-md-auto mb-4">
                    <li><router-link :to="{name: 'home'}" class="navigation-list-element"><i class="fa-solid fa-house"></i></router-link></li>
                    <li><router-link :to="{name: 'cart'}" class="navigation-list-element"><i class="fa-solid fa-cart-shopping"></i></router-link></li>
                    <li><a href="/admin" class="navigation-list-element"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                </ul>
            </div> -->
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
            if(this.headerWidth <= 768)
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
                    font-size: 35px;
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
            }
        }
        .header-dropdown-menu{
            -webkit-transition: max-height 1s;
            -moz-transition: max-height 1s;
            -ms-transition: max-height 1s;
            -o-transition: max-height 1s;
            transition: max-height 1s;
            overflow: hidden;
            max-height: 0;
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
