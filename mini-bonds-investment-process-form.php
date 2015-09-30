<?php

function minibond_registration_investment_process() {
    ?>
    <div class="row registration-container step4">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6">
                <h1 class="register-account-title">INVESTMENT PROCESS</h1>
                <span>It is a regulatory requirements that before you gain access to certain investment products or information you must select a relevant investor type. This is so we can assess if the investment product is appropriate for you.</span>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 text-right nopadding">
                <button class="btn btn-success">Invest Now</button>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <h2 class="smaller form-title" style="padding:12px 0px;">What Type Of Investor Are You?</h2>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <form method="post" data-parsley-validate="" role="form" novalidate="" class="step4-form">
                <input type="hidden" name="step5" value="true" />
                <div class="row">
                    <div class="col-xs-12 col-md-6 nopadding">
                        <ul style="list-style-type:none;">
                            <li><button class="btn btn-primary btn-lg investment-btn"><strong>Retail (restricted) Investor</strong></button></li>
                            <li><button class="btn btn-default btn-lg investment-btn"><strong>Advaised Investor</strong></button></li>
                            <li><button class="btn btn-default btn-lg investment-btn"><strong>Self-certified Investor</strong></button></li>
                            <li><button class="btn btn-default btn-lg investment-btn"><strong>High Net-Worth Investor</strong></button></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="col-xs-12 col-md-12 grayborder well">
                            <ul style="list-style-type:none;">
                                <li>
                                    <strong>What is a Retail (restricted) Investor?</strong><br />
                                    <span>Test</span><br />
                                </li>
                                <li>
                                    <strong>What is a Advaised Investor?</strong><br />
                                    <span>Test</span><br />
                                </li>
                                <li>
                                    <strong>What is a Self-certified Investor?</strong><br />
                                    <span>Test</span><br />
                                </li>
                                <li>
                                    <strong>What is a High Net-Worth Investor?</strong><br />
                                    <span>Test</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 step4_footer pull-right">
                        <div class="col-xs-12 col-md-12 nopadding">
                            <div class="col-xs-12 col-md-6 nopadding">
                            </div>
                            <div class="col-xs-12 col-md-6 nopadding">
                                <input type="submit" class="btn btn-success continue" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}