<template>
    <div class="food-item">
        <div class="food-item-top">
            <img :src="`/images/foods/${food.image}`" :alt="food.name">
            <h5>{{food.name}}</h5>
        </div>
        <div class="food-item-bottom">
            <div class="description">{{food.description}}</div>
            <div class="lower-btns">
                <span class="price">&euro; {{food.price}}</span>
                <div class="btn-cart" @click="addItem(food)">
                    <i class="fa-solid fa-cart-plus"></i>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "FoodItem",
    props: {
        food: Object,
    },
    data(){
        return{
            cart: [],
        }
    },
    mounted() {
        if (localStorage.getItem('cart')) {
            try {
                this.cart = JSON.parse(localStorage.getItem('cart'));
            } catch(e) {
                localStorage.removeItem('cart');
            }
        }
    },
    methods: {
        addItem(food) {
            if (!food) {
                return;
            }
            try {
                if(localStorage.getItem('cart') == null){
                    this.cart.push(food);
                    this.saveCart();
                }
                else{
                    this.cart = JSON.parse(localStorage.getItem('cart'));
                    // let flag= true;
                    // for(let i = 0; i < this.cart.length + 1; i++){
                    //     if(this.cart[i].id = food.id){
                    //         flag = false;
                    //     }
                    // }
                    // if(flag){
                    //     this.food.quantity = 1;
                    // }
                    // for(let i = 0; i < this.cart.length + 1; i++){
                    //     if(this.cart[i].id = food.id){
                    //         this.food.quantity = this.food.quantity +1;
                    //     }
                    // }
                    this.cart.push(food);
                    this.saveCart();
                }
            } catch(e) {
                localStorage.removeItem('cart');
            }
        },
        removeItem(x) {
            this.cart.splice(x, 1);
            this.saveCart();
        },
        saveCart() {
            const parsed = JSON.stringify(this.cart);
            localStorage.setItem('cart', parsed);
        }
    }
}
</script>
<style lang="scss" scoped>
.food-item{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 260px;
    min-height: 380px;
    box-shadow: 0px 0px 15px rgb(189, 189, 189);
    border-radius: 10px;
    overflow: hidden;
    img{
        height: 200px;
        width: 100%;
        margin-bottom: 10px;
    }
    h5{
        font-weight: bolder;
        margin-bottom: 12px;
        text-align: center;
        overflow: hidden;
    }
    .food-item-bottom{
        position: relative;
        text-align: center;
        .description{
            font-size: 14px;
            color: gray;
            height: 63px;
            overflow-y: scroll;
            padding: 8px 0;
            margin-bottom: 10px;
        }
        &::before{
            content: "";
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
            background-image:
            linear-gradient(to top,
                        rgba(255, 255, 255, 0),
                        rgba(255, 255, 255, 1));
            width: 100%;
            height: 8px;
        }
        &::after{
            content: "";
            position: absolute;
            z-index: 1;
            top: 55px;
            left: 0;
            background-image:
            linear-gradient(to bottom,
                        rgba(255, 255, 255, 0),
                        rgba(255, 255, 255, 1));
            width: 100%;
            height: 8px;
        }
        .lower-btns{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            margin-bottom: 15px;
            .price{
                font-size: 25px;
                color: #4E54C8;
                font-weight: bold;
            }
            .btn-cart{
                font-size: 20px;
                background-color: #FE3638;
                outline: 2px solid transparent;
                outline-offset: -2px;
                color: white;
                border-radius: 5px;
                padding: 0px 8px;
                cursor: pointer;
                transition: .2s all;
                &:hover{
                    background-color: #C5272A;
                }
                &:active{
                    background-color: white;
                    color: #FE3638;
                    outline-color: #FE3638;
                }
            }
        }
    }
}
</style>
