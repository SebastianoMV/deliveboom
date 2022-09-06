<template>
    <section class="checkout-comp container">
        <div class="checkout-container">
            <div class="top-links">
                <h4>
                    <router-link :to="{name: 'cart'}" class="link">Carrello <i class="fa-solid fa-cart-arrow-down"></i></router-link>
                </h4>
                <h4 class="static active">Checkout <i class="fa-regular fa-credit-card"></i></h4>
            </div>
            <div class="mid-bar">
                <go-back-btn/>
            </div>
            <div class="checkout-body row">
                <form action="" class="col-sm-6 col-12">
                    <h2>Dettagli dell'ordine</h2>
                    <input type="text" v-model.trim="newOrder.name" id="name" placeholder="Nome">
                    <input type="text" v-model.trim="newOrder.email" id="email" placeholder="E-mail">
                    <input type="text" v-model.trim="newOrder.address" id="address" placeholder="Indirizzo">
                    <input type="text" v-model.trim="newOrder.phone" id="phone" placeholder="Telefono">
                    <button @click="sendOrder()" type="submit" class="send-btn btn btn-danger mt-4">Paga ora</button>
                </form>
                <section class="paypal-btns col-sm-6 col-12">
                    <div
                        v-if="!paidFor"
                        class="paypal-side">
                        <h2>Totale ordine: <span class="price">€ {{newOrder.total_price}}</span></h2>
                        <div ref="paypal"></div>
                    </div>
                    <div
                        v-else
                        class="paypal-side">
                        <h2 class="alert alert-success">Complimenti, il pagamento è andato a buon fine!</h2>
                    </div>
                </section>
            </div>
        </div>
    </section>
</template>
<script>
import GoBackBtn from '../partials/GoBackBtn.vue';
export default {
    name: "CheckoutComp",
    components: { GoBackBtn },
    data() {
        return {
            loaded: false,
            paidFor: false,
            orderApi: 'http://127.0.0.1:8000/api/orders',
            newOrder: {
                name: '',
                email: '',
                phone: '',
                address: '',
                total_price: 0,
                status_payment: 1
            },
            items: null,
        };
    },
    mounted() {
        const script = document.createElement("script");
        script.src = "https://www.paypal.com/sdk/js?client-id=AaqarfSwF5hawgDSgK0AJhmMhT8ViEOAn05yrh4OgSmFlkLHffhSpeurRoHm_wcV_fk8Z5oZhQGMlOrl";
        script.addEventListener("load", this.setLoaded);
        document.body.appendChild(script);
    },
    created() {
        if (localStorage.cart) {
            this.items = JSON.parse(localStorage.cart);
        }
        this.itemTotals();
        console.log(this.items);
    },
    methods: {
        sendOrder(){
            axios.post(this.orderApi, this.newOrder)
            .then((r) => {
                console.log(r.data)
            });
        },
        itemTotals(){
                this.newOrder.total_price = 0;
                for (let i = 0; i < this.items.length; i++) {
                     this.newOrder.total_price += parseFloat(this.items[i].price)*this.items[i].quantity;
                }
            },
        setLoaded: function() {
            this.loaded = true;
            window.paypal
            .Buttons({
                createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [
                    {
                        amount: {
                        currency_code: "USD",
                        value: this.newOrder.total_price
                        }
                    }
                    ]
                });
                },
                onApprove: async (data, actions) => {
                const order = await actions.order.capture();
                this.paidFor = true;
                console.log(order);
                },
                onError: err => {
                console.log(err);
                }
            })
            .render(this.$refs.paypal);
        }
    }
}
</script>
<style lang="scss" scoped>
.checkout-comp{
    .checkout-container{
        margin: 50px 0;
        min-height: calc(100vh - 590px);
        background-color: white;
        color: black;
        box-shadow: 0px 0px 15px rgb(189, 189, 189);
        border-radius: 20px;
        overflow: hidden;
        .top-links{
            display: flex;
            width: 100%;
            height: 50px;
            color: #FE3638;
            h4{
                width: 50%;
                text-align: center;
                margin: 0 auto;
                &.active,
                .active{
                    border-bottom: 3px solid #FE3638;
                    font-weight: bolder;
                }
                &.static,
                .link{
                    padding-top: 10px;
                }
                .link{
                    cursor: pointer;
                    display: block;
                    width: 100%;
                    height: 100%;
                    color: #FE3638;
                    text-decoration: none;
                    transition: .2s all;
                    &:hover{
                        background-color: rgb(240, 240, 240);
                    }
                }
            }
        }
        .mid-bar{
            width: 100%;
            padding: 15px 15px 0;
        }
        .checkout-body{
            margin-top: 30px;
            h2{
                font-weight: bolder;
                margin-bottom: 30px;
                .price{
                    display: inline-block;
                    font-weight: bold;
                    color: #4E54C8;
                }
            }
            form{
                text-align: center;
                input{
                    width: 70%;
                    margin: 0 auto;
                    margin-top: 10px;
                    font-size: 14px;
                    display: block;
                    border-radius: 5px;
                    border: 2px solid gray;
                }
                .send-btn{
                    width: 40%;
                    margin-bottom: 30px;
                }
            }
            .paypal-side{
                text-align: center;
                width: 70%;
                margin: 0 auto;
            }
        }
    }
}
</style>
