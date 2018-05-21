<section class="inner-banner py-4">
    <div class="container">
        <div class="inner-banner-area">
            <img src="<?php echo $this->Url->build('/img/inner-banner.jpg'); ?>" alt="" class="img-fluid">
            <a class="close-btn"><i class="ion-close"></i></a>
        </div>
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
               <?php echo $this->element('filter');?>               
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
                                <option value="h">Price (Highest)</option>
                                <option value="l">Price (Lowest)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        foreach ($products as $product) { 
                        //pr($product);                          
                    ?>
                    <div class="col-lg-4 col-item">
                        <figure>
                            <a href="<?php echo $this->Url->build(["controller" => "Products","action" => "details", $product->id]);?>">
                            <?php
                                if(isset($product->productsimages[0]->name) and $product->productsimages[0]->name != ""){
                            ?>
                            <div class="item-img" style="background:url(<?php echo $this->Url->build('/product_img/'.$product->productsimages[0]->name); ?>)"> 
                            </div>
                            <?php
                                }
                                else{
                             ?>
                             <div class="item-img" style="background:url(<?php echo $this->Url->build('/product_img/no-image.png'); ?>)"> 
                            </div>
                             <?php       
                                }
                            ?>
                            </a>
                            <figcaption>
                                <div class="top-part p-3">
                                    <h5 class="font-weight-bold"><?php echo $product->reg_number;?></h5>
                                     <h5 class="text-primary font-weight-bold mb-0">$<?php echo number_format($product->price,2);?></h5>
                                </div>
                                <div class="bottom-part p-3">
                                    <p class="mb-0">Model: <b><?php echo $product->Bikemodels->model_name;?> - M</b></p>
                                    <p class="mb-0">Make: <b><?php echo $product->Makes->make_name;?></b></p>
                                    <p class="mb-0"><i id="heart_<?php echo $product->id; ?>" class="fa fa-heart" aria-hidden="true" style="color: none; cursor: pointer;" onclick="addtowishlist(id);"></i></p>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <?php
                        }
                    ?>                  
                    
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
function addtowishlist(id){
    //alert(id);

    $.ajax({
        method: "POST",
        url: '<?php echo $this->request->webroot; ?>products/addtowishlist',
        data: { id: id}
        })
        .done(function( data ) {
            alert(data);return false;
        var obj = jQuery.parseJSON( data );
        alert(obj);
        // if(obj.Ack  == 1){
        // $('#total_image').val(parseInt($('#total_image').val())-1);                   
        //   $('#image_'+id).html("");
        // }
    });
}
</script>