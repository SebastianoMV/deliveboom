<template>
    <div class="food-item">
        <img src="../../../../public/image/typologies/tipology_07.jpg" alt="">
        <div class="food-item-text">
            <h5>Pizza Br1 Special</h5>
            <p>Pomodoro, Mozzarella di bufala, Stracchino, Wurstel</p>
        </div>
        <div class="lower-btns">
            <span class="price">&euro;7.00</span>
            <a class="btn-cart" href="#">
                <i class="fa-solid fa-cart-plus"></i>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    name: "FoodItem"
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
            padding: 0 10px;
            border-radius: 5px;
            transition: .2s background-color;
            .fa-cart-plus{
                color: white;
            }
            &:hover{
                background-color: #C5272A;
            }
        }
    }
}
</style>
