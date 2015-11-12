<?php

function minibond_payment() {
    $currencies = array('AED','AFN','ALL','AMD','ANG','AOA','ARS','AUD','AWG','AZN','BAM','BBD','BDT','BGN','BHD','BIF','BMD','BND','BOB','BRL','BSD','BTN','BWP','BYR','BZD','CAD','CDF','CHF','CLP','CNY','COP','CRC','CUP','CVE','CZK','DJF','DKK','DOP','DZD','ECS','EGP','ERN','ETB','EUR','FJD','FKP','GBP','GEL','GGP','GHS','GIP','GMD','GNF','GWP','GYD','HKD','HNL','HRK','HTG','HUF','IDR','ILS','INR','IQD','IRR','ISK','JMD','JOD','JPY','KES','KGS','KHR','KMF','KPW','KRW','KWD','KYD','KZT','LAK','LBP','LKR','LRD','LSL','LTL','LVL','LYD','MAD','MDL','MGF','MKD','MMK','MNT','MOP','MRO','MUR','MVR','MWK','MXN','MYR','MZN','NAD','NGN','NIO','NOK','NPR','NZD','OMR','PAB','PEN','PGK','PHP','PKR','PLN','PYG','QAR','QTQ','RON','RSD','RUB','RWF','SAR','SBD','SCR','SDG','SEK','SGD','SHP','SLL','SOS','SRD','SSP','STD','SVC','SYP','SZL','THB','TJS','TMT','TND','TOP','TRY','TTD','TWD','TZS','UAH','UGX','USD','UYU','UZS','VEF','VND','VUV','WST','XAF','XCD','XOF','XPF','YER','ZAR','ZMW','ZWD');
    ?>
    <div class="row registration-container step1">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6 nopadding">
                <h1 class="register-account-title">INVESTMENT PROCESS</h1>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 nopadding">
                <img src="<?php echo plugins_url( 'img/step5.png', __FILE__ ) ?>" alt="Registration Steps 5" class="register-steps pull-right" />
            </div>
            <div class="row col-xs-12 col-md-12 col-lg-12 nopadding">
                <span>It is a regulatory requirements that before you gain access to certain investment products or information you must select a relevant investor type. This is so we can assess if the investment product is appropriate for you.</span>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 nopadding">
            <form method="post" name="minibonds-paymentForm" id="minibonds-paymentForm" role="form" novalidate="">
                <input type="hidden" name="step5" value="true" />
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 nopadding">
                            <h2 class="smaller form-title" style="margin-top: 20px;">PAYMENT METHOD</h2>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount: <span class="red">*</span></label>
                            <div class="col-xs-12 col-md-12 nopadding" style="margin-bottom:20px;">
                                <div class="col-xs-12 col-md-7 nopadding">
                                    <input type="text" class="form-control" id="total_amount" name="total_amount" value="<?php if( isset( $_POST['total_amount'] ) ) { echo $_POST['total_amount']; } ?>" data-parsley-required="true" data-parsley-error-message="Please enter total amount value." />
                                </div>
                                <div class="col-xs-12 col-md-5">
                                    <span>Your investment must be a multiple of &pound;1,000
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payment_method" style="width: 100%;">Select Payment Method: <span class="red">*</span></label>
                            <select id="payment_method" name="payment_method" class="form-control" data-parsley-validate-if-empty="" data-parsley-error-message="Please select a payment method." data-parsley-required="true" data-parsley-errors-container="#payment_method_error">
                                <option value="CARD" <?php if( isset($_POST['payment_method']) && $_POST['payment_method'] == 'CARD') { echo 'selected="selected"'; } ?> >CARD</option>
                                <option value="DEBIT CARD" <?php if( isset($_POST['payment_method']) && $_POST['payment_method'] == 'DEBIT CARD') { echo 'selected="selected"'; } ?> >DEBIT CARD</option>
                                <option value="BANK TRANSFER" <?php if( isset($_POST['payment_method']) && $_POST['payment_method'] == 'BANK TRANSFER') { echo 'selected="selected"'; } ?> >BANK TRANSFER</option>
                                <option value="CHEQUE" <?php if( isset($_POST['payment_method']) && $_POST['payment_method'] == 'CHEQUE') { echo 'selected="selected"'; } ?> >CHEQUE</option>
                            </select>
                            <div id="payment_method_error" style="margin-bottom: 24px;"></div>
                        </div>
                        <div class="form-group">
                            <label for="payment_currency" style="width: 100%;">Payment Currency: <span class="red">*</span></label>
                            <select id="payment_currency" name="payment_currency" class="form-control" data-parsley-required="true"  data-parsley-validate-if-empty="" data-parsley-error-message="Please select a payment currency." data-parsley-errors-container="#payment_currency_error">
                                <option value="">Select</option>
                                <?php 
                                $currency_ = isset( $_POST['payment_currency'] ) ? trim($_POST['payment_currency']) : '';
                                foreach( $currencies as $curr ) {
                                    $selected = $currency_ == $curr ? 'selected="selected"' : ($curr == 'GBP' ? 'selected="selected"' : '');
                                    echo '<option value="'.$curr.'" '.$selected.'>'.$curr.'</option>';
                                }
                                ?>
                            </select>
                            <div id="payment_currency_error" style="margin-bottom: 24px;"></div>
                        </div>
                        <div class="form-group">
                            <label for="card_charge">Card Charge: <span class="red">*</span></label>
                            <div class="col-xs-12 col-md-12 nopadding">
                                <div class="col-xs-12 col-md-4 nopadding">
                                    <input type="text" class="form-control" id="card_charge" name="card_charge" value="<?php if( isset( $_POST['card_charge'] ) ) { echo $_POST['card_charge']; } ?>" data-parsley-required="true" data-parsley-error-message="Please enter card change." style="background:#0f3269 !important;color:#fff !important;text-align:right;" />
                                    <div id="card_change_error" style="margin-bottom: 24px;"></div>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                    <span>For payments by a non-GBP debit card, an additional fee will be charged.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 nopadding">
                            <h2 class="smaller form-title" style="margin-top: 20px;">CARD DETAILS</h2>
                        </div>
                        <div class="form-group">
                            <label for="card_type" style="width: 100%;">Type of Card: <span class="red">*</span></label>
                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 nopadding" style="margin-bottom:20px;">
                                <div class="col-xs-12 col-md-5 nopadding">
                                    <select id="card_type" name="card_type" class="form-control" data-parsley-required="true" data-parsley-validate-if-empty="" data-parsley-errors-container="#card_type_error">
                                        <option value="1" <?php if( isset($_POST['card_type']) && $_POST['card_type'] == '1') { echo 'selected="selected"'; } ?> >VISA <span style="font-style:italic;">(credit)</span></option>
                                        <option value="3" <?php if( isset($_POST['card_type']) && $_POST['card_type'] == '3') { echo 'selected="selected"'; } ?>>MasterCard <span style="font-style:italic;">(credit)</span></option>
                                        <option value="114" <?php if( isset($_POST['card_type']) && $_POST['card_type'] == '114') { echo 'selected="selected"'; } ?>>Visa <span style="font-style:italic;">(debit)</span></option>
                                        <option value="117" <?php if( isset($_POST['card_type']) && $_POST['card_type'] == '117') { echo 'selected="selected"'; } ?>>Maestro <span style="font-style:italic;">(debit)</span></option>
                                        <option value="119" <?php if( isset($_POST['card_type']) && $_POST['card_type'] == '119') { echo 'selected="selected"'; } ?>>MasterCard <span style="font-style:italic;">(debit)</span></option>
                                        <option value="122" <?php if( isset($_POST['card_type']) && $_POST['card_type'] == '122') { echo 'selected="selected"'; } ?>>Visa Electron <span style="font-style:italic;">(debit)</span></option>
                                    </select>
                                    <div id="card_type_error" style="margin-bottom: 24px;"></div>
                                </div>
                                <div class="col-xs-12 col-md-7">
                                    <span>There is a &pound;10,000 maximum limit for the car repayment method
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="card_holder_name">Card Holder Name: <span class="red">*</span></label>
                            <input type="text" class="form-control" id="card_holder_name" name="card_holder_name" value="<?php if( isset( $_POST['card_holder_name'] ) ) { echo $_POST['card_holder_name']; } ?>" data-parsley-required="true" data-parsley-error-message="Please enter card holder name." />
                            <div class="parsley-custom-error-message card_holder_namevalidation" id="card_holder_namevalidation"></div>
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="card_number">Card Number: <span class="red">*</span></label>
                            <input type="text" maxlength="20" class="form-control" id="card_number" name="card_number" value="" data-parsley-type="digits" data-parsley-luhn="true" data-parsley-required="true" data-parsley-error-message="Please enter a valid card number" />
                        </div>
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 nopadding">
                            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 nopadding">
                                <div class="form-group">
                                    <label for="expiry">Expiry Date: <span class="red">*</span></label>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 nopadding">
                                            <div class="col-xs-12 col-md-6 text-center nopadding">
                                                <select id="expirymonth" name="expirymonth" class="form-control" data-parsley-validate-if-empty="" data-parsley-errors-container="#expiryerror" data-parsley-required="true" data-parsley-error-message="Please select a valid expiry month." >
                                                    <option value="">Month</option>
                                                    <option value="01">January</option>
                                                    <option value="02">Febuary</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-6 text-center nopadding">
                                                <select id="expiryyear" name="expiryyear" class="form-control" data-parsley-validate-if-empty="" data-parsley-errors-container="#expiryerror" data-parsley-required="true" data-parsley-error-message="Please select a valid expiry year.">
                                                    <option value="">Year</option>
                                                    <?php 
                                                    /*$current_year = (int)date('Y');
                                                    $last_year = $current_year + 20;
                                                    for( $y = $current_year; $y <= $last_year; $y++) {
                                                        echo '<option value="'.$y.'">'.$y.'</option>';
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="expiryerror"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="expiry">Card Security Code: <span class="red">*</span></label>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 nopadding">
                                            <div class="col-xs-12 col-md-6">
                                                <input type="text" class="form-control" id="security_code" name="security_code" style="height: 30px;" data-parsley-errors-container="#codeerror" size="4" maxlength="4" data-parsley-type="integer" data-parsley-minlength="3" data-parsley-required="true" data-parsley-type="integer"  data-parsley-error-message="Please enter a security code." value="" />
                                            </div>
                                            <div class="col-xs-12 col-md-6 nopadding" style="margin-top: 7px;">
                                                <span>What is this?</span>
                                            </div>
                                        </div>
                                        <div id="codeerror" class="col-xs-12 col-md-12"></div>
                                    </div>
                                    <div id="expiryerror"></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <?php if( !isset( $_POST['step5'] ) ) : ?>
                <div class="row">
                    <div class="col-xs-12 col-md-12"><input type="submit" class="btn btn-success continue pull-right" value="NEXT" /></div>
                </div>
                <?php endif; ?>
            </form>
            <?php if( isset( $_POST['step5'] ) ) : ?>
            <?php 
                $minibonds_helper = new MiniBondsHelper;
                $payment = $minibonds_helper->mini_bonds_get_session( 'payment_url' );
            ?>
            <div class="col-md-12 col-xs-12 iframe_container">
                <iframe src="<?php echo $payment; ?>" height="300px;" width="100%" style="width:100%;height:300px;border: none;"></iframe>
            </div>
            <?php endif; ?>
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