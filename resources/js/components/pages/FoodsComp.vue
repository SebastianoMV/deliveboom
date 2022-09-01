<template>
    <div class="mt-5 container">
        <nav class="navbar navbar-expand-lg top shadow-lg">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
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
</template>
<script>
import FoodItem from './FoodItem.vue';
export default {
    name: "FoodsComp",
    components: { FoodItem }
}
</script>
<style lang="scss" scoped>
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
                font-size: 0.75rem;
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
