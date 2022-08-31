<template>
    <div class="mt-5 container">

        <nav class="navbar navbar-expand-lg top">
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

        <div class="foods container">
            <FoodItem/>
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
        max-width: 1280px;
        height: 96px;
        padding: 0px 15px;
        border-radius: 10px;
        box-shadow: 0.3rem 0.3rem 0.3rem #888888;

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
        padding-top: 3rem;
        padding-bottom: 3rem;
        border-radius: 10px;
    }


</style>
