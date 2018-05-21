    <!--   inner  banner   -->
    
    <section class="inner-banner py-4">
        <div class="container">
            <!-- <div class="inner-banner-area">
                <img src="img/inner-banner.jpg" alt="" class="img-fluid">
                <a class="close-btn"><i class="ion-close"></i></a>
            </div> -->
        </div>
    </section>
    
    <!--   search   result   -->

    <section class="pb-5">
        <div class="container">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
              </ol>
            </nav>
            <div class="row">
                <div class="col-lg-3">
                    <div class="navbar-expand-lg side-bar-area">
                          <button class="navbar-toggler navbar-toggler-right collapsed mb-4 btn btn-primary" type="button" data-toggle="collapse" data-target="#side-menu" aria-expanded="false" aria-label="Toggle navigation">
                          <i class="ion-ios-settings"></i> Filter
                        </button>
                          <div class="collapse navbar-collapse" id="side-menu">
                              <div class="search-form-area">
                                    <h5 class="text-uppercase font-weight-bold">Filter By</h5>
                                    <div class="form-serch-top">
                                        <div class="form-group search-field">
                                            <i class="ion-ios-search-strong"></i>
                                            <input type="text" placeholder="Search for bike" class="form-control">
                                        </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Postalcode</label>
                                      <input type="text" placeholder="Postalcode" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label>Distance</label>
                                      <input type="text" placeholder="10Km" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label>Make</label>
                                      <select class="form-control">
                                          <option>Harley-Davidson</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Model</label>
                                      <select class="form-control">
                                          <option>Harley-Davidson</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Engine Capacity</label>
                                      <div class="d-flex">
                                          <input type="text" placeholder="Min CC" class="form-control mr-2">
                                        <input type="text" placeholder="Max CC" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Price</label>
                                      <div class="d-flex">
                                          <input type="text" placeholder="Min" class="form-control mr-2">
                                        <input type="text" placeholder="Max" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Make Year</label>
                                      <div class="d-flex">
                                          <input type="text" placeholder="From" class="form-control mr-2">
                                        <input type="text" placeholder="To" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Mileage </label>
                                      <div class="d-flex">
                                          <input type="text" placeholder="From" class="form-control mr-2">
                                        <input type="text" placeholder="To" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Color</label>
                                      <select class="form-control">
                                          <option>Red</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Post By</label>
                                      <select class="form-control">
                                          <option>Private</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Fuel Type</label>
                                      <select class="form-control">
                                          <option>Petrol</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Make</label>
                                      <input type="text" placeholder="Keyword" class="form-control">
                                  </div>
                                </div>
                          </div>
                      </div>
                    
                </div>
                <div class="col-lg-9">
                    <div class="row border border-top-0 border-right-0 border-left-0 pb-3 align-items-center">
                        <div class="col-lg-8 col-sm-6">
                            <p class="text-grey text-uppercase mb-lg-0">Showing 1 of 234</p>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="d-flex align-items-center sort-by">
                                <span class="mr-3 text-uppercase font-weight-bold">Sort by</span>
                                <select class="form-control">
                                    <option>Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <?php foreach($gears as $gear_val) { 
                                $upload = $gear_val->upload;
                                $upload_array = explode(",", $upload);
                                $product_image_path = $this->request->webroot . 'product_img/' . $upload_array[0];

                      ?>
                          <div class="col-lg-4 col-item">
                            <figure>
                                <div class="item-img" style="background:url(<?php echo $product_image_path; ?>)"> 
                                </div>
                                <figcaption>
                                    <div class="top-part p-3">
                                        <h5 class="font-weight-bold"><?php echo $gear_val->product_name; ?></h5>
                                         <h5 class="text-primary font-weight-bold mb-0">$<?php echo $gear_val->price; ?>.00</h5>
                                    </div>
                                    <div class="bottom-part p-3">
                                        <p class="mb-0">Category: <b><?php echo $gear_val->category->name; ?></b></p>
                                        <p class="mb-0">Brand: <b><?php echo $gear_val->brand->brand_name; ?></b></p>
                                        <p>
                                          <?php
                                            $details = $this->Url->build(["controller" => "Products","action" => "categorydetails", $gear_val->id]);
                                          ?>
                                          <a href="<?php echo $details; ?>" class="btn btn-sm btn-secondary">Details</a></p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                      <?php } ?>
                        <!-- <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        <div class="col-lg-4 col-item">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    