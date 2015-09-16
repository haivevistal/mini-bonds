<?php

function minibond_registration($atts) {
    
?>
    <div class="row registration-container">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">REGISTER YOUR ACCOUNT</h1>
                <p class="reg_desc"><strong>To register for your account follow these 3 easy steps.</strong></p>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                <img src="<?php echo plugins_url( 'img/register-step-1.png', __FILE__ ) ?>" alt="Registration Steps" class="register-steps pull-right" />
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title">PERSONAL DETAILS</h2>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" name="registrationForm" id="registrationForm" role="form" novalidate="">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="seltitle">Title:</label>
                            <select id="seltitle" name="settitle" data-parsley-required="" data-parsley-error-message="Missing title" data-parsley-errors-container="#titleerror" data-parsley-id="2476" style="display: none;">
                                <option value="">Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms">Ms</option>
                                <option value="Dr">Dr</option>
                            </select>
                            <div id="titleerror"><ul class="parsley-errors-list" id="parsley-id-2476"></ul></div>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="" data-parsley-required="true" data-parsley-error-message="Please enter your first name" data-parsley-id="9218"><ul class="parsley-errors-list" id="parsley-id-9218"></ul>
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname:</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="" data-parsley-required="true" data-parsley-error-message="Please enter your surname" data-parsley-id="8326"><ul class="parsley-errors-list" id="parsley-id-8326"></ul>
                        </div>
                        <div class="form-group">
                            <label for="birthday">Date of Birth:</label>
                            <table border="0" class="multiselect">
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="form-control" id="birthdayday" name="birthdayday" style="height: 30px;" size="2" maxlength="2" minlength="2" data-parsley-minlength="1" data-parsley-min="1" data-parsley-type="integer" type="text" data-parsley-max="31" data-parsley-required="true" data-parsley-errors-container="#birthdayerror" data-parsley-error-message="Please enter a valid day" value="" data-parsley-id="0019">
                                    </td>
                                    <td>
                                        <select id="selmonth" name="setmonth" data-parsley-dobvalidation="" data-parsley-validate-if-empty="" data-parsley-errors-container="#birthdayerror" data-parsley-id="5824" style="display: none;">
                                            <option value="">Month</option>
                                            <option value="1">January</option>
                                            <option value="2">Febuary</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="birthdayyear" name="birthdayyear" style="height: 30px;" size="4" maxlength="4" data-parsley-minlength="4" data-parsley-required="true" data-parsley-type="integer" data-parsley-errors-container="#birthdayerror" data-parsley-error-message="Please enter a valid year (YYYY)" value="" data-parsley-id="1947">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><div id=""></div></td>
                                </tr>
                            </tbody></table>
                            <div id="birthdayerror"><ul class="parsley-errors-list" id="parsley-id-0019"></ul><ul class="parsley-errors-list" id="parsley-id-5824"></ul><ul class="parsley-errors-list" id="parsley-id-1947"></ul></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="email" value="" data-parsley-required="true" data-parsley-error-message="Please enter your email address" data-parsley-id="5722"><ul class="parsley-errors-list" id="parsley-id-5722"></ul>
                        </div>
                        <div class="form-group">
                            <label for="emailconfirm">Confirm Email Address:</label>
                            <input type="email" class="form-control" id="emailconfirm" name="emailconfirm" value="" data-parsley-required="true" data-parsley-error-message="Please confirm your email address" data-parsley-id="0373"><ul class="parsley-errors-list" id="parsley-id-0373"></ul>
                        </div>
                        <div class="form-group">
                            <label for="homephone">Home Phone:</label>
                            <input type="text" maxlength="20" class="form-control" id="homephone" name="homephone" value="" data-parsley-required="true" data-parsley-error-message="Please enter a UK landline number" data-parsley-id="3750"><ul class="parsley-errors-list" id="parsley-id-3750"></ul>
                        </div>
                        <div class="form-group">
                            <label for="mobilephone">Mobile Phone:</label>
                            <input type="text" maxlength="20" class="form-control" id="mobilephone" name="mobilephone" value="" data-parsley-required="true" data-parsley-error-message="Please enter your mobile telephone number" data-parsley-id="2165"><ul class="parsley-errors-list" id="parsley-id-2165"></ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6"><br /><br />
                        <a href="#" target="_blank">Applying in the name of a company?</a>
                    </div>
                    <div class="col-xs-12 col-md-6"><input type="submit" class="continue" value=""></div>
                </div>
            </form>
        </div>
    </div>
<?php
}