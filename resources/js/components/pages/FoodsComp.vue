<template>
    <div>
        <div class="jumbotron">
            <div class="container">
                <h1>Burgers & Fries</h1>
            </div>
        </div>

    <div class="mt-5 container">
        <nav class="navbar navbar-expand-lg top shadow-lg">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li>
                        <a class="nav-link" href="#">Logo Restaurant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active px-0" href="#">Pizza</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-0" href="#">Sides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-0" href="#">Drinks</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link px-0" href="#">Dessert</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="foods container py-4 py-sm-5">
            <h2 class="text-center pt-2 pt-sm-0 mb-sm-5">Pizza</h2>
            <div class="row pt-3 pt-sm-0">
                <FoodItem />
                <FoodItem />
                <FoodItem />
                <FoodItem />
                <FoodItem />
                <FoodItem />
                <FoodItem />
                <FoodItem />
            </div>
        </div>
    </div>
</div>
</template>
<script>
import FoodItem from './FoodItem.vue';
export default {
    name: "FoodsComp",
    components: { FoodItem }
}
</script>
<style lang="scss" scoped>
    .jumbotron{
        position: relative;
        padding: 150px 0 0 0;
        margin: 0;
        border-radius: 0;
        background-color: rgb(170, 0, 0);
        color: white;
        height: 250px;
        background-image: url(/* INSERIRE IMMAGINE DI SFONDO QUI!!! */);
        background-size: cover;
        h1{
            font-weight: bolder;
        }
    }
    .top{
        background-color: #fff;
        max-width: 1260px;
        height: 96px;
        padding: 0px 15px;
        border-radius: 10px;
        li{
            margin: 0px 20px;
            a{
                color: darkslategray;
                font-size: 16px;
                font-weight: 400;
                &:hover{
                     color: red;
                }
            }
            .active{
                color: red;
                border-bottom: 1px solid red;
            }
        }
    }
    .foods{
        max-width: 1280px;
    }
</style>
