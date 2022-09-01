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
            <div class="divider-solid line-divider-solid  py-2  d-flex justify-content-between align-items-center">
                <img  src="../../../../public/image/categories/hamburgerjpg.jpg" alt="">
                <div class="prodotto">
                <h5>Pizza Pepperoni</h5>
                <div class="descrizione">Size:Medium</div>
                <div class="prezzo">9</div>
              </div>
              <div class="quantity">
                <h6>Quantity</h6>
                <input type="number">
                <div class="remove text-danger">Remove <i class="fa-solid fa-trash-can"></i></div>
            </div>
            </div>
            <div class="divider-solid  py-4  d-flex justify-content-between align-items-center">
                <img  src="../../../../public/image/categories/hamburgerjpg.jpg" alt="">
                <div class="prodotto">
                <h5>Pizza Pepperoni</h5>
                <div class="descrizione">Size:Medium</div>
                <div class="prezzo">9</div>
              </div>
              <div class="quantity">
                <h6>Quantity</h6>
                <input type="number">
                <div class="remove text-danger">Remove <i class="fa-solid fa-trash-can"></i></div>
            </div>
            </div>
            <div class="divider-solid py-4  d-flex justify-content-between align-items-center">
                <img  src="../../../../public/image/categories/hamburgerjpg.jpg" alt="">
                <div class="prodotto">
                <h5>Pizza Pepperoni</h5>
                <div class="descrizione">Size:Medium</div>
                <div class="prezzo">9</div>
              </div>
              <div class="quantity">
                <h6>Quantity</h6>
                <input type="number" class="form-control">
                <div class="remove text-danger">Remove <i class="fa-solid fa-trash-can"></i></div>
            </div>
            </div>
          </div>
          <div class="col-4 checkout ">
            <div class="text-center mb-5 divider-solid">
                <h5 class="fw-bold">Total</h5>
                <h5 class="fs-1">$24</h5>
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
      }
      </script>
      <style lang="scss" scoped>
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
