<div class="navbar-expand-lg side-bar-area">
  <button class="navbar-toggler navbar-toggler-right collapsed mb-4 btn btn-primary" type="button" data-toggle="collapse" data-target="#side-menu" aria-expanded="false" aria-label="Toggle navigation">
  <i class="ion-ios-settings"></i> Filter
</button>
  <div class="collapse navbar-collapse" id="side-menu">
      <form method="post" action="<?php echo $this->Url->build(["controller" => "Products","action" => "result"]);?>" enctype='multipart/form-data' >
      <div class="search-form-area">
            <h5 class="text-uppercase font-weight-bold">Filter By</h5>
            <div class="form-serch-top">
                <div class="form-group search-field">
                    <i class="ion-ios-search-strong"></i>
                    <input type="text" placeholder="Search for bike" class="form-control" value="" name="keyword">
                </div>
          </div>
          <div class="form-group">
              <label>Postalcode</label>
              <input type="text" placeholder="Postalcode" class="form-control" name="postal_code">
          </div>
          <div class="form-group">
              <label>Distance</label>
              <input type="text" placeholder="10Km" class="form-control">
          </div>
          <div class="form-group">
              <label>Make</label>
              <select class="form-control" name="make_id">
                  <option value="">Select Make</option>
                  <?php
                        foreach ($makes as $make) {
                            echo '<option value="'.$make->id.'">'.$make->make_name.'</option>';
                        }                                
                    ?>
              </select>
          </div>
          <div class="form-group">
              <label>Model</label>
              <select class="form-control" name="model_id">
                  <option value="">Select model</option>
                   <?php
                        foreach ($models as $model) {
                            echo '<option value="'.$model->id.'">'.$model->model_name.'</option>';
                        }                                
                    ?>
              </select>
          </div>
          <div class="form-group">
              <label>Engine Capacity</label>
              <div class="d-flex">
                  <input type="text" placeholder="Min CC" class="form-control mr-2" name="min_cc">
                <input type="text" placeholder="Max CC" class="form-control" name="max_cc">
              </div>
          </div>
          <div class="form-group">
              <label>Price</label>
              <div class="d-flex">
                  <input type="text" placeholder="Min" class="form-control mr-2" name="min_price">
                <input type="text" placeholder="Max" class="form-control" name="max_price">
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
                  <input type="text" placeholder="From" class="form-control mr-2" name="mileage_from">
                <input type="text" placeholder="To" class="form-control" name="mileage_to">
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
              <select class="form-control" name="licence_type">
                  <option value="P">Private</option>
                  <option value="T">Trade</option>
              </select>
          </div>
          <div class="form-group">
              <label>Fuel Type</label>
              <select class="form-control" name="fuel_type">
                  <option value="">Any</option>
                  <option value="P">Petrol</option>
                  <option value="D">Diesel</option>
                  <option value="E">Electric</option>
              </select>
          </div>
         
          <div class="form-group">
              <input type="submit" name="submit" value="Submit" class="nav-link btn btn-primary">
          </div>
        </div>
        </form>
  </div>
</div>