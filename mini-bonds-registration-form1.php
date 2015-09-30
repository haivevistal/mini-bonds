<?php

function minibond_registration_step1() {
    $mh = new MiniBondsHelper;
    $settitle = isset($_POST['settitle']) ? $_POST['settitle'] : '';
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $surname = isset($_POST['surname']) ? $_POST['surname'] : '';
    $birthdayday = isset($_POST['birthdayday']) ? $_POST['birthdayday'] : '';
    $setmonth = isset($_POST['setmonth']) ? $_POST['setmonth'] : '';
    $birthdayyear = isset($_POST['birthdayyear']) ? $_POST['birthdayyear'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $emailconfirm = isset($_POST['emailconfirm']) ? $_POST['emailconfirm'] : '';
    $homephone = isset($_POST['homephone']) ? $_POST['homephone'] : '';
    $mobilephone = isset($_POST['mobilephone']) ? $_POST['mobilephone'] : '';
    ?>
    <div class="row registration-container step1">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">REGISTER YOUR ACCOUNT</h1>
                <p class="reg_desc"><strong>To register for your account follow these 4 easy steps.</strong></p>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <img src="<?php echo plugins_url( 'img/step1.png', __FILE__ ) ?>" alt="Registration Steps 1" class="register-steps pull-right" />
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title">PERSONAL DETAILS</h2>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" name="minibonds-registrationForm" id="minibonds-registrationForm" role="form" novalidate="">
                <input type="hidden" name="step1" value="true" />
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="seltitle">Title: <span class="red">*</span></label>
                            <div class="col-xs-12 col-md-12 nopadding">
                                <select id="seltitle" name="settitle" class="form-control" data-parsley-required="" data-parsley-error-message="Missing title" data-parsley-errors-container="#titleerror">
                                    <option value="">Title</option>
                                    <option value="Mr" <?php echo $mh->mini_bonds_is_selected('Mr', $settitle); ?>>Mr</option>
                                    <option value="Mrs" <?php echo $mh->mini_bonds_is_selected('Mrs', $settitle); ?>>Mrs</option>
                                    <option value="Miss" <?php echo $mh->mini_bonds_is_selected('Miss', $settitle); ?>>Miss</option>
                                    <option value="Ms" <?php echo $mh->mini_bonds_is_selected('Ms', $settitle); ?>>Ms</option>
                                    <option value="Dr" <?php echo $mh->mini_bonds_is_selected('Dr', $settitle); ?>>Dr</option>
                                </select>
                                <div id="titleerror" style="margin-bottom: 24px;"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name: <span class="red">*</span></label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>" data-parsley-required="true" data-parsley-error-message="Please enter your first name" />
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname: <span class="red">*</span></label>
                            <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $surname; ?>" data-parsley-required="true" data-parsley-error-message="Please enter your surname" />
                        </div>
                        <div class="form-group">
                            <label for="birthday">Date of Birth: <span class="red">*</span></label>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 nopadding">
                                    <div class="col-xs-12 col-md-4">
                                        <input class="form-control" id="birthdayday" name="birthdayday" style="height: 30px;" size="2" maxlength="2" minlength="2" data-parsley-minlength="1" data-parsley-min="1" data-parsley-type="integer" type="text" data-parsley-max="31" data-parsley-required="true" data-parsley-errors-container="#birthdayerror" data-parsley-error-message="Please enter a valid day" value="<?php echo $birthdayday; ?>" />
                                    </div>
                                    <div class="col-xs-12 col-md-4 text-center">
                                        <select id="selmonth" name="setmonth" class="form-control" data-parsley-dobvalidation="" data-parsley-validate-if-empty="" data-parsley-errors-container="#birthdayerror">
                                            <option value="">Month</option>
                                            <option value="1" <?php echo $mh->mini_bonds_is_selected('1', $setmonth); ?>>January</option>
                                            <option value="2" <?php echo $mh->mini_bonds_is_selected('2', $setmonth); ?>>Febuary</option>
                                            <option value="3" <?php echo $mh->mini_bonds_is_selected('3', $setmonth); ?>>March</option>
                                            <option value="4" <?php echo $mh->mini_bonds_is_selected('4', $setmonth); ?>>April</option>
                                            <option value="5" <?php echo $mh->mini_bonds_is_selected('5', $setmonth); ?>>May</option>
                                            <option value="6" <?php echo $mh->mini_bonds_is_selected('6', $setmonth); ?>>June</option>
                                            <option value="7" <?php echo $mh->mini_bonds_is_selected('7', $setmonth); ?>>July</option>
                                            <option value="8" <?php echo $mh->mini_bonds_is_selected('8', $setmonth); ?>>August</option>
                                            <option value="9" <?php echo $mh->mini_bonds_is_selected('9', $setmonth); ?>>September</option>
                                            <option value="10" <?php echo $mh->mini_bonds_is_selected('10', $setmonth); ?>>October</option>
                                            <option value="11" <?php echo $mh->mini_bonds_is_selected('11', $setmonth); ?>>November</option>
                                            <option value="12" <?php echo $mh->mini_bonds_is_selected('12', $setmonth); ?>>December</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <input type="text" class="form-control" id="birthdayyear" name="birthdayyear" style="height: 30px;" size="4" maxlength="4" data-parsley-minlength="4" data-parsley-required="true" data-parsley-type="integer" data-parsley-errors-container="#birthdayerror" data-parsley-error-message="Please enter a valid year (YYYY)" value="<?php echo $birthdayyear; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div id="birthdayerror"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Email Address: <span class="red">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" data-parsley-required="true" data-parsley-error-message="Please enter your email address" />
                        </div>
                        <div class="form-group">
                            <label for="emailconfirm">Confirm Email Address: <span class="red">*</span></label>
                            <input type="email" class="form-control" id="emailconfirm" name="emailconfirm" value="<?php echo $emailconfirm; ?>" data-parsley-required="true" data-parsley-error-message="Please confirm your email address" data-parsley-equalto="#email" />
                            <div class="parsley-custom-error-message emailvalidation" id="emailvalidation"></div>
                        </div>
                        <div class="form-group">
                            <label for="homephone">Home Phone: <span class="red">*</span></label>
                            <input type="text" maxlength="20" class="form-control" id="homephone" name="homephone" value="<?php echo $homephone; ?>" data-parsley-required="true" data-parsley-error-message="Please enter a UK landline number" />
                        </div>
                        <div class="form-group">
                            <label for="mobilephone">Mobile Phone: </label>
                            <input type="text" maxlength="20" class="form-control" id="mobilephone" name="mobilephone" value="<?php echo $mobilephone; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6"><br /><br />
                        <a href="#" target="_blank">Applying in the name of a company?</a>
                    </div>
                    <div class="col-xs-12 col-md-6"><input type="submit" class="continue" value="" /></div>
                </div>
            </form>
        </div>
    </div>
    <?php
}
