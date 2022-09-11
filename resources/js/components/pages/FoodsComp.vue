<template>
    <section class="foods">
        <div class="jumbotron">
            <div class="container fluid-container">
                <h2>{{user.name}}</h2>
                <!-- <nav class="jumbo-nav">
                    <img :src="`/image/users/${user.image}`" alt="" @click="filteredFoods(0)">
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
                </nav> -->
            </div>
            <div class="jumbo-wallpaper"/>
        </div>
        <div class="container fluid-container">
            <nav class="jumbo-nav">
                <img :src="`/image/users/${user.image}`" alt="" @click="filteredFoods(0)">
                <ul>
                    <li
                        :class="currentCategory === 0 ? 'active' : ''"
                        @click="filteredFoods(0)"
                        v-if="categories.length > 1">Tutti</li>
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
        <div class="foods-container container">
            <h1><go-back-btn class="back-btn"/>Menù<span v-if="currentCategoryName!==''">: </span><span class="category-name">{{currentCategoryName}}</span></h1>
            <div
                v-if="isLoaded"
                class="wrapper">
                <FoodItem
                    v-for="food in foodsFiltered"
                    :key="food.id"
                    :food="food"/>
            </div>
            <div
                v-else
                class="wrapper">
                <loader-comp/>
            </div>
        </div>
    </section>
</template>
<script>
import GoBackBtn from '../partials/GoBackBtn.vue';
import LoaderComp from '../partials/LoaderComp.vue';
import FoodItem from './FoodItem.vue';
export default {
    name: "FoodsComp",
    components: { FoodItem, GoBackBtn, LoaderComp },
    data() {
        return{
            categories:[],
            currentCategory: 0,
            user: [],
            foods:[],
            foodsFiltered:[],
            userApiUrl: 'http://127.0.0.1:8000/api/foods',
            isLoaded: false
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
                .catch(err => {
                    console.log(err);
                });
        },
        getFoodsApi(id){
            axios.get(this.userApiUrl+'/food-category/'+id)
                .then(r => {
                    this.foods = r.data.foods;
                    this.foodsFiltered = r.data.foods;
                    this.categories = r.data.categories;
                    this.isLoaded = true;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        filteredFoods(categoryId){
            this.currentCategory = categoryId;
            if(categoryId === 0)
                this.foodsFiltered = this.foods;
            else{
                this.foodsFiltered = [];
                for (let i=0; i<this.foods.length; i++) {
                    if (this.foods[i].category_id == categoryId) {
                        this.foodsFiltered.push(this.foods[i]);
                    }
                }
            }
        },
        foodHasCategory(categoryId){
            let flag = false;
            for (let i=0; i<this.foods.length; i++)
                if (this.foods[i].category_id == categoryId)
                    flag = true;
            return flag;
        }
    },
    computed: {
        currentCategoryName(){
            if(this.currentCategory === 0)
                return "";
            return this.categories.find(element => element.id === this.currentCategory).name;
        }
    }
}
</script>
<style lang="scss" scoped>
.foods{
    .jumbotron{
        position: relative;
        margin: 0;
        border-radius: 0;
        background-color: transparent;
        color: white;
        width: 100%;
        height: 150px;
        padding: 50px 0 0 0;
        h2{
            font-weight: bold;
            text-shadow: 0px 0px 10px black;
        }
        .jumbo-wallpaper{
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 100%;
            height: 571.5px;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: translateX(-50%);
            z-index: -1;
            overflow: hidden;
            background-image: url("http://www.businesscoot.com/uploads/study_main_image/410.jpg");
            background-size: cover;
            background-position: center;
        }
    }
    .jumbo-nav{
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        width: 100%;
        min-height: 80px;
        margin: -40px 0 50px 0;
        padding-left: 30px;
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
            margin: 10px 50px 10px 0px;
            border-radius: 10px;
        }
        ul{
            display: flex;
            column-gap: 30px;
            list-style: none;
            padding: 0;
            flex-grow: 1;
            flex-wrap: wrap;
            margin: 0;
            li{
                margin: 20px 0;
                &:hover,
                &.active{
                    color: darkred;
                }
                &.active{
                    font-weight: bold;
                }
            }
        }
    }
    .foods-container{
        h1{
            width: 100%;
            position: relative;
            font-weight: bolder;
            text-align: center;
            margin-bottom: 40px;
            padding: 0 50px;
            .back-btn{
                position: absolute;
                left: 0;
                top: 9px;
            }
            .category-name{
                color: #DD3546;
                display: inline-block;
            }
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
