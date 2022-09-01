<template>
   <div>
      <div class="container debug mt-5 ">
        <div class="row">
          <div class="col-6 debug p-4 text-center">
            <h4><router-link :to="{name: 'cart'}">Carrello</router-link></h4>
          </div>

          <div class="col-6 debug p-4 text-center">
            <h4>Checkout</h4>
          </div>
        </div>

<!-- Bottoni Paypal -->

        <div>
            <div v-if="!paidFor">
                <h1>{{product.name}}</h1>
                <h2>{{product.price}} €</h2>

                <p>{{product.description}}</p>

            </div>

            <div v-if="paidFor">
                <h1>Complimenti, il pagamento è andato a buon fine!</h1>
            </div>

              <div class="pay" ref="paypal"></div>

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
        product: {
            name: 'Nome prodotto',
            price: 20,
            description: "Un prodotto meraviglioso",
        }
      };
    },
    mounted: function() {
      const script = document.createElement("script");
      script.src =
        "https://www.paypal.com/sdk/js?client-id=AaqarfSwF5hawgDSgK0AJhmMhT8ViEOAn05yrh4OgSmFlkLHffhSpeurRoHm_wcV_fk8Z5oZhQGMlOrl";
      script.addEventListener("load", this.setLoaded);
      document.body.appendChild(script);
    },
    methods: {
      setLoaded: function() {
        this.loaded = true;
        window.paypal
          .Buttons({
            createOrder: (data, actions) => {
              return actions.order.create({
                purchase_units: [
                  {
                    description: this.product.description,
                    amount: {
                      currency_code: "USD",
                      value: this.product.price
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

  .pay{
    width: 35%;
  }
  .debug{
    border: 1px solid black;
    background-color: rgba(255, 0, 0, .3);
  }

</style>
