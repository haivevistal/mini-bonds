<?php

function minibond_registration_step4() {
    ?>
    <div class="row registration-container step4">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">REGISTER YOUR ACCOUNT</h1>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <img src="<?php echo plugins_url( 'img/step4.png', __FILE__ ) ?>" alt="Registration Steps 4" class="register-steps pull-right" />
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title" style="padding:12px 0px;">Success! Registration Complete</h2>
            <span>Congratulations, you have now completed first part of the process.</span>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" data-parsley-validate="" role="form" novalidate="" class="step4-form">
                <input type="hidden" name="step4" value="true" />
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <h2 class="smaller form-title" style="padding:8px 0;">Thank you for Registering.</h2>
                        <ul style="list-style-type:none;">
                            <li><i class="fa fa-check fa-complete"></i> Complete registration forms.</li>
                            <li><i class="fa fa-check"></i> Login and fill financial details.</li>
                            <li><i class="fa fa-check"></i> Complete your payment.</li>
                        </ul>
                        <div class="col-xs-12 col-md-6">
                            <div class="well">
                                <strong>Customer Support</strong><br />
                                <a href="tel:98080707">98080707</a><br />
                                <a href="mailto:example@domain.com">example@domain.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Username / Email: <span class="red">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="" data-parsley-required="true" data-parsley-error-message="Please enter your email address" data-parsley-id="5722">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: <span class="red">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" value="" data-parsley-minlength="6" data-parsley-pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$" data-parsley-error-message="Your password must: <br>
                            Be atleast 6 characters<br>
                            Contain upper and lowercase characters<br>
                            Contain characters and numbers" required="" maxlength="150" data-parsley-id="3242">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 step4_footer pull-right">
                        <div class="col-xs-12 col-md-12 nopadding">
                            <div class="col-xs-12 col-md-6 nopadding">
                                <a href="#">Forgot your password?</a><br />
                                Not registered?<a href="<?php echo $_SESSION['register_url']; ?>">Register here</a>
                            </div>
                            <div class="col-xs-12 col-md-6 nopadding">
                                <input type="submit" class="continue" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}