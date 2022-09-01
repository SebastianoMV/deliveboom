<template>
    <a href="#" class="card-item">
        <div class="card-images">
            <img src="../../../../public/image/typologies/tipology_07.jpg" alt="" class="thumbnail">
            <img src="../../../../public/image/users/logo_03.png" alt="" class="restaurant-logo">
        </div>
        <h3>Sorbillo!</h3>
        <p>Viva la pizza! La pizza è buona!</p>
    </a>
</template>

<script>
export default {
    name: "CardItem"
}
</script>

<style lang="scss" scoped>
.card-item{
    min-width: 350px;
    height: 360px;
    color: black;
    text-decoration: none;
    margin-bottom: 30px;
    box-shadow: 0px 0px 15px rgb(189, 189, 189);
    border-radius: 10px;
    overflow: hidden;
    text-align: center;
    .card-images{
        position: relative;
        width: 100%;
        height: 62.5%;
        margin-bottom: 40px;
        .thumbnail{
            height: 100%;
            width: 100%;
        }
        .restaurant-logo{
            height: 60px;
            border-radius: 7px;
            position: absolute;
            bottom: 0;
            right: 50%;
            transform: translate(50%, 50%);
        }
    }
    h3{
        font-weight: bolder;
    }
    p{
        font-size: 14px;
        color: gray;
    }
}
</style>
