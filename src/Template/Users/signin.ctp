<section class="login-page inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center inner-heading">
                <h2>Member Sign In</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
            </div>
            <div class="col-lg-10">
                <div class="login-area">
                    <div class="row">
                        <div class="col-lg-7 pr-lg-5">
                            <h5 class="font-weight-bold mb-4">Sign In</h5>
                            <form id="frmLogin" accept-charset="utf-8" method="post" action="<?php echo $this->Url->build(["controller" => "Users","action" => "signin"]);?>" class="form-area">
                                <div class="form-group">
                                    <img src="<?php echo $this->Url->build('/img/user-icon.png'); ?>" alt="">
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo $this->Url->build('/img/password-icon.png'); ?>" alt="">
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg text-capitalize">Sign In</button>
                                </div>
                            </form>
                            <?php
                                $forget_link = $this->Url->build(["controller" => "Users","action" => "forgotpassword"]);
                            ?>
                            <div class="form-group">
                                <a href="<?php echo $forget_link; ?>" style="text-decoration: none;">Forgot Password?</a>
                            </div>
                            <div class="or-area">
                                <span class="d-flex align-items-center justify-content-center">OR</span>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-4 mt-lg-0 d-flex flex-column justify-content-center align-items-center">
                            <p>Don’t have an account?</p>
                            <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "signup"]);?>" class="btn btn-outline-primary btn-lg text-capitalize">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
  $(function(){
    $( "#frmLogin" ).validate({
        rules: {
          'email': {
            required: true
          },
          'password': {
            required: true,
            minlength: 6
          }
        },
        messages: {

          'email': "Please enter a valid email address",
          'password': {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          }
        },
      });
  })
</script>