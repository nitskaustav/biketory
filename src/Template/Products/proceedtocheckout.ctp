<?php
//echo "<pre>";
//print_r($all_temp_cart_data);
?>
    
    <section class="py-5 checkout-page">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-8">
                    <form class="">
                        <h3 class="mb-4">Shipping Information</h3>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                    <form class="row payment-form">
                        <h3 class="my-4  ml-3">Payment Method</h3>
                        <div class="form-group col-12">
                            <span class="radios">
                                                <input type="radio" name="a">
                                                <span class="mx-2">Pay with <img src="<?php echo $this->request->webroot; ?>img/paypal-logo.png" style="width:100px;"></span>
                                            </span>
                        </div>
                        <!-- <div class="form-group col-12">
                            <span class="radios">
                                <input type="radio" name="a">
                                <span class="mx-2">Pay with <img src="img/Credit-Card-Visa-And-Master-Card-PNG-File.png" style="width:100px;"></span>
                            </span>
                        </div> -->
                        <div class="form-group col-12">
                            <span class="radios">
                                <input type="radio" name="a">
                                <span class="mx-2">COD <img src="<?php echo $this->request->webroot; ?>img/cod.png" style="width:100px;"></span>
                            </span>
                        </div>
                            <!-- <div class="form-group col-12">
                                <label>Name On Your Card</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label>Card Number</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-8">
                                <label>Expiry Date</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>CVV3</label>
                                <input type="text" class="form-control">
                            </div> -->
                        <div class="form-group col-4">
                                <button class="btn btn-primary btn-lg">Pay Now</button>
                            </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="product-info p-4 border">
                        <figure class="row mt-4">
                <div class="col-2 pr-0">
                    <img src="img/bike/1.jpg" alt="" class="img-fluid">
                </div>
                <figcaption class="col-7 pr-0">
                    <p class="mb-0">Titanium granitt, polert</p>
                    
                    
                </figcaption>
                <div class="col-3 text-right">$158</div>
            </figure>
                        <figure class="row mt-4">
                <div class="col-2 pr-0">
                    <img src="img/bike/2.jpg" alt="" class="img-fluid">
                </div>
                <figcaption class="col-7 pr-0">
                    <p class="mb-0">Titanium granitt, polert</p>
                </figcaption>
                <div class="col-3 text-right">$158</div>
            </figure>
                        <figure class="row mt-4">
                <div class="col-2 pr-0">
                    <img src="img/bike/3.jpg" alt="" class="img-fluid">
                </div>
                <figcaption class="col-7 pr-0">
                    <p class="mb-0">Titanium granitt, polert</p>
                </figcaption>
                <div class="col-3 text-right">$158</div>
            </figure>
                        <ul class="pay-list">
                            <li class="d-flex justify-content-between">
                                          <span>Price</span>
                                          
                                          <span>$4523</span>
                                      </li>
                            <li class="d-flex justify-content-between">
                                          <span>Shipping Charge</span>
                                          <span>$143</span>
                                      </li>
                            <li class="d-flex justify-content-between">
                                          <b>Total</b>
                                          <b>$4666</b>
                                      </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>