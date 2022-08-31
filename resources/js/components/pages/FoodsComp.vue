<template>
    <div class="mt-5">
        <div class="foods-menu">
            logo restaurant
            <ul class="navbar-nav container top ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pizza</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Sides</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Drinks</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Dessert</a>
                </li>
            </ul>
        </div>
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
    .foods-menu{
        width: 100%;

        .top{
            max-width: 1280px;
            height: 96px;
            margin-top: -3rem;
            padding: 0px 15px;
            border-radius: 10px;

            li{
                list-style: none;

                a{
                    color: black;
                    font-size: 16px;
                    padding: 12px 20px;
                }
                &:hover{
                     color: red;
                }
            }

        }

        .foods{
            max-width: 1280px;
            padding-top: 3rem;
            padding-bottom: 3rem;
            border-radius: 10px;
        }
    }

</style>
