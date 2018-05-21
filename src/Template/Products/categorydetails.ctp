<?php
// echo "<pre>";
//        print_r($gears);
// echo $gears[0]['product_name'];die;

foreach ($gears as $gear_val) {
	$category_name = $gear_val->category->name;
	$brand_name = $gear_val->brand->brand_name;
	$size = $gear_val->size_id;
	$price = $gear_val->price;
	$description = $gear_val->description;
	$item_location = $gear_val->item_location;
	$product_name = $gear_val->product_name;
	$upload = $gear_val->upload;
}
$upload_array = explode(",", $upload);
// print_r($upload_array);
// die;
?>
    
    <!--   inner  banner   -->
    
    <section class="inner-banner py-4">
        <div class="container">
            <div class="inner-banner-area">
                <img src="img/inner-banner.jpg" alt="" class="img-fluid">
                <a class="close-btn"><i class="ion-close"></i></a>
            </div>
        </div>
    </section>
    
    <!--   search   details   -->
    
    <div class="search-reasult">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="product-box">
                    <div class="d-flex flex-wrap justify-content-between product-box-top-heading">
                        <h2><?php echo $product_name; ?></h2>
                        <div>
                            <h3><span>$<?php echo $price; ?></span></h3>
                            <ul class="list-unstyled">
                                <li><a><i class="ion-heart"></i></a></li>
                                <li><a><i class="ion-android-share-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
					<div class="product-slider">
					<div id="ninja-slider">
            			<div class="slider-inner">
            			<ul>
            				<?php foreach ($upload_array as $upload_val) { ?>
            					<li><a class="ns-img" href="<?php echo $this->request->webroot . 'product_img/'.$upload_val; ?>"></a></li>
            				<?php } ?>
            				<!-- <li><a class="ns-img" href="img/bike/1.jpg"></a></li>
            				<li><a class="ns-img" href="img/bike/2.jpg"></a></li>
            				<li><a class="ns-img" href="img/bike/3.jpg"></a></li>
            				<li><a class="ns-img" href="img/bike/4.jpg"></a></li>
            				<li><a class="ns-img" href="img/bike/5.jpg"></a></li> -->       				
            			</ul>
							<!--<div class="big-img">
						 		<img src="img/cannon-big.jpg" alt="" /
							</div>>-->
						</div>
					</div>
						<div class="thumbs">
							<ul>
								
								<li>
									<div id="thumbnail-slider" style="float:left;">
            						<div class="inner">
            						 <ul>
            						 	<?php foreach ($upload_array as $upload_val) { ?>
			            					<li>
		            						 	<div class="overlay"></div>
		            						 	<a class="thumb" href="<?php echo $this->request->webroot . 'product_img/'.$upload_val; ?>"></a>
		            						 	<p class="mb-0">Category: <b><?php echo $gear_val->category->name; ?></b></p>
                                        <p class="mb-0">Brand: <b><?php echo $gear_val->brand->brand_name; ?></b></p>
                                        
	            						 	</li>
			            				<?php } ?>
            						 	<!-- <li>
            						 	<div class="overlay"></div>
            						 	<a class="thumb" href="img/bike/1.jpg"></a>
            						 	</li>
            						 	<li>
            						 	<div class="overlay"></div>
            						 	<a class="thumb" href="img/bike/2.jpg"></a>
            						 	</li>
            						 	<li>
            						 	<div class="overlay"></div>
            						 	<a class="thumb" href="img/bike/3.jpg"></a>
            						 	</li>
            						 	<li>
            						 	<div class="overlay"></div>
            						 	<a class="thumb" href="img/bike/4.jpg"></a>
            						 	</li>
            						 	<li>
            						 	<div class="overlay"></div>
            						 	<a class="thumb" href="img/bike/5.jpg"></a>
            						 	</li> -->
            						 </ul>
            						</div>
            						</div>
								</li>
								
							</ul>
						</div>
					</div>
					<!-- <div class="icons-box">
						<ul  class="d-flex justify-content-center flex-wrap" >
							<li>
								<div class="icon"><img src="img/details/iocn-1.png" alt="" /></div>
								<p>Make:</p>
								<span>Harley-Davidson</span>
							</li>
                            <li>
								<div class="icon"><img src="img/details/iocn-2.png" alt="" /></div>
								<p>Make:</p>
								<span>Harley-Davidson</span>
							</li>
                            <li>
								<div class="icon"><img src="img/details/iocn-3.png" alt="" /></div>
								<p>Make:</p>
								<span>Harley-Davidson</span>
							</li>
                            <li>
								<div class="icon"><img src="img/details/iocn-4.png" alt="" /></div>
								<p>Make:</p>
								<span>Harley-Davidson</span>
							</li>
                            <li>
								<div class="icon"><img src="img/details/iocn-5.png" alt="" /></div>
								<p>Make:</p>
								<span>Harley-Davidson</span>
							</li>
						</ul>
					</div> -->
					<div class="dsc">
						<h2>Details <span>Posted 1 month ago</span></h2>
						<div class="details">
							<ul>
								<li>
									<div class="titles">Category:</div>
									<div class="valus"><?php echo $category_name; ?></div>
								</li>
								<li>
									<div class="titles">Brand:</div>
									<div class="valus"><?php echo $brand_name; ?></div>
								</li>
								<li>
									<div class="titles">Name:</div>
									<div class="valus"><?php echo $product_name; ?></div>
								</li>
								<li>
									<div class="titles">Size:</div>
									<div class="valus"><?php echo $size; ?></div>
								</li>
							</ul>
						</div>
					</div>
					<div class="dsc">
						<h2>Description</h2>
						<p><?php echo $description; ?></p>
						<p>
                          <?php
                            $addtocart = $this->Url->build(["controller" => "Products","action" => "addtocart", $gear_val->id]);
                          ?>
                          <a href="<?php echo $addtocart; ?>" class="btn btn-sm btn-secondary">Add To Cart</a>
                      	</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="detail-right">
					<div class="social-box">
						<div class="row">
							<div class="col-md-12">
								<div class="owner">
									<h2>Miss Jenny</h2>
									<h3>Visit Website</h3>
									<h3>Profile’s Inventory</h3>
									<p>
										<a href="" class="btn call-btn">Reveal Phone</a>
									</p>
									<p>
										<a href="" class="btn request-btn">Request</a>
									</p>
								</div>
							</div>
						</div>
						
					</div>
					<div class="location">
							<h2>Location</h2>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3046.595913017221!2d-111.7244243845393!3d40.21805077938876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x874d997eb384a943%3A0x413fee719772de7a!2sProvo+Airport!5e0!3m2!1sen!2sin!4v1503403518731" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="location">
						<h3>Message</h3>
						<form>
							<div class="form-group">
							<input class="form-control" type="text" placeholder="Name">
							</div>
							<div class="form-group">
							<input class="form-control" type="text" placeholder="Email">
							</div>
							<div class="form-group">
							<input class="form-control" type="text" placeholder="Phone">
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Message" rows="3"></textarea>
							</div>
							<div>
								<button href="" class="btn btn-primary">Send Message</button>
							</div>
						</form>
					</div>
					<div class="clearfix"></div>
					<div class="location">
						<h3>User Reviews</h3>
						<div class="review-box">
							<h2>Mark Rufalo <span>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
							</span></h2>
							<h3>July 22, 2017</h3>
							<p>
								Sed ullamcorper placerat enim vel tincidunt. Phasellus ante sem, molestie nec nulla sit amet,.
							</p>	
						</div>
						<div class="review-box">
							<h2>Mark Rufalo <span>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
							</span></h2>
							<h3>July 22, 2017</h3>
							<p>
								Sed ullamcorper placerat enim vel tincidunt. Phasellus ante sem, molestie nec nulla sit amet,.
							</p>	
						</div>
						<div class="review-box">
							<h2>Mark Rufalo <span>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
								<i class="ion-android-star"></i>
							</span></h2>
							<h3>July 22, 2017</h3>
							<p>
								Sed ullamcorper placerat enim vel tincidunt. Phasellus ante sem, molestie nec nulla sit amet,.
							</p>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
    
    <section class="py-5">
        <div class="container">
            <h2>Related Products</h2>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-item">
                    <figure>
                        <div class="item-img" style="background:url(./img/pic/1.jpg)"> 
                        </div>
                        <figcaption>
                        <div class="top-part p-3">
                            <h5 class="font-weight-bold">Harley-Davidson-Fat-Bob</h5>
                            <h5 class="text-primary font-weight-bold mb-0">$30,000.00</h5>
                        </div>
                        <div class="bottom-part p-3">
                            <p class="mb-0">Model: <b>Fat-Bob-9949 - M</b></p>
                            <p class="mb-0">Make: <b>2017</b></p>
                        </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-item">
                    <figure>
                        <div class="item-img" style="background:url(./img/pic/1.jpg)"> 
                        </div>
                        <figcaption>
                        <div class="top-part p-3">
                            <h5 class="font-weight-bold">Harley-Davidson-Fat-Bob</h5>
                            <h5 class="text-primary font-weight-bold mb-0">$30,000.00</h5>
                        </div>
                        <div class="bottom-part p-3">
                            <p class="mb-0">Model: <b>Fat-Bob-9949 - M</b></p>
                            <p class="mb-0">Make: <b>2017</b></p>
                        </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-item">
                    <figure>
                        <div class="item-img" style="background:url(./img/pic/1.jpg)"> 
                        </div>
                        <figcaption>
                        <div class="top-part p-3">
                            <h5 class="font-weight-bold">Harley-Davidson-Fat-Bob</h5>
                            <h5 class="text-primary font-weight-bold mb-0">$30,000.00</h5>
                        </div>
                        <div class="bottom-part p-3">
                            <p class="mb-0">Model: <b>Fat-Bob-9949 - M</b></p>
                            <p class="mb-0">Make: <b>2017</b></p>
                        </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 col-sm-6 col-item">
                    <figure>
                        <div class="item-img" style="background:url(./img/pic/1.jpg)"> 
                        </div>
                        <figcaption>
                        <div class="top-part p-3">
                            <h5 class="font-weight-bold">Harley-Davidson-Fat-Bob</h5>
                            <h5 class="text-primary font-weight-bold mb-0">$30,000.00</h5>
                        </div>
                        <div class="bottom-part p-3">
                            <p class="mb-0">Model: <b>Fat-Bob-9949 - M</b></p>
                            <p class="mb-0">Make: <b>2017</b></p>
                        </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>