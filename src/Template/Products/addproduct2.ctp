<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center inner-heading">
                <h2>Sell Bike</h2>
                <h5>Sell your bike 5 easy steps</h5>
            </div>
            <div class="col-lg-12">
                <ul class="list-unstyled top-pagition text-center mt-3">
                    <li class="active">
                        <a>
                            <span class="d-flex align-items-center justify-content-center"><i class="ion-checkmark-round"></i></span>
                            <p>Step 1</p>
                        </a>
                    </li>
                    <li class="active">
                        <a>
                            <span class="d-flex align-items-center justify-content-center">2</span>
                            <p>Step 2</p>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="d-flex align-items-center justify-content-center">3</span>
                            <p>Step 3</p>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="d-flex align-items-center justify-content-center">4</span>
                            <p>Step 4</p>
                        </a>
                    </li>
                    <li>
                        <a>
                            <span class="d-flex align-items-center justify-content-center">5</span>
                            <p>Step 5</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="bike-icon d-flex align-items-center justify-content-center">
                    <img src="<?php echo $this->Url->build('/img/bike-icon.png'); ?>" alt="">
                </div>
                <form method="post" action="<?php echo $this->Url->build(["controller" => "Products","action" => "addproduct2", $product->id]);?>" enctype='multipart/form-data' class="form-area text-center" id="frmProduct">
                    <div class="form-group d-sm-flex">
                        <select class="form-control mr-sm-3 mb-3 mb-sm-0" name="make_id">
                            <option value="">Make</option>
                             <?php
                                foreach ($makes as $make) {
                                   echo '<option value="'.$make->id.'" '.(($product->make_id == $make->id)? "selected" : "").'>'.$make->make_name.'</option>'; 
                                }
                            ?>
                        </select>
                        <select class="form-control" name="year">
                            <option value="">Year</option>
                            <?php
                                for($i=date('Y'); $i>=2000; $i--) { 
                                    echo '<option value="'.$i.'" '.(($i == $product->year)? "selected" : "").'>'.$i.'</option>';
                                }
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group d-sm-flex">
                        <select class="form-control mr-sm-3 mb-3 mb-sm-0" name="model_id">
                            <option value="">Model</option>
                            <?php
                                foreach ($models as $model) {
                                   echo '<option value="'.$model->id.'" '.(($product->model_id == $model->id)? "selected" : "").'>'.$model->model_name.'</option>'; 
                                }
                            ?>
                        </select>
                        <select class="form-control" name="engine_size">
                            <option value="">Engine Size</option>
                            <?php
                                foreach ($engins as $engin) {
                                   echo '<option value="'.$engin->id.'" '.(($product->engine_size == $engin->id)? "selected" : "").'>'.$engin->size.'</option>'; 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group d-sm-flex">                       
                       <input type="text" placeholder="Asking Price ($)" name="price" value="<?php echo (($product->price != 0)? $product->price : '');?>" class="form-control mr-sm-3 mb-3 mb-sm-0">
                        <select class="form-control" name="color">
                            <option value="">Colour</option>
                            <?php
                                foreach ($colours as $colour) {
                                   echo '<option value="'.$colour->id.'" '.(($product->color == $colour->id)? "selected" : "").'>'.$colour->name.'</option>'; 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group d-sm-flex">
                        <input type="text" placeholder="CC" name="cc" value="<?php echo (($product->cc != 0)? $product->cc : '');?>" class="form-control mr-sm-3 mb-3 mb-sm-0">
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Category</option>
                            <?php
                                foreach ($categorys as $cat) {
                                   echo '<option value="'.$cat->id.'" '.(($product->category_id == $cat->id)? "selected" : "").'>'.$cat->name.'</option>'; 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group d-sm-flex">
                        <select class="form-control" name="fuel_type" id="fuel_type">
                            <option value="">Fuel Type</option>
                            <option value="P" <?php echo (($product->fuel_type == 'P')? "selected" : "");?>>Petrol</option> 
                            <option value="D" <?php echo (($product->fuel_type == 'D')? "selected" : "");?>>Diesel</option> 
                            <option value="E" <?php echo (($product->fuel_type == 'E')? "selected" : "");?>>Electric</option>                            
                        </select>
                        <select class="form-control" name="licence_type" id="licence_type">
                            <option value="">Licence Type</option>
                            <option value="P" <?php echo (($product->licence_type == 'P')? "selected" : "");?>>Private</option>
                            <option value="T" <?php echo (($product->licence_type == 'T')? "selected" : "");?>>Trade</option>
                        </select>
                    </div>
                    <div class="form-group check-box-area text-left">
                        <div class="checkboxes">
                            <input id="a" type="checkbox" />
                            <label class="green-background" for="a"></label>
                        </div>
                        <p>Accept offers</p>
                    </div>
                    <div class="form-group">
                        <input type="text" name="no_of_owner" placeholder="Optional (Number of previous owners including yourself)" class="form-control" value="<?php echo (($product->no_of_owner != 0)? $product->no_of_owner : '');?>">
                    </div>
                    <div class="form-group">
                        <textarea rows="6" placeholder="Descriptions" name="description" class="form-control"><?php echo $product->description;?></textarea>
                    </div>
                    <div class="form-group d-sm-flex">
                        <input type="text" placeholder="Contact email" name="contact_email" class="form-control mr-sm-3 mb-3 mb-sm-0" value="<?php echo $product->contact_email;?>">
                        <input type="text" placeholder="Contact Number" name="contact_number" class="form-control" value="<?php echo $product->contact_number;?>">
                    </div>
                    <div class="form-group check-box-area text-left">
                        <div class="checkboxes">
                            <input id="b" type="checkbox" name="is_allow_phone" value="1" />
                            <label class="green-background" for="b"></label>
                        </div>
                        <p>Allow buyers to contact me by phone</p>
                    </div>
                    <div class="form-group check-box-area text-left">
                        <div class="checkboxes">
                            <input id="c" type="checkbox" />
                            <label class="green-background" for="c"></label>
                        </div>
                        <p>I have read and understood the Terms and Conditions for biketory private advertisers     </p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        $( "#frmProduct" ).validate({
        rules: {
          'reg_number': "required",
          'mileage': "required"
        },
        messages: {
          'reg_number': "Please enter reg number.",
          'mileage': "Please enter mileage."
        },


      });
    })
    /**/
</script>