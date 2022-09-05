<template>
   <div>
      <div class="container my-5 ">
        <div class="row">
          <div class="col-6 p-4 text-center">
            <h4><router-link :to="{name: 'cart'}">Carrello <i class="fa-solid fa-cart-arrow-down"></i> </router-link></h4>
          </div>

          <div class="col-6 active p-4 text-center">
            <h4>Checkout <i class="fa-regular fa-credit-card"></i> </h4>
          </div>
        </div>

            <div class="row mt-4">
                <div class="col-6">
                    <form>
                        <h4 class="mb-3">Dettagli dell’ordine</h4>

                        <div class="form-group">
                            <input type="text" class="form-control" v-model.trim="newOrder.name" id="name" placeholder="Nome">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" v-model.trim="newOrder.email" id="email" placeholder="E-mail">
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" v-model.trim="newOrder.address" id="address" placeholder="Indirizzo">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" v-model.trim="newOrder.phone" id="phone" placeholder="Telefono">
                        </div>

                        <button @click="sendOrder()" type="submit" class="btn btn-primary mt-3 w-100">Invia</button>

                    </form>
                </div>

    <!-- Bottoni Paypal -->

                <div class="col-4 offset-1">
                    <div v-if="!paidFor">

                        <h5 class="text-right p-3 text-muted">Totale ordine: <strong>{{newOrder.total_price}} €</strong></h5>
                        <div ref="paypal"></div>

                    </div>

                    <div v-if="paidFor">
                        <h4 class="alert alert-warning">Complimenti, il pagamento è andato a buon fine!</h4>
                    </div>


                </div>
            </div>
        </div>
    </div>
</template>

  <script>

  export default {
    name: "CheckoutComp",

    data: function() {
      return {
        loaded: false,
        paidFor: false,

        orderApi: '/api/orders',
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
    mounted: function() {
      const script = document.createElement("script");
      script.src =
        "https://www.paypal.com/sdk/js?client-id=AaqarfSwF5hawgDSgK0AJhmMhT8ViEOAn05yrh4OgSmFlkLHffhSpeurRoHm_wcV_fk8Z5oZhQGMlOrl";
      script.addEventListener("load", this.setLoaded);
      document.body.appendChild(script);
    },

    created() {
            if (localStorage.cart) {
              this.items = JSON.parse(localStorage.cart);
            }
            this.itemTotals();
            console.log(this.items)
          },

    methods: {

        sendOrder(){

            axios.post(this.orderApi, this.newOrder)
            .then((r) => {
                console.log(r.data)
            })
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
  };
  </script>

<style lang="scss" scoped>

  .debug{
    border: 1px solid black;
  }

  a{
    color: #FF6666;
    text-decoration: none;
    }

    .active{
     color: red;
     border-bottom: 1px solid red;
    }

</style>
