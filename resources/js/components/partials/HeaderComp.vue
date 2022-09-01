<template>
    <header class="">

        <nav class="container navbar navbar-expand-lg navbar-light">
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
                    <li><router-link :to="{name: 'foods'}" class="navigation-list-element"><i class="fa-solid fa-bowl-food"></i></router-link></li>
                    <li><a href="/admin" class="navigation-list-element"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                </ul>

            </div>
        </nav>


    </header>
</template>

<script>
export default {
    name: 'HeaderComp'
}
</script>

<style lang="scss" scoped>
header{
    background-color: bisque;
    .navbar{
        min-height: 100px;
    }
    ul{
        column-gap: 30px;
        .navigation-list-element{
            color: black;
            text-decoration: none;
            font-size: 25px;
            &:hover{
                color: darkred;
            }
        }
    }
}
</style>
