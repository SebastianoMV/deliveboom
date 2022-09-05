<template>
    <div class="food-item">
        <img :src="`/images/foods/${food.image}`" :alt="food.name">
        <div class="food-item-text">
            <h5>{{food.name}}</h5>
            <p>Pomodoro, Mozzarella di bufala, Stracchino, Wurstel</p>
        </div>
        <div class="lower-btns">
            <span class="price">{{food.price}}</span>
            <div class="btn-cart" @click="addItem(food)">
                <i class="fa-solid fa-cart-plus"></i>
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
                this.cart = JSON.parse(localStorage.getItem('cart'));
                this.cart.push(food);
                this.saveCart();
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
    .food-item-text{
        text-align: center;
        h5{
            font-weight: bolder;
            margin-bottom: 20px;
        }
        p{
            font-size: 14px;
            color: gray;
        }
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
</style>
