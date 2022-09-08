<template>
    <main>
        <div class="jumbotron">
            <div class="container fluid-container">
                <h2>{{currentTypologiesName}}</h2>
            </div>
            <div class="jumbo-wallpaper">
                <img src="https://wallpaper.dog/large/20461782.jpg" alt="">
            </div>
        </div>
        <div class="sliding-menu">
            <div class="container fluid-container">
                <ul>
                    <li
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
                        @click="pushOrRemoveTypology(typology)"
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
            currentTypologies: [],
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
                this.typologies = r.data.tipologies;
                this.filterUsers(true);
                this.isLoaded = true;
            })
            .catch(error =>{
                console.log(error);
            })
        },
        pushOrRemoveTypology(typology){
            let isntPresent = true;
            for(let i=0; i<this.currentTypologies.length; i++){
                if(typology.id === this.currentTypologies[i].id){
                    this.currentTypologies.splice(i,1);
                    this.currentTypologiesIDs.splice(i,1);
                    isntPresent = false;
                }
            }
            if(isntPresent){
                axios.get(this.userApiUrl + '/user-typology/' + typology.id)
                .then(r => {
                    this.currentTypologies.push(r.data);
                    this.currentTypologiesIDs.push(r.data.id);
                    this.filterUsers(false);
                })
                .catch(error =>{
                    console.log(error);
                })
            }
            else{
                this.filterUsers(false);
            }
        },
        filterUsers(reset){
            if(reset){
                this.currentTypologies = [];
                this.currentTypologiesIDs = [];
                this.filteredUsers = this.users;
            }
            else{
                this.filteredUsers = [];
                if(this.currentTypologies.length === 0){
                    this.filteredUsers = this.users;
                }
                else if(this.currentTypologies.length === 1)
                    this.filteredUsers = this.currentTypologies[0].users;
                else
                    for(let i=0; i<this.currentTypologies[0].users.length; i++){
                        let isInAll = true;
                        for(let j=1; j<this.currentTypologies.length; j++){
                            let isInThisArray = false;
                            for(let y=0; y<this.currentTypologies[j].users.length; y++)
                                if(this.currentTypologies[0].users[i].id === this.currentTypologies[j].users[y].id)
                                    isInThisArray = true;
                            if(!isInThisArray)
                                isInAll = false;
                        }
                        if(isInAll)
                            this.filteredUsers.push(this.currentTypologies[0].users[i]);
                    }
            }
        },
        showMenu(slug){
            console.log(slug);
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
                return this.typologies.find(element => element.id === this.currentTypologiesIDs[0]).name;
            else{
                let typologiesString = "";
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
        height: 250px;
        padding: 150px 0 0 0;
        h2{
            font-weight: bolder;
        }
        .jumbo-wallpaper{
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: translateX(-50%);
            z-index: -1;
            overflow: hidden;
            img{
                object-fit: cover;
            }
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
                    outline: 0px solid transparent;
                    outline-offset: 0px;
                    transition: .2s all;
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
                    .icon{
                        outline: 4px solid #FE3638;
                        outline-offset: -4px;
                    }
                    // .typology-title{
                    //     text-shadow: 4px 4px 10px gray;
                    // }
                    // transform: scale(1.1);
                }
                &:active{
                    .icon{
                        outline-color: #4E54C8;
                    }
                }
                &.active{
                    .icon{
                        outline-color: transparent;
                    }
                    .typology-title{
                        color: green;
                        i{
                            display: inline-block;
                        }
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
        background-color: #FE3638;
        padding: 8px 0;
        border-radius: 5px;
        cursor: pointer;
        transition: all .4s;
        outline: 2px solid transparent;
        outline-offset: -2px;
        &:hover{
            background-color: #C5272A;
            outline-color: #C5272A;
        }
        &:active{
            background-color: white;
            color: #4E54C8;
            outline-color: #4E54C8;
        }
    }
}
</style>
