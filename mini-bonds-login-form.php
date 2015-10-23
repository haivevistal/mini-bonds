<?php

function minibond_login_form() {
    ?>
    <div class="row registration-container login">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-12 col-lg-12">
                <h1 class="login-account-title">LOGIN INTO YOUR ACCOUNT</h1>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <span></span>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" data-parsley-validate="" role="form" novalidate="" class="login-form">
                <input type="hidden" name="login" value="true" />
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Username / Email: <span class="red">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" value="" data-parsley-required="true" data-parsley-error-message="Please enter your email address" data-parsley-id="5722">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <span class="red">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" value="" data-parsley-required="true" data-parsley-minlength="6" data-parsley-pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$" data-parsley-error-message="Your password must: <br>
                            Be atleast 6 characters<br>
                            Contain upper and lowercase characters<br>
                            Contain characters and numbers" required="" maxlength="150" />
                        </div>
                        <div class="col-xs-12 col-md-12 nopadding">
                            <div class="col-xs-12 col-md-6 nopadding">
                                <a href="#">Forgot your password?</a><br />
                                Not registered?<a href="<?php echo $_SESSION['register_url']; ?>">Register here</a>
                            </div>
                            <div class="col-xs-12 col-md-6 nopadding">
                                <input type="submit" class="btn btn-success continue" value="LOGIN" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-6">
                        <div class="col-xs-12 col-md-6">
                            <div class="well">
                                <strong>Customer Support</strong><br />
                                <a href="tel:98080707">98080707</a><br />
                                <a href="mailto:example@domain.com">example@domain.com</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-md-12 bottom-tel">
            <div class="col-xs-1 col-md-1">
                <img src="<?php echo plugins_url( 'img/icon_call_us.png', __FILE__ ) ?>" alt="Telephone Number" class="pull-left" />
            </div>
            <div class="col-xs-11 col-md-11">
                <h2>If you have any problem please feel free to call us <a href="tel:03456076001" style="color: #0f3269 !important;">0345 607 6001</a></h2>
                <span>Monday - Friday 07:30-21:00 - Saturday 09:00-15:00</span>
            </div>
        </div>
    </div>
    
    <?php
}