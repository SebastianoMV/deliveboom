<template>
    <section id="homepage">
      <div class="jumbotron">
        <div class="container">
            <h1>Burgers & Fries</h1>
        </div>
      </div>
      <div class="sliding-menu">
        <div class="container">
            <ul>
                <!-- Prima versione statica, successivamente si dovranno ciclare -->
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_01.jpg" alt="">
                        </div>
                        <div class="typology-title">Giapponese</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_02.jpg" alt="">
                        </div>
                        <div class="typology-title">Pizzeria</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_03.jpg" alt="">
                        </div>
                        <div class="typology-title">Burgers</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_04.jpg" alt="">
                        </div>
                        <div class="typology-title">Cinese</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_05.jpg" alt="">
                        </div>
                        <div class="typology-title">SteakHouse</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_06.jpg" alt="">
                        </div>
                        <div class="typology-title">Italiano</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_07.jpg" alt="">
                        </div>
                        <div class="typology-title">Messicano</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon">
                            <img src="../../../../public/image/typologies/tipology_08.jpg" alt="">
                        </div>
                        <div class="typology-title">Pesce</div>
                    </a>
                </li>
            </ul>
        </div>
      </div>
    </section>
</template>

<script>
export default {
    name: 'HomeComp',
}
</script>

<style lang="scss" scoped>
#homepage{
    .jumbotron{
        position: relative;
        padding: 150px 0 0 0;
        margin: 0;
        border-radius: 0;
        background-color: rgb(170, 0, 0);
        color: white;
        height: 250px;
        background-image: url(/* INSERIRE IMMAGINE DI SFONDO QUI!!! */);
        background-size: cover;
        h1{
            font-weight: bolder;
        }
    }
    .sliding-menu{
        background-color: aliceblue;
        ul{
            overflow-x: auto;
            white-space: nowrap;
            padding: 45px 0 20px 0;
            margin-bottom: 0;
            list-style: none;
            li{
                display: inline-block;
                margin-right: 90px;
                font-size: 16px;
                font-weight: bold;
                a{
                    color: black;
                    text-align: center;
                    text-decoration: none;
                    .icon{
                        width: 110px;
                        height: 82.5px;
                        border-radius: 20px;
                        overflow: hidden;
                        margin-bottom: 10px;
                        text-align: center;
                        transition: .2s box-shadow;
                        img{
                            height: 100%;
                        }
                    }
                    .typology-title{
                        transition: .2s text-shadow;
                    }
                }
                &:hover{
                    .icon{
                        box-shadow: 4px 4px 10px gray;
                    }
                    .typology-title{
                        text-shadow: 4px 4px 10px gray;
                    }
                }
            }
        }
    }
}
</style>
