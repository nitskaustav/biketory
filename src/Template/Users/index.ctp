
    <section class="py-3 bike-search-area">
        <div class="container">
            <div class="bg-light p-3">
                <h2 class="text-center text-uppercase font-weight-bold">Search for bike</h2>
                 <form method="post" action="<?php echo $this->Url->build(["controller" => "Products","action" => "result"]);?>" enctype='multipart/form-data' class="search-form-bike">
                    <div class="d-flex flex-wrap align-items-center bike-form-1st">
                        <div class="search-field">
                        <i class="ion-ios-search-strong"></i>
                        <input type="text" placeholder="Search" name="keyword">
                    </div>
                    <span class="mx-2">OR</span>
                    <input type="text" placeholder="Postalcode" name="postal_code">
                    <input type="text" placeholder="Distance" name="mileage">
                    <select name="make_id">
                        <option value="">Make</option>
                        <?php
                            foreach ($makes as $make) {
                                echo '<option value="'.$make->id.'">'.$make->make_name.'</option>';
                            }                                
                        ?>
                    </select>
                    <select name="model_id">
                        <option value="">Model</option>
                         <?php
                            foreach ($models as $model) {
                                echo '<option value="'.$model->id.'">'.$model->model_name.'</option>';
                            }                                
                        ?>
                    </select>
                    
                    </div>
                    <div class="d-flex flex-wrap align-items-center bike-form-2nd">
                        <input type="text" placeholder="Type" name="type">
                        <input type="text" placeholder="Min CC" name="min_cc">
                        <input type="text" placeholder="Miax CC" name="max_cc">
                        <input type="text" placeholder="Min Price" name="min_price">
                        <input type="text" placeholder="Max Price" name="max_price">
                        <input type="text" placeholder="Tear From" name="tear_from">
                        <input type="text" placeholder="Tear To" name="tear_to">
                        <input type="text" placeholder="Mileage From" name="mileage_from">
                        <input type="text" placeholder="Mileage To" name="mileage_to">
                        <input type="text" placeholder="Colour" name="colour">
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <a class="more-btn"><span class="more"><i class="ion-ios-plus-outline"></i> More Options</span><span class="less"><i class="ion-ios-minus-outline"></i> Less Option</span></a>
            </div>
        </div>
    </section>
    
    <!--  banner   -->
    
    <section class="banner">
        <div class="container">
            <div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="<?php echo $this->Url->build('/img/banner-img.jpg'); ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?php echo $this->Url->build('/img/banner-img.jpg'); ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?php echo $this->Url->build('/img/banner-img.jpg'); ?>" alt="Third slide">
                    </div>
                  </div>
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <!--   Shop for gear    -->
    
    <section class="gear-seach-area py-4">
        <div class="container">
            <h2 class="heading text-center">Shop for gear</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p class="text-center text-dark-grey">Lorem Ipsum is simply dummy tex   t of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <div class="d-flex gear-search align-items-center">
                        <i class="ion-ios-search-strong"></i>
                        <input type="text" placeholder="Shop for gear">
                        <button class="btn btn-secondary btn-lg ">search</button>
                    </div>
                </div>
            </div>
            <ul class="gear-search-list d-flex flex-wrap justify-content-xl-between justify-content-center">
                <?php foreach($categories as $cat_val) { ?>
                    <li class="text-center">
                        <a href="<?php echo $this->request->webroot; ?>products/searchcategory/<?php echo $cat_val->id; ?>"><div class="icon-img d-flex align-items-center justify-content-center">
                            <img src="<?php echo $this->request->webroot.'category_img/'.$cat_val->path; ?>" alt="">
                        </div></a>
                        <p><?php echo $cat_val->name ?></p>
                    </li>
                <?php } ?>
                <!-- <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/1.png'); ?>" alt="">
                    </div>
                    <p>Clothing</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/2.png'); ?>" alt="">
                    </div>
                    <p>healmet</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/3.png'); ?>" alt="">
                    </div>
                    <p>Oil & Lubrications</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/4.png'); ?>" alt="">
                    </div>
                    <p>Luggage</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/5.png'); ?>" alt="">
                    </div>
                    <p>Maintenance</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/6.png'); ?>" alt="">
                    </div>
                    <p>Electronics</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/7.png'); ?>" alt="">
                    </div>
                    <p>Tyres</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/8.png'); ?>" alt="">
                    </div>
                    <p>Accessories</p>
                </li>
                <li class="text-center">
                    <div class="icon-img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $this->Url->build('/img/icon/9.png'); ?>" alt="">
                    </div>
                    <p>Security</p>
                </li> -->
            </ul>
        </div>
    </section>
    
    
    <!--   app area   -->
    
    <section class="app-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Download <span>biketory</span> <br> App now</h1>
                    <h4>Available on</h4>
                    <button class="btn mb-4 mr-3"><img src="<?php echo $this->Url->build('/img/ios-btn.png'); ?>" alt=""></button>
                    <button class="btn mb-4"><img src="<?php echo $this->Url->build('/img/play-store-icon.png'); ?>" alt=""></button>
                </div>
                <div class="col-lg-6">
                    <img src="<?php echo $this->Url->build('/img/app-mobile.png'); ?>" alt="" class="img-fluid m-auto">
                </div>
            </div>
        </div>
    </section>