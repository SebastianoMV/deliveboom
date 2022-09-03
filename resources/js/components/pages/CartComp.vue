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
          <div class="col-8 ">
            <div v-for="(item, index) in items" :key="index" class="divider-solid line-divider-solid  py-2  d-flex justify-content-between align-items-center">
                <img  src="../../../../public/image/categories/hamburgerjpg.jpg" alt="">

                <div  class="prodotto">
                    <h5>{{item.name}}</h5>
                    <div class="descrizione">Size:Medium</div>
                    <div class="prezzo">{{item.price}}</div>
                </div>
                <div class="quantity">

                    <div class="commands">
                        <div @click="removeItem(item)" class="command remove-item"> <b>-</b> </div>
                        <div class="command amount">0</div>
                        <div @click="addItem(item)" class="command add-item"> <b>+</b> </div>
                    </div>


                    <div class="remove text-danger" @click="removeItem(index)">Remove <i class="fa-solid fa-trash-can"></i></div>
                </div>
            </div>

          </div>
          <div class="col-4 checkout ">
            <div class="text-center mb-5 divider-solid">
                <h5 class="fw-bold">Total</h5>
                <h5 class="fs-1">{{total}} &euro;</h5>
                <br>
            </div>
           <label for="comments">Additional comments</label>
            <textarea name="comments" id="comments" cols="30" rows="5"></textarea>
            <label for="comments">Apply promo code</label>
            <input class="form-control" type="text" placeholder="promo">
            <button class="btn btn-outline-danger w-100 my-3 d-block">Apply promo code</button>
            <button class="btn btn-danger w-100 my-3 d-block">Checkout</button>
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

            }
        },
          mounted() {
            if (localStorage.cart) {
              this.items = JSON.parse(localStorage.cart);


            }
            this.itemTotals();
          },
          methods: {
            addItem(item) {
              if (!item) {
                return;
              }

              this.items.push(item);
              this.saveCart();
              this.itemTotals()
            },

            removeItem(index) {
              this.items.splice(index, 1);
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
                     this.total += parseFloat(this.items[index].price);
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
