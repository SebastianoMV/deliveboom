<template>
    <div>
      <div class="container top my-5 ">
        <div class="row my-5">
          <div class="col-6 active p-4 text-center">
            <h4>Carrello <i class="fa-solid fa-cart-arrow-down"></i> </h4>
          </div>
          <div class="col-6  p-4  text-center">
            <h4><router-link :to="{name: 'checkout'}">Checkout</router-link></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div v-for="(item, index) in items" :key="index" class="divider-solid line-divider-solid  py-2  d-flex justify-content-between align-items-center">
                <img  src="../../../../public/image/categories/hamburgerjpg.jpg" alt="">

                <div  class="prodotto">
                    <h5>{{item.name}}</h5>
                    <div class="descrizione">Size:Medium</div>
                    <div class="prezzo">{{item.price}}</div>
                </div>
                <div class="quantity">

                    <div class="commands">
                        <div @click="removeItem(item , index)" class="command remove-item"> <b>-</b> </div>
                        <div class="command amount">{{item.quantity}}</div>
                        <div @click="addItem(item)" class="command add-item"> <b>+</b> </div>
                    </div>


                    <div class="remove text-danger" @click="removeAll(item , index)">Remove <i class="fa-solid fa-trash-can"></i></div>
                </div>
            </div>

          </div>
          <div class="col-3 offset-1 checkout ">


            <div class="text-center mb-5">
                <h2>Totale: € {{total}}</h2>
                <button class="btn btn-danger w-100 my-3 d-block">Checkout</button>

            </div>

          </div>
        </div>
      </div>
    </div>
    </template>
      <script>
      export default {
          name: 'CartComp',
          data() {
            return{
                items:null,
                total: 0,
                loaded: false,
                paidFor: false,
            }
        },

          created() {
            if (localStorage.cart) {
              this.items = JSON.parse(localStorage.cart);

            }
            this.itemTotals();
          },


          methods: {
            addItem(item) {
                item.quantity++;
                this.itemTotals()
            },

            removeItem(item , index){
                if(item.quantity > 1){
                    item.quantity--;

                }else{
                    this.removeAll(index)
                }

                this.itemTotals()
            },

            removeAll(item , index) {
              this.items.splice(index, 1);
              console.log(index);
              this.saveCart();
              this.itemTotals()
            },

            saveCart() {
              const parsed = JSON.stringify(this.items);
              localStorage.setItem('cart', parsed);
            },

            itemTotals(){
                this.total = 0;
                for (let index = 0; index < this.items.length; index++) {

                    this.total += parseFloat(this.items[index].price)*this.items[index].quantity;
                }
            },

         }
      }
      </script>

      <style lang="scss" scoped>
        .commands{
                width: 100%;
                display: flex;
                justify-content: space-evenly;
                align-items: center;

                .amount{
                    width: 40px;
                    height: 32px;
                    font-size: 14px;
                    border: 1px solid rgb(230, 230, 230);
                    cursor: default;
                }
            }

            .command{
                background-color: #fff;
                width: 35px;
                height: 32px;
                border-radius: 50%;
                border: 1px solid lightgray;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
            }


    .debug{
            border: 1px solid black;
            background-color: rgba(255, 0, 0, .3);
        }
    a{
        color: #FF6666;
        text-decoration: none;
    }
    h4{
            color: #FF6666;
            &:hover{
                color: red;
            }
            }
        .active{
            color: red;
            border-bottom: 1px solid red;
        }
        .top{
            background-color: #fff;
            box-shadow: 0px 0px 15px 10px #DEDEDE;
        }
        .divider-solid {
            border-bottom: 1px solid lightgrey;
        img{
            width: 20%;
        }
        }
        .checkout{
            background-color: rgb(246, 249, 252);
        }

</style>
