<template>
    <footer>
        <div class="container">
            <div class="footer-top debug">
                <div class="row">
                    <div class="col-2">
                        <h4>Deliverboom</h4>
                    </div>
                    <div class="col-2">
                        <ul>
                            <h5>Join us</h5>
                            <li>Example</li>
                            <li>Example</li>
                            <li>Example</li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul>
                            <h5>Lets us help you</h5>
                            <li>Example</li>
                            <li>Example</li>
                            <li>Example</li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <ul>
                            <h5>Follow us</h5>
                            <li>Example</li>
                            <li>Example</li>
                            <li>Example</li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <ul>
                            <h5>Download our app</h5>
                            <li>Example</li>
                            <li>Example</li>
                            <li>Example</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-bottom d-flex justify-content-between align-items-center debug">

                <div class="footer-bottom-left">
                    <small>All rights reserved. Made by Createx Studio</small>
                </div>

                <div class="footer-bottom-right">
                    <small>Privacy Policy</small>
                    <small>Terms & Condition</small>
                    <small>Cookies Policy</small>
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

    .debug{
        border: 1px solid black;
        background-color: rgba(255, 0, 0, .3);
    }

    footer{
        .footer-top{
            height: 250px;

            h4, h5{
                margin-bottom: 25px;
            }

            li{
                cursor: pointer;
                margin-bottom: 10px;
            }
        }

        .footer-bottom{
            height: 100px;

            small+small{
                margin-left: 20px;
                cursor: pointer;
            }
        }
    }

    ul{
        list-style: none;
    }

  </style>
