<template>
    <main>
        <div class="jumbotron">
            <div class="container">
                <h1>Burgers & Fries</h1>
            </div>
        </div>
        <div class="sliding-menu">
            <div class="container">
                <ul>
                    <!-- Prima versione statica, successivamente si dovranno ciclare -->

                    <li v-for="typology in typologies" :key="typology.id" @click="getUserByTypology(typology.id)">
                        <a href="#">
                            <div class="icon">
                                <img :src="`/image/typologies/${typology.image}`" :alt="typology.name">
                            </div>
                            <div class="typology-title">{{typology.name}}</div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <section class="restaurants">
            <div class="container cards-container">

                <card-item
                    v-for="user in users"
                    :key="user.id"
                    :user="user"

                    />

            </div>
        </section>
    </main>
</template>

<!-- SCRIPT -->
<script>

import CardItem from './CardItem.vue'
export default {
    components: { CardItem },
    name: 'HomeComp',

    data(){
        return{
            userApiUrl: 'http://127.0.0.1:8000/api/foods',
            users: [],
            typologies: [],

        }
    },

    mounted(){
        this.getUserApi()
    },

    methods: {
        getUserApi(){
            axios.get(this.userApiUrl)
            .then(r =>{
                this.users = r.data.users;
                this.typologies = r.data.tipologies;
                console.log(this.typologies);
            })
            .catch(error =>{
                console.log(error);
            })
        },

        getUserByTypology(id){
            axios.get(this.userApiUrl + '/user-typology/' + id)
            .then(r => {

                this.users = [];
                this.users = r.data.users;
                console.log(id);
                console.log(this.users);

            })
            .catch(error =>{
                console.log(error);
            })
        },

        showMenu(slug){
            console.log(slug);
        }

    }

}


</script>


<!-- STYLE -->
<style lang="scss" scoped>
main{
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
     .sliding-menu{
        background-color: aliceblue;
        margin-bottom: 45px;
        ul{
            overflow-x: auto;
            white-space: nowrap;
            padding: 45px 0 20px 0;
            margin-bottom: 0;
            list-style: none;
            li{
                display: inline-block;
                margin-right: 90px;
                font-size: 16px;
                font-weight: bold;
                a{
                    color: black;
                    text-align: center;
                    text-decoration: none;
                    .icon{
                        width: 110px;
                        height: 82.5px;
                        border-radius: 20px;
                        overflow: hidden;
                        text-align: center;
                        transition: .2s box-shadow;
                        img{
                            height: 100%;
                        }
                    }
                    .typology-title{
                        padding-top: 10px;
                        transition: .2s text-shadow;
                    }
                }
                &:hover{
                    .icon{
                        box-shadow: 4px 4px 10px gray;
                    }
                    .typology-title{
                        text-shadow: 4px 4px 10px gray;
                    }
                }
            }
        }
    }
    .cards-container{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        column-gap: 30px;
    }
}
</style>
