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
        <div >
          Pagamenti
        </div>
      </div>
    </div>
    </template>
      <script>
      export default {
          name: 'CheckoutComp',
      }
      </script>
      <style lang="scss" scoped>
    .debug{
            border: 1px solid black;
            background-color: rgba(255, 0, 0, .3);
        }
    .food {
      img{
        width: 30%;
      }
    }
      </style>
