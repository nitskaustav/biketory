<?php
    $session = $this->request->session();

?>
<footer>
        <div class="pb-4">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-sm-12 col-footer">
                        <div>
                            <img src="<?php echo $this->Url->build('/img/logo-footer.png'); ?>" alt="" class="img-fluid">
                        </div>
                        <p class="mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="d-flex footer-form">
                            <input type="text" name="email" id="email">
                            <button class="btn btn-primary" onclick="subscribemail();"><i class="ion-ios-email-outline"></i></button>
                        </div>
                        <h5 class="mt-4">Connect us on</h5>
                        <ul class="ft-social-link">
                            <li><a href="<?php echo $session->read('facebook'); ?>" class="d-flex align-items-center justify-content-center"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="<?php echo $session->read('twitter'); ?>" class="d-flex align-items-center justify-content-center"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="<?php echo $session->read('gplus'); ?>" class="d-flex align-items-center justify-content-center"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="<?php echo $session->read('pinterest'); ?>" class="d-flex align-items-center justify-content-center"><i class="ion-social-pinterest"></i></a></li>
                            <li><a href="<?php echo $session->read('instagram'); ?>" class="d-flex align-items-center justify-content-center"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                    <!-- <div class="col-lg-2 col-sm-6 col-footer">
                        <h5>Customer Services</h5>
                        <ul>
                            <li><a href="#">Your Account</a></li>
                            <li><a href="#">Delivery & Returns</a></li>
                            <li><a href="#">Create a Return</a></li>
                            <li><a href="#">Helmet & Clothing Finance</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="#">Frequently Asked Questions</a></li>
                            <li><a href="#">Product Reviews</a></li>
                        </ul>
                    </div> -->
                    <!-- <div class="col-lg-2 col-sm-6 col-footer">
                        <h5>Popular Searches</h5>
                        <ul>
                            <li><a href="#">High Visibility Clothing</a></li>
                            <li><a href="#">Waterproof Clothing</a></li>
                            <li><a href="#">Gifts and Merchandise</a></li>
                            <li><a href="#">Motorcycle Gift Vouchers</a></li>
                        </ul>
                    </div> -->
                    <div class="col-lg-2 col-sm-6 col-footer">
                        <h5>Our Company</h5>
                        <ul>
                            <li><a href="<?php echo $this->Url->build(["controller" => "Cmss","action" => "aboutus"]);?>">About Us</a></li>
                            <!-- <li><a href="#">Your Security</a></li> -->
                            <li><a href="<?php echo $this->Url->build(["controller" => "Users","action" => "contactus"]);?>">Contact Us</a></li>
                            <!-- <li><a href="#">Site Map</a></li> -->
                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-footer">
                        <h5>The Legal Stuff</h5>
                        <ul>
                            <!-- <li><a href="#">Privacy & Cookies</a></li> -->
                            <li><a href="<?php echo $this->Url->build(["controller" => "Cmss","action" => "privacypolicy"]);?>">Privacy Policy</a></li>
                            <!-- <li><a href="#">Terms of Website Use</a> --></li>
                            <!-- <li><a href="#">Acceptable Usage Policy</a></li> -->
                            <li><a href="<?php echo $this->Url->build(["controller" => "Cmss","action" => "termsandcondition"]);?>">Terms & Conditions of Sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ft-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Copyright © 2018 biketory.com. aAl right reserved</p>
                    </div>
                    <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                        <img src="<?php echo $this->Url->build('/img/pay-logo.png'); ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <?php echo $this->Html->script('ajaxupload.3.5.js') ?>
    <?php echo $this->Html->script('gallery.js') ?>  
    </footer>
    <script type="text/javascript">
        function subscribemail(){
            if(document.getElementById("email").value.search(/\S/) == -1){
                alert("Please Enter Valid Email"); return false;
            }

            var email = $("#email").val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email)) {
                alert('Please provide a valid email address');
                email.focus;
                return false;
             }

            $.ajax({
                method: "POST",
                url: '<?php echo $this->request->webroot; ?>users/subscribe',
                data: { email: email}
              })
              .done(function( data ) {
                //alert(data); return false;
                var obj = JSON.parse(data);
                alert(obj.data);
            });
        }
    </script>