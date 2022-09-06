<template>
    <footer>
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-xl-3 ">
                        <h3>Deliveb<i class="fa-solid fa-bomb fix-bomb"></i><i class="fa-solid fa-bomb fix-bomb"></i>m</h3>
                    </div>
                    <div class="col-2">
                        <ul>
                            <h5>Join us</h5>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Restaurants</a></li>
                            <li><a href="#">Become a Courier</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-3">
                        <ul>
                            <h5>Let us help you</h5>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul>
                            <h5>Follow us</h5>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-4">
                        <h5>Download our app</h5>
                        <a class="social-btn" href="#">
                            <div class="logo">
                                <i class="fa-brands fa-apple"></i>
                            </div>
                            <div class="side-text">
                                <span class="small-text">Download on the</span><br>
                                <b>App Store</b>
                            </div>
                        </a>
                        <a class="social-btn" href="#">
                            <div class="logo">
                                <i class="fa-brands fa-google-play"></i>
                            </div>
                            <div class="side-text">
                                <span class="small-text">Download on the</span><br>
                                <b>Google Play</b>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-between align-items-center debug">
                <div class="footer-bottom-left">
                    <span class="footer-text"><i class="fa-regular fa-copyright"></i> All rights reserved. Made by Createx Studio</span>
                </div>
                <div class="footer-bottom-right">
                    <span class="footer-text"><a href="#">Privacy Policy</a></span>
                    <span class="footer-text"><a href="#">Terms & Conditions</a></span>
                    <span class="footer-text"><a href="#">Cookies Policy</a></span>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'FooterComp'
}
</script>

<style lang="scss" scoped>
    footer{
        background-color: #2b3445;
        color: white;
        padding-top: 40px;
        a{
            color: #9ea6b6;
            text-decoration: none;
            &:hover{
                color: wheat;
            }
        }
        .footer-top{
            min-height: 250px;
            border-bottom: 1px solid #696f7b;
            h3,
            h5{
                font-weight: bolder;
                margin-bottom: 25px;
            }
            ul{
                list-style: none;
                padding: 0;
                li{
                    margin-bottom: 10px;
                    font-size: 14px;
                    line-height: 14px;
                    font-weight: bold;
                }
            }
            .social-btn{
                color: inherit;
                text-decoration: none;
                border: 1px solid #696f7b;
                border-radius: 10px;
                margin-bottom: 10px;
                display: flex;
                width: 160px;
                transition: .2s background-color;
                .logo{
                    display: flex;
                    align-items: center;
                    width: 50px;
                    text-align: center;
                    font-size: 30px;
                    i{
                        margin: auto
                    }
                }
                .small-text{
                    font-size: 12px;
                    color: #aaadb4;
                }
                b{
                    display: inline-block;
                    margin-bottom: 3px;
                }
                &:hover{
                    background-color: rgba(0, 0, 0, .3);
                }
            }
            .fix-bomb{
                margin-left: 1px;
                margin-right: -4px;
            }
        }
        .footer-bottom-left{
            padding-right: 30px;
        }
        .footer-bottom{
            height: 100px;
            .footer-text{
                font-size: 11px;
                color: #9ea6b6;
            }
            .footer-bottom-right{
                display: flex;
                column-gap: 30px;
            }
            small{
                margin-left: 20px;
                cursor: pointer;
            }
        }
    }
</style>
