<!-- MENU SECTION -->
<?php ?>
<div id="left" >
    <div class="media user-media well-small"> <a class="user-link" href="javascript:void(0);"> 

        </a> <br />
        <div class="media-body">
            <h5 class="media-heading"> <?php echo $SiteSettings['site_title']; ?> Admin </h5>
            <ul class="list-unstyled user-info">
                <li> <!-- <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online --> </li>
            </ul>
        </div>
        <br />
    </div>
    <ul id="menu" class="collapse" style=" width:100%; margin-top:30px;">
        <li class="panel <?php if ($this->request->params['action'] == 'home') { ?> active <?php } else { ?><?php } ?>"> <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "home"]); ?>" >  Dashboard </a> </li>


        <!----------------- Site Settings Start ------------------------>

        <li class="panel <?php if ($this->request->params['controller'] == 'SiteSettings') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#sitesettings"> Site Settings </a>
            <ul class="<?php echo $this->request->params['controller'] == 'SiteSettings' ? 'in' : 'collapse' ?>" id="sitesettings">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "SiteSettings", "action" => "logo"]); ?>"><i class="icon-angle-right"></i> Logo Management </a></li>

                <li class=""><a href="<?php echo $this->Url->build(["controller" => "SiteSettings", "action" => "sitedetail"]); ?>"><i class="icon-angle-right"></i> Site Settings </a></li>

                <li class=""><a href="<?php echo $this->Url->build(["controller" => "SiteSettings", "action" => "sitesociials"]); ?>"><i class="icon-angle-right"></i> Social Settings </a></li>




            </ul>
        </li> 

        <!----------------- Site Settings End ------------------------>



        <!----------------- Slider Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#slider"> Slider Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editslider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'sliderview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="slider">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listslider"]); ?>"><i class="icon-angle-right"></i> Slider List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "addslider"]); ?>"><i class="icon-angle-right"></i> Add Slider </a></li>
            </ul>
        </li>

        <!----------------- Slider Management End ------------------------>

    <!----------------- Gear Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'listgear') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'addgear') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'editgear') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'geardelete') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'gearview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#gear"> Gear Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'listgear') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'addgear') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'editgear') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'geardelete') || ($this->request->params['controller'] == 'Products' && $this->request->params['action'] == 'gearview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="gear">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Products", "action" => "listgear"]); ?>"><i class="icon-angle-right"></i> Gear List </a></li>                 
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Products", "action" => "addgear"]); ?>"><i class="icon-angle-right"></i> Add Gear </a></li>
            </ul>
        </li>

    <!----------------- Gear Management End ------------------------>





        <!----------------- User Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listuser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'add') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'edituser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#users"> Users Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listuser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'add') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'edituser') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userdelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'userview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="users">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listuser"]); ?>"><i class="icon-angle-right"></i> Users List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "add"]); ?>"><i class="icon-angle-right"></i> Add Users </a></li>
            </ul>
        </li>

        <!----------------- Users Management End ------------------------>


        <!----------------- Brands Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listbrand') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addbrand') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editbrand') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'branddelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'brandview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#brands"> Brands Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listbrand') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addbrand') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editbrand') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'branddelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'brandview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="brands">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listbrand"]); ?>"><i class="icon-angle-right"></i> Brand List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "addbrand"]); ?>"><i class="icon-angle-right"></i> Add Brands </a></li>
            </ul>
        </li>

        <!----------------- Brands Management End ------------------------>

        <!----------------- Size Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'listsize') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'addsize') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'editsize') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'sizedelete') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'sizeview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#size"> Size Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'listsize') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'addsize') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'editsize') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'sizedelete') || ($this->request->params['controller'] == 'Sizes' && $this->request->params['action'] == 'sizeview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="size">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Sizes", "action" => "listsize"]); ?>"><i class="icon-angle-right"></i> Size List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Sizes", "action" => "addsize"]); ?>"><i class="icon-angle-right"></i> Add Size </a></li>
            </ul>
        </li>

        <!----------------- Size Management End ------------------------>

        

        <!----------------- Attributes Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'listattribute') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'addattribute') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'editattribute') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'attributedelete') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'attributeview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#attribute"> Attribute Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'listattribute') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'addattribute') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'editattribute') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'attributedelete') || ($this->request->params['controller'] == 'Attributes' && $this->request->params['action'] == 'attributeview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="attribute">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Attributes", "action" => "listattribute"]); ?>"><i class="icon-angle-right"></i> Attribute List </a></li>                   
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Attributes", "action" => "addattribute"]); ?>"><i class="icon-angle-right"></i> Add Attribute </a></li>
            </ul>
        </li>

        <!----------------- Attributes Management End ------------------------>



        <!----------------- Seller Provider Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_verified') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_nonverified') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'companydelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceproviderview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#company"> Sellers Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_verified') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'listserviceprovider_nonverified') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'addserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'editserviceprovider') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'companydelete') || ($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'serviceproviderview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="company">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listserviceprovider_nonverified"]); ?>"><i class="icon-angle-right"></i> Non verified Seller </a></li>
               <!-- <li class=""><a href="<?php echo $this->Url->build(["controller" => "Reviews", "action" => "listserviceprovider"]); ?>"><i class="icon-angle-right"></i> Non verified Seller </a></li>-->
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "listserviceprovider_verified"]); ?>"><i class="icon-angle-right"></i> Verified Seller List </a></li>

                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "addserviceprovider"]); ?>"><i class="icon-angle-right"></i> Add Seller </a></li>
            </ul>
        </li>

        <!----------------- Seller Provider Management End ------------------------>



        <!----------------- Service Type Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypeview')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#services"> Type Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editservicetype') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'servicetypeview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="services">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listservicetype"]); ?>"><i class="icon-angle-right"></i> Type List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addservicetype"]); ?>"><i class="icon-angle-right"></i> Add Type </a></li>
            </ul>
        </li>



        <!----------------- Service Type Management End ------------------------> 

         <!----------------- Make Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Makes' && $this->request->params['action'] == 'add' || $this->request->params['action'] == 'index')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#make"> Make Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Makes' && $this->request->params['action'] == 'listmake')) { ?> in <?php } else { ?> collapse <?php } ?>" id="make">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Makes", "action" => "index"]); ?>"><i class="icon-angle-right"></i> Make List </a></li>                   
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Makes", "action" => "add"]); ?>"><i class="icon-angle-right"></i> Add Make </a></li>
            </ul>
        </li>

        <!----------------- Make Management End ------------------------> 


         <!----------------- Engine size Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'EngineSizes' && $this->request->params['action'] == 'add' || $this->request->params['action'] == 'index')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#EngineSizes"> Engine size Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'EngineSizes' && $this->request->params['action'] == 'listmake')) { ?> in <?php } else { ?> collapse <?php } ?>" id="EngineSizes">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "EngineSizes", "action" => "index"]); ?>"><i class="icon-angle-right"></i> Engine size List </a></li>                   
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "EngineSizes", "action" => "add"]); ?>"><i class="icon-angle-right"></i> Add Engine size </a></li>
            </ul>
        </li>

        <!----------------- Engine size Management End ------------------------> 

         <!----------------- Colours Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Colours' && $this->request->params['action'] == 'add' || $this->request->params['action'] == 'index')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#colours"> Colour Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Colours' && $this->request->params['action'] == 'listmake')) { ?> in <?php } else { ?> collapse <?php } ?>" id="colours">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Colours", "action" => "index"]); ?>"><i class="icon-angle-right"></i> Colour List </a></li>                   
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Colours", "action" => "add"]); ?>"><i class="icon-angle-right"></i>Add colour</a></li>
            </ul>
        </li>

        <!----------------- Colours Management End ------------------------> 



        <!----------------- Car Make Management Start ------------------------>

<!--        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makeview')) { ?> active <?php } else { ?><?php } ?>"> 
    <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#servicesmake"> Car Make Management </a>
    <ul class="<?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmake') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makedelete') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'makeview')) { ?> in <?php } else { ?> collapse <?php } ?>" id="servicesmake">
        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listmake"]); ?>"><i class="icon-angle-right"></i> Car Make List </a></li>					
        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addmake"]); ?>"><i class="icon-angle-right"></i> Add Car Make </a></li>
    </ul>
</li>-->

        <!----------------- Car Make Management End ------------------------> 


        <!----------------- Car Model Management Start ------------------------>

        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'modeldelete')) { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#model"> Model Management </a>
            <ul class="<?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'addmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'editmodel') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'modeldelete')) { ?> in <?php } else { ?> collapse <?php } ?>" id="model">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listmodel"]); ?>"><i class="icon-angle-right"></i> Model List </a></li>					
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "addmodel"]); ?>"><i class="icon-angle-right"></i> Add Model </a></li>
            </ul>
        </li>

        <!----------------- Car Model Management End ------------------------>



        <!----------------- Booking Management Start -------------------------------->

        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listbooking')) { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#books"> Order Management </a>
            <ul class="<?php if ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listbooking') { ?> in <?php } else { ?> collapse <?php } ?>" id="books">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listbooking"]); ?>"><i class="icon-angle-right"></i> Booking List </a></li>					
            </ul>
        </li>   

        <!----------------- Booking Management End -------------------------------->



        <!----------------- Contents Management Start -------------------------------->

        <li class="panel <?php if ($this->request->params['controller'] == 'Contents') { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#contents"> Contents </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Contents' ? 'in' : 'collapse' ?>" id="contents">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Contents", "action" => "index"]); ?>"><i class="icon-angle-right"></i> Contents List </a></li>					
            </ul>
        </li>   

        <!----------------- Contents Management End -------------------------------->




        <!----------------- Email Templates Management  Start -------------------------------->

        <li class="panel <?php if ($this->request->params['controller'] == 'EmailTemplates') { ?> active <?php } else { ?> '' <?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#email_tpl"> Email Templates </a>
            <ul class="<?php echo $this->request->params['controller'] == 'EmailTemplates' ? 'in' : 'collapse' ?>" id="email_tpl">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "EmailTemplates", "action" => "index"]); ?>"><i class="icon-angle-right"></i> Email Templates List </a></li>					
            </ul>
        </li>   

        <!----------------- Email Templates Management End -------------------------------->

        <!-----------------  Email Subscribers  Start -------------------------------->

<!--        <li class="panel <?php if (($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listemailsubscriber') || ($this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'sendemail')) { ?> active <?php } else { ?> '' <?php } ?>"> 
    <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#Suscribers"> Email Subscribers </a>
    <ul class="<?php echo $this->request->params['controller'] == 'Services' && $this->request->params['action'] == 'listemailsubscriber' ? 'in' : 'collapse' ?>" id="Suscribers">
        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "listemailsubscriber"]); ?>"><i class="icon-angle-right"></i>  Subscribers List </a></li>			
        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Services", "action" => "sendemail"]); ?>"><i class="icon-angle-right"></i>  Send Email </a></li>
    </ul>
    
</li>   -->

        <!----------------- Email Subscribers End -------------------------------->


        <!-----------------  Statistics  Start -------------------------------->

<!--        <li class="panel <?php if ($this->request->params['controller'] == 'Statistics') { ?> active <?php } else { ?> '' <?php } ?>"> 
    <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#Statistics"> Statistics </a>
    <ul class="<?php echo $this->request->params['controller'] == 'Statistics' ? 'in' : 'collapse' ?>" id="Statistics">
        <li class=""><a href="<?php echo $this->Url->build(["controller" => "Statistics", "action" => "index"]); ?>"><i class="icon-angle-right"></i> View Statistics </a></li>					
    </ul>
</li>   -->

        <!----------------- Statistics End -------------------------------->

        <!----------------- FAQ Management Start ------------------------>

        <li class="panel <?php if ($this->request->params['controller'] == 'Faqs') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#faq"> FAQ </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Faqs' ? 'in' : 'collapse' ?>" id="faq">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Faqs", "action" => "index"]); ?>">
                        <i class="icon-angle-right"></i> FAQ List </a></li>                 
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Faqs", "action" => "add"]); ?>">
                        <i class="icon-angle-right"></i> Add FAQ </a></li>   
            </ul>
        </li> 

        <!----------------- FAQ Management End ------------------------>

        <!----------------- Testimonial Start ------------------------>

        <li class="panel <?php if ($this->request->params['controller'] == 'Testimonials') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#testimoliak"> Testimonials </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Testimonials' ? 'in' : 'collapse' ?>" id="testimoliak">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Testimonials", "action" => "index"]); ?>">
                        <i class="icon-angle-right"></i> Testimonial List </a></li>                 
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Testimonials", "action" => "add"]); ?>">
                        <i class="icon-angle-right"></i> Add Testimonial </a></li>   
            </ul>
        </li> 

        <!----------------- Testimonial End ------------------------>

        <!----------------- Product End ------------------------>
        <li class="panel <?php if ($this->request->params['controller'] == 'Products') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#prosubmenu"> Products </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Products' ? 'in' : 'collapse' ?>" id="prosubmenu">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Products", "action" => "index"]); ?>">
                        <i class="icon-angle-right"></i> Product  List </a></li>                 
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Products", "action" => "addproduct"]); ?>">
                        <i class="icon-angle-right"></i> Add Product </a></li>   
            </ul>
        </li>
        <!----------------- Product End ------------------------>

        <!----------------- Testimonial End ------------------------>

        <li class="panel <?php if ($this->request->params['controller'] == 'Categories') { ?> active <?php } else { ?><?php } ?>"> 
            <a href="javascript:void(0)" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#catsubmenu"> Category </a>
            <ul class="<?php echo $this->request->params['controller'] == 'Categories' ? 'in' : 'collapse' ?>" id="catsubmenu">
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Categories", "action" => "index"]); ?>">
                        <i class="icon-angle-right"></i> Category  List </a></li>                 
                <li class=""><a href="<?php echo $this->Url->build(["controller" => "Categories", "action" => "add"]); ?>">
                        <i class="icon-angle-right"></i> Add Category </a></li>   
            </ul>
        </li>
        <!----------------- Testimonial End ------------------------>
    </ul>
</div>
<!--END MENU SECTION --> 