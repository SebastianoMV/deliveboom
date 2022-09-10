<template>
    <div class="food-item">
        <div class="food-item-top">
            <img
                :src="`/images/foods/${food.image}`"
                :alt="food.name"
                v-if="!placeHolder"
                @error="placeHolder = true">
            <img
                src="/images/foods/dishFoodPlaceholder.jpg"
                :alt="`placeholder-${food.id}`"
                v-else>
            <h5>{{food.name}}<img v-if="food.vegan" src="/images/vegetarian-mark.png" alt=""></h5>
        </div>
        <div class="food-item-bottom">
            <div class="description">{{food.description}}</div>
            <div class="lower-btns">
                <span class="price">&euro; {{food.price}}</span>
                <div
                    class="add-to-cart-label"
                    :class="addedToCart ? 'added' : ''">Aggiunto al carrello</div>
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
            placeHolder: false,
            addedToCart: false,
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
            if (!food){
                return;
            }
            try{
                if(localStorage.getItem('cart') == null || JSON.parse(localStorage.getItem('cart')).length === 0){
                    food.quantity = 1;
                    this.cart.push(food);
                    this.saveCart();
                    this.addedToCartMsg();
                }
                else{
                    this.cart = JSON.parse(localStorage.getItem('cart'));
                    if(this.cart[0].user_id !== food.user_id){
                        if(confirm('Hai già dei prodotti di un altro ristorante nel carrello. Vuoi cambiare ristorante?')){
                            this.cart = [];
                            food.quantity = 1;
                            this.cart.push(food);
                            this.saveCart();
                            this.addedToCartMsg();
                        };
                    }
                    else{
                        let check = this.cart.find(({ id }) => id == food.id);
                        if(!check)
                            food.quantity = 1;
                        else
                            for(let i = 0; i < this.cart.length + 1; i++){
                                if(this.cart[i].id == food.id){
                                    this.cart[i].quantity = this.cart[i].quantity + 1
                                    this.saveCart();
                                    this.addedToCartMsg();
                                    return
                                }
                            }
                        this.cart.push(food);
                        this.saveCart();
                        this.addedToCartMsg();
                    }
                }
            }
            catch(e){
                localStorage.removeItem('cart');
            }
        },
        addedToCartMsg(){
            this.addedToCart = true;
            let self = this;
            setTimeout(function(){
                self.addedToCart = false;
            }, 2*1000);
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
    img{
        border-radius: 10px 10px 0 0;
        height: 200px;
        width: 100%;
        margin-bottom: 10px;
    }
    h5{
        font-weight: bolder;
        margin-bottom: 12px;
        text-align: center;
        overflow: hidden;
        // padding: 15px;
        img{
            width: 25px;
            height: 20px;
        }
    }
    .food-item-bottom{
        position: relative;
        text-align: center;
        .description{
            font-size: 14px;
            color: gray;
            height: 63px;
            overflow-y: scroll;
            padding: 8px;
            margin-bottom: 10px;
            /* Nasconde scrollbar su IE, Edge e Firefox */
            -ms-overflow-style: none;  /* IE & Edge */
            scrollbar-width: none;  /* Firefox */
            /* Nasconde scrollbar su Chrome, Safari e Opera */
            &::-webkit-scrollbar {
                display: none;
            }
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
            column-gap: 0;
            align-items: center;
            position: relative;
            padding: 0 20px;
            margin-bottom: 15px;
            .price{
                font-size: 25px;
                color: #4E54C8;
                font-weight: bold;
            }
            .add-to-cart-label{
                position: absolute;
                right: 20px;
                bottom: -30px;
                padding: 3px 10px;
                background-color: rgb(147, 240, 147);
                border: 2px solid green;
                color: green;
                opacity: 0;
                font-weight: bold;
                font-size: 12px;
                user-select: none;
                border-radius: 5px;
                transition: 1s opacity;
                &.added{
                    transition: .2s opacity;
                    opacity: 1;
                }
            }
            .btn-cart{
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                background-color: #dd3546;
                outline: 2px solid transparent;
                outline-offset: -2px;
                color: white;
                border-radius: 5px;
                padding: 6px 8px;
                cursor: pointer;
                transition: .2s all;
                &:hover{
                    background-color: #b42d3b;
                }
                &:active{
                    background-color: white;
                    color: #dd3546;
                    outline-color: #dd3546;
                }
            }
        }
    }
}
</style>
