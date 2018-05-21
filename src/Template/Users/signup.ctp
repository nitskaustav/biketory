<section class="login-page inner-page">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center inner-heading">
            <h2>Member Sign Up</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
        </div>
        <div class="col-lg-10">
            <div class="login-area signup-area">
                <div class="row">
                    <div class="col-lg-7 pr-lg-5">
                        <h5 class="font-weight-bold mb-4">Sign Up</h5>
                        <form action="<?php echo $this->Url->build(["controller" => "Users","action" => "signup"]);?>" method="post" id="frmRegister" class="form-area">
                            <div class="form-group">
                                <div class="radios d-flex align-items-center">
                                    <input type="radio" name="utype" value="1" checked /> <label>Personal</label>
                                    <input type="radio" name="utype" value="2" /> <label>Business</label>
                                </div>
                            </div>
                            <div class="form-group">
                            <div style="position: relative;">
                                <img src="<?php echo $this->Url->build('/img/user-icon.png'); ?>" alt="">
                                <input type="text" placeholder="First Name" class="form-control" id="first_name" name="first_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <img src="<?php echo $this->Url->build('/img/user-icon.png'); ?>" alt="">
                                <input type="text" placeholder="Surname" class="form-control" id="last_name" name="last_name">
                            </div>
                            <div class="form-group">
                                <img src="<?php echo $this->Url->build('/img/msg-icon.png'); ?>" alt="">
                                <input type="email" placeholder="Email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group password-area">
                                <img src="<?php echo $this->Url->build('/img/password-icon.png'); ?>" alt="">
                                <input type="password" placeholder="Password" class="form-control" name="password" id="password">
                                <a>Show Password</a>
                            </div>
                            <div class="form-group password-area">
                                <img src="<?php echo $this->Url->build('/img/password-icon.png'); ?>" alt="">
                                <input type="password" placeholder="Confirm password" class="form-control" name="con_password" id="con_password">                             
                            </div>
                            <div class="form-group check-box-area">
                                <div class="checkboxes">
                                    <input id="a" type="checkbox" />
                                    <label class="green-background" for="a"></label>
                                </div>
                                <p>I would like to receive news, offers and promotions from biketory</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg text-capitalize">Sign Up</button>
                            </div>
                            <p>By creating a biketory account, you agree to our <a href="#" class="text-primary">Terms & Conditions</a> and <a href="#" class="text-primary">Privacy Policy</a>.
                            </p>
                        </form>
                        <div class="or-area">
                            <span class="d-flex align-items-center justify-content-center">OR</span>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-4 mt-lg-0 d-flex flex-column justify-content-center align-items-center">
                        <p>Already  have an account?</p>
                        <a href="<?php echo $this->Url->build(["controller" => "Users","action" => "signin"]);?>" class="btn btn-outline-primary btn-lg text-capitalize">Member Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
    $(function(){
        $( "#frmRegister" ).validate({
        rules: {
          'first_name': "required",
          'last_name': "required",          
          'utype': "required",
          'email': {
            required: true
          },

          'password': {
            required: true,
            minlength: 6
          },
          'con_password': {
            required: true,
            minlength: 6
          }

        },
        messages: {
          'utype': "Please choose user type",
          'first_name': "Please enter your first name.",
          'last_name': "Please enter your last name.",
          'email': "Please enter a valid email address",          

          'password': {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          'con_password': {
            required: "Please re-type  password",
            minlength: "Your password must be same as above password"
          }
        },


      });
    })
    /**/
</script>