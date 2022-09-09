<template>
    <main>
        <div class="jumbotron">
            <div class="container fluid-container">
                <h2>{{currentTypologiesName}}</h2>
            </div>
            <div class="jumbo-wallpaper"/>
        </div>
        <div class="sliding-menu">
            <div class="container fluid-container">
                <ul>
                    <li
                        class="resetRestaurants"
                        @click="getUserApi();">
                        <div class="icon">
                            <img src="/image/typologies/typology_00.png" alt="all-restaurants">
                        </div>
                        <div class="typology-title">Tutti i ristoranti</div>
                    </li>
                    <!-- :class="category.id == currentCategory ? 'active' : ''" -->
                    <li
                        v-for="typology in typologies"
                        :key="typology.id"
                        @click="pushOrRemoveTypology(typology.id)"
                        :class="currentTypologiesIDs.includes(typology.id) ? 'active' : ''">
                        <div class="icon">
                            <img
                                :src="`/image/typologies/${typology.image}`"
                                :alt="typology.name">
                        </div>
                        <div class="typology-title"><i class="fa-regular fa-circle-check"></i> {{typology.name}}</div>
                    </li>
                </ul>
            </div>
        </div>
        <section class="restaurants">
            <div
                v-if="isLoaded"
                class="container cards-container">
                <card-item
                    v-for="user in usersLoaded"
                    :key="user.id"
                    :user="user"/>
                <h1 v-if="filteredUsers.length === 0 && isLoaded">Nessun risultato.</h1>
            </div>
            <div
                v-else
                class="container cards-container">
                <loader-comp/>
            </div>
            <div
                @click="loadMore()"
                class="load-more mx-auto"
                v-if="length < filteredUsers.length && isLoaded">Carica pi&uacute; ristoranti</div>
        </section>
    </main>
</template>

<script>
import CardItem from './CardItem.vue'
import LoaderComp from '../partials/LoaderComp.vue'
export default {
    components: { CardItem, LoaderComp },
    name: 'HomeComp',
    data(){
        return{
            userApiUrl: 'http://127.0.0.1:8000/api/foods',
            users: [],
            filteredUsers: [],
            typologies: [],
            currentTypologiesIDs: [],
            length: 6,
            isLoaded: false
        }
    },
    mounted(){
        this.getUserApi();
    },
    methods: {
        getUserApi(){
            this.isLoaded = false;
            axios.get(this.userApiUrl)
            .then(r =>{
                this.users = r.data.users;
                this.typologies = r.data.typologies;
                this.filteredUsers = this.users;
                this.currentTypologiesIDs = [];
                this.isLoaded = true;
            })
            .catch(error =>{
                console.log(error);
            })
        },
        pushOrRemoveTypology(typologyID){
            if(!this.currentTypologiesIDs.includes(typologyID)){
                this.currentTypologiesIDs.push(typologyID);
                this.filterUsers();
            }
            else{
                this.currentTypologiesIDs.splice(this.currentTypologiesIDs.indexOf(typologyID),1);
                this.currentTypologiesIDs
                this.filterUsers();
            }
        },
        filterUsers(){
            this.filteredUsers = [];
            this.length = 6;
            if(this.currentTypologiesIDs.length === 0)
                this.filteredUsers = this.users;
            else{
                for(let i=0; i<this.users.length; i++){
                    let hasAllTypologies = true;
                    for(let j=0; j<this.currentTypologiesIDs.length; j++)
                        if(this.users[i].typologies.filter(element => element.id === this.currentTypologiesIDs[j]).length === 0)
                            hasAllTypologies = false;
                    if(hasAllTypologies)
                        this.filteredUsers.push(this.users[i]);
                }
            }
        },
        loadMore(){
            if (this.length > this.users.length) return;
            this.length += 6;
        },
    },
    computed: {
        usersLoaded() {
            return this.filteredUsers.slice(0, this.length);
        },
        currentTypologiesName(){
            if(this.currentTypologiesIDs.length === 0)
                return "Tutti i ristoranti";
            else if(this.currentTypologiesIDs.length === 1)
                return "Categoria: "+this.typologies.find(element => element.id === this.currentTypologiesIDs[0]).name;
            else{
                let typologiesString = "Categorie: ";
                for(let i=0; i<this.currentTypologiesIDs.length; i++)
                    typologiesString += this.typologies.find(element => element.id === this.currentTypologiesIDs[i]).name+", ";
                return typologiesString.slice(0, -2);;
            }
        }
    },
}
</script>

<style lang="scss" scoped>
main{
    .jumbotron{
        position: relative;
        margin: 0;
        border-radius: 0;
        background-color: transparent;
        color: white;
        width: 100%;
        min-height: 150px;
        padding: 50px 0 10px 0;
        h2{
            font-weight: bolder;
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
    .sliding-menu{
        background-color: bisque;
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
                    position: relative;
                    width: 110px;
                    height: 82.5px;
                    border-radius: 20px;
                    overflow: hidden;
                    text-align: center;
                    transition: .2s transform;
                    &::after{
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: transparent;
                        transition: .2s background-color;
                    }
                    img{
                        height: 100%;
                        width: 100%;
                    }
                }
                .typology-title{
                    padding-top: 10px;
                    transition: .2s all;
                    i{
                        display: none;
                    }
                }
                &:hover{
                    .icon::after{
                        background-color: rgba(255, 255, 255, 0);
                    }
                }
                &:active{
                    .icon::after{
                        background-color: rgba(0, 128, 0, .25);
                    }
                }
                &.resetRestaurants:active{
                    .icon::after{
                        background-color: rgba($color: #4E54C8, $alpha: .35);
                    }
                }
                &.active{
                    .icon{
                        transform: scale(1.2);
                        &::after{
                            background-color: rgba(255, 255, 255, 0);
                        }
                    }
                    .typology-title{
                        color: green;
                        i{
                            display: inline-block;
                        }
                    }
                }
                &.active:active{
                    .icon::after{
                        background-color: rgba($color: #dd3546, $alpha: .35);
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
        h1{
            font-weight: bolder;
            margin-bottom: 45px;
        }
    }
    .load-more{
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 900;
        min-width: 200px;
        width: 20%;
        margin-bottom: 20px;
        text-align: center;
        color: white;
        background-color: #dd3546;
        padding: 8px 0;
        border-radius: 5px;
        cursor: pointer;
        transition: all .4s;
        outline: 2px solid transparent;
        outline-offset: -2px;
        &:hover{
            background-color: #b42d3b;
            outline-color: #b42d3b;
        }
        &:active{
            background-color: white;
            color: #4E54C8;
            outline-color: #4E54C8;
        }
    }
}
</style>
