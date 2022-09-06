<template>
    <main>
        <div class="jumbotron">
            <div class="container">
                <h1>{{currentTypologyName}}</h1>
            </div>
        </div>
        <div class="sliding-menu">
            <div class="container">
                <ul>
                    <li
                        @click="getUserApi();
                                currentTypology = 0">
                        <div class="icon">
                            <img src="/image/typologies/typology_00.png" alt="all-restaurants">
                        </div>
                        <div class="typology-title">Tutti i ristoranti</div>
                    </li>
                    <!-- :class="category.id == currentCategory ? 'active' : ''" -->
                    <li
                        v-for="typology in typologies"
                        :key="typology.id"
                        @click="getUserByTypology(typology.id);
                                currentTypology = typology.id"
                        :class="typology.id === currentTypology ? 'active' : ''">
                        <div class="icon">
                            <img
                                :src="`/image/typologies/${typology.image}`"
                                :alt="typology.name">
                        </div>
                        <div class="typology-title">{{typology.name}}</div>
                    </li>
                </ul>
            </div>
        </div>
        <section class="restaurants">
            <div class="container cards-container">
                <card-item
                    v-for="user in usersLoaded"
                    :key="user.id"
                    :user="user"/>
            </div>
            <div
                @click="loadMore()"
                class="load-more mx-auto"
                v-if="length < users.length">Carica pi&uacute; ristoranti</div>
        </section>
    </main>
</template>
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
            currentTypology: 0,
            length: 6
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
        },
        loadMore(){
            if (this.length > this.users.length) return;
            this.length = this.length + 3;
        },
    },
    computed: {
        usersLoaded() {
            return this.users.slice(0, this.length);
        },
        currentTypologyName(){
            if(this.currentTypology === 0)
                return "Tutti i ristoranti";
            return this.typologies.find(element => element.id === this.currentTypology).name;
        }
    },
}
</script>
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
                margin-right: 60px;
                font-size: 16px;
                font-weight: bold;
                color: black;
                text-align: center;
                cursor: pointer;
                .icon{
                    width: 110px;
                    height: 82.5px;
                    border-radius: 20px;
                    overflow: hidden;
                    text-align: center;
                    transition: .2s box-shadow;
                    img{
                        height: 100%;
                        width: 100%;
                    }
                }
                .typology-title{
                    padding-top: 10px;
                    transition: .2s text-shadow;
                }
                &:hover{
                    .icon{
                        box-shadow: 4px 4px 10px gray;
                    }
                    .typology-title{
                        text-shadow: 4px 4px 10px gray;
                    }
                    // transform: scale(1.1);
                }
                &.active{
                    .icon{
                        box-shadow: 4px 4px 15px #FE3638;
                    }
                    .typology-title{
                        text-shadow: none;
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
    .load-more{
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 900;
        min-width: 200px;
        width: 20%;
        margin-bottom: 20px;
        text-align: center;
        color: #fff;
        background-color: #3B3B3B;
        padding: 8px 0;
        border-radius: 5px;
        cursor: pointer;
        transition: all .4s;
        outline: 2px solid transparent;
        outline-offset: -2px;
        &:hover{
            background-color: #fff;
            color: #3B3B3B;
            outline-color: #3B3B3B;
        }
    }
}
</style>
