<template>
    <section class="foods">
        <div class="jumbotron">
            <div class="container">
                <h1>Burgers & Fries</h1>
                <nav class="jumbo-nav">
                    <img :src="`/image/users/${user.image}`" alt="">
                    <ul>
                        <li v-for="food in foods" :key="food.id"><a href="#">{{food.category.name}}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="foods-container container">
            <h1>{{user.name}}</h1>
            <div class="wrapper">
                <FoodItem v-for="food in foods" :key="food.id" />

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
            user: [],
            foods:[],
            userApiUrl: 'http://127.0.0.1:8000/api/foods',

        }
    },

    mounted(){
        this.getUser(this.$route.params.slug);
    },

    methods:{
        getUser(slug){
            axios.get(this.userApiUrl+ '/menu/' + slug)
            .then(r=> {
                this.user = r.data;
                console.log(this.user);
                this.getFoodsApi(this.user.id);

            })
        },
        getFoodsApi(id){
            axios.get(this.userApiUrl + '/food-category/' + id)
            .then(r => {
                this.foods = r.data;
                console.log(id);
                console.log(this.foods);
            })
        },
    },
}
</script>

<!-- STYLE -->
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
                        a{
                            color: inherit;
                            text-decoration: none;
                            &:hover{
                                color: darkred;
                            }
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
