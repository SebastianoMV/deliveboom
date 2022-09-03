<template>
    <section class="foods">
        <div class="jumbotron">
            <div class="container">
                <h1>Burgers & Fries</h1>
                <nav class="jumbo-nav">
                    <img :src="`/image/users/${user.image}`" alt="" @click="getUser($route.params.slug)">
                    <ul>
                        <li
                            v-for="category in categories"
                            :key="category.id"
                            :class="category.id == currentCategory ? 'active' : ''"
                            @click="filteredFoods(category.id)"
                            v-show="foodHasCategory(category.id)">
                            {{category.name}}
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="foods-container container">
            <h1>{{user.name}}</h1>
            <div class="wrapper">
                <FoodItem v-for="food in foodsFiltered" :key="food.id"  :food="food"/>
            </div>
        </div>
    </section>
</template>

<!-- SCRIPT -->
<script>
import FoodItem from './FoodItem.vue';
export default {
    name: "FoodsComp",
    components: { FoodItem },
    data() {
        return{
            categories:[],
            currentCategory: 0,
            user: [],
            foods:[],
            foodsFiltered:[],
            userApiUrl: 'http://127.0.0.1:8000/api/foods',
        }
    },
    mounted(){
        this.getUser(this.$route.params.slug);
    },
    methods:{
        getUser(slug){
            this.currentCategory = 0;
            axios.get(this.userApiUrl+'/menu/'+slug)
            .then(r=> {
                this.user = r.data;
                // console.log(this.user);
                this.getFoodsApi(this.user.id);
            })
        },
        getFoodsApi(id){
            axios.get(this.userApiUrl+'/food-category/'+id)
            .then(r => {
                this.foods = r.data.foods;
                this.foodsFiltered = r.data.foods;
                this.categories = r.data.categories;
                // console.log(id);
                // console.log(this.categories);
            })
        },
        filteredFoods(categoryId){
            this.foodsFiltered = [];
            this.currentCategory = categoryId;
            for (let i=0; i<this.foods.length; i++) {
                if (this.foods[i].category_id == categoryId) {
                    this.foodsFiltered.push(this.foods[i]);
                }
            }
            // console.log(this.foodsFiltered);
        },
        foodHasCategory(categoryId){
            let flag = false;
            for (let i=0; i<this.foods.length; i++) {
                if (this.foods[i].category_id == categoryId) {
                    flag = true;
                }
            }
            return flag;
        }
    }
}
</script>

<style lang="scss" scoped>
.foods{
    .jumbotron{
        padding: 150px 0 0 0;
        margin: 0 0 100px 0;
        border-radius: 0;
        background-color: rgb(170, 0, 0);
        color: white;
        height: 250px;
        background-image: url(/* INSERIRE IMMAGINE DI SFONDO QUI!!! */);
        background-size: cover;
        h1{
            font-weight: bolder;
        }
        .container{
            position: relative;
            height: 100%;
            .jumbo-nav{
                position: absolute;
                align-items: center;
                display: flex;
                flex-wrap: wrap;
                bottom: 0;
                left: 50%;
                transform: translate(-50%, 50%);
                width: calc(100% - 30px);
                min-height: 80px;
                background-color: white;
                color: black;
                box-shadow: 0px 0px 15px rgb(189, 189, 189);
                border-radius: 10px;
                img,
                ul li{
                    cursor: pointer;
                }
                img{
                    height: 60px;
                    margin: 0 20px 0 30px;
                    border-radius: 10px;
                }
                ul{
                    display: flex;
                    column-gap: 30px;
                    list-style: none;
                    padding-left: 30px;
                    flex-grow: 1;
                    flex-wrap: wrap;
                    margin: 0;
                    li:hover,
                    li.active{
                        color: darkred;
                    }
                    li.active{
                        font-weight: bold;
                    }
                }
            }
        }
    }
    .foods-container{
        h1{
            font-weight: bolder;
            text-align: center;
            margin-bottom: 40px;
        }
        .wrapper{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 23px;
            margin-bottom: 50px;
        }
    }
}
</style>
