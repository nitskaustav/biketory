<nav class="navbar navbar-expand-lg navbar-light bg-light navigation-area">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $this->Url->build(["controller" => "Users","action" => "index"]);?>">
                <img src="<?php echo $this->Url->build('/img/logo.png'); ?>" alt="" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo $this->request->webroot; ?>products/bikelisting">Sell bike</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->request->webroot; ?>products/categorylisting">Sell gear</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "contents", "work-with-us"]); ?>">Work With Us  </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "contents", "about-us"]); ?>">About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->Url->build(["controller" => "Users","action" => "contactus"]);?>">Contact </a>
                    </li>
                    <li class="nav-item">
                        <?php 
                            if(isset($user_id)){
                                if($user_details['utype'] == 1){
                            ?>
                                <a class="nav-link btn btn-primary" href="<?php echo $this->Url->build(["controller" => "Users","action" => "dashboard"]);?>">Dashboard</a> 
                          <?php
                            }
                            else{
                            ?> 
                            <a class="nav-link btn btn-primary" href="<?php echo $this->Url->build(["controller" => "Users","action" => "sellerdashboard"]);?>">Dashboard</a>                   
                        <?php
                            }
                               }
                            else{
                          ?>
                          <a class="nav-link btn btn-primary" href="<?php echo $this->Url->build(["controller" => "Users","action" => "signin"]);?>">Sign In / Sign up </a>
                          <?php
                            }
                        ?>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>