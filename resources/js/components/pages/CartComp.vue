<template>
    <div>
      <div class="container debug mt-5 ">
        <div class="row">
          <div class="col-6 debug p-4 text-center">
            <h4>Carrello</h4>
          </div>
          <div class="col-6 debug p-4 text-center">
            <h4>Checkout</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-8 debug">
            <div class="food py-4 debug d-flex justify-content-between align-items-center">
                <img  src="../../../../public/image/foods/202208310742immagini-magliette-diritto-autore-e1602668592213.jpg" alt="">
                <div class="prodotto">
                <h5>Pizza Pepperoni</h5>
                <div class="descrizione">Size:Medium</div>
                <div class="prezzo">9</div>
              </div>
              <div class="quantity">
                <h6>Quantity</h6>
                <input type="number">
                <div class="remove">Remove</div>
            </div>
            </div>
            <div class="food py-4 debug d-flex justify-content-between align-items-center">
              <img  src="../../../../public/image/foods/202208310742immagini-magliette-diritto-autore-e1602668592213.jpg" alt="">
              <div class="prodotto">
                <h5>Pizza Pepperoni</h5>
                <div class="descrizione">Size:Medium</div>
                <div class="prezzo">9</div>
              </div>
              <div class="quantity">
                <h6>Quantity</h6>
                <input type="number">
                <div class="remove">Remove</div>
            </div>
            </div>
            <div class="food py-4 debug d-flex justify-content-between align-items-center">
              <img  src="../../../../public/image/foods/202208310742immagini-magliette-diritto-autore-e1602668592213.jpg" alt="">
              <div class="prodotto">
                <h5>Pizza Pepperoni</h5>
                <div class="descrizione">Size:Medium</div>
                <div class="prezzo">9</div>
              </div>
              <div class="quantity">
                <h6>Quantity</h6>
                <input type="number">
                <div class="remove">Remove</div>
            </div>
            </div>
            <div class="food py-4 debug d-flex justify-content-between align-items-center">
              <img  src="../../../../public/image/foods/202208310742immagini-magliette-diritto-autore-e1602668592213.jpg" alt="">
              <div class="prodotto">
                <h5>Pizza Pepperoni</h5>
                <div class="descrizione">Size:Medium</div>
                <div class="prezzo">9</div>
              </div>
              <div class="quantity">
                <h6>Quantity</h6>
                <input type="number">
                <div class="remove">Remove</div>
            </div>
            </div>
          </div>
          <div class="col-4 debug">
            <h5>Total</h5>
            <h5>$24</h5>
           <label for="comments">Additional comments</label>
            <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
            <label for="comments">Apply promo code</label>
            <input class="form-control" type="text" placeholder="promo">
            <button class="btn btn-danger w-100 my-3 d-block">Apply promo code</button>
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
    .food {
      img{
        width: 30%;
      }
    }
      </style>
