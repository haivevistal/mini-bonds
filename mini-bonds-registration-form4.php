<?php

function minibond_registration_step4() {
    ?>
    <div class="row registration-container step4">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-6 col-lg-6 nopadding">
                <h1 class="register-account-title">INVESTMENT PROCESS</h1>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 nopadding">
                <img src="<?php echo plugins_url( 'img/step4.png', __FILE__ ) ?>" alt="Registration Steps 4" class="register-steps pull-right" />
            </div>
            <div class="row col-xs-12 col-md-12 col-lg-12 nopadding">
                <span>It is a regulatory requirements that before you gain access to certain investment products or information you must select a relevant investor type. This is so we can assess if the investment product is appropriate for you.</span>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 nopadding">
            <h2 class="smaller form-title" style="padding:12px 0px;">What Type Of Investor Are You?</h2>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-xs-12 col-md-12 nopadding">
                    <ul class="nav nav-tabs nav questionnaire-tabs">
                        <li class="active"><a data-toggle="tab" href="#retail-investor" class="btn btn-primary"><img src="<?php echo plugins_url( 'img/icon_retail_investor_normal.png', __FILE__ ) ?>" alt="Retail (restricted) Investor" style="display:none;" /><img src="<?php echo plugins_url( 'img/icon_retail_investor_pressed.png', __FILE__ ) ?>" alt="Retail (restricted) Investor" class="active" /> Retail Investor</a>
                        </li>
                        <li><a data-toggle="tab" href="#advised-investor" class="btn btn-primary"><img src="<?php echo plugins_url( 'img/icon_advised_investor_normal.png', __FILE__ ) ?>" alt="Advised Investor" /><img src="<?php echo plugins_url( 'img/icon_advised_investor_pressed.png', __FILE__ ) ?>" class="active" style="display:none;" alt="Advised Investor" /> Advised Investor</a></li>
                        <li><a data-toggle="tab" href="#self-certified-investor" class="btn btn-primary"><img src="<?php echo plugins_url( 'img/icon_self_certified_investor_normal.png', __FILE__ ) ?>" alt="Self-certified Investor" /><img class="active" style="display:none;" src="<?php echo plugins_url( 'img/icon_self_certified_investor_pressed.png', __FILE__ ) ?>" alt="Self-certified Investor" /> Self-certified Investor</a></li>
                        <li><a data-toggle="tab" href="#high-net-investor" class="btn btn-primary" style="margin-right:0px !important;"><img src="<?php echo plugins_url( 'img/icon_high_net_worth_investor_normal.png', __FILE__ ) ?>" alt="High Net-Worth Investor" /><img class="active" style="display:none;" src="<?php echo plugins_url( 'img/icon_high_net_worth_investor_pressed.png', __FILE__ ) ?>" alt="High Net-Worth Investor" /> High Net-Worth Investor</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-12 tabs_content">
                    <div class="tab-content">
                        <div id="retail-investor" class="tab-pane fade in active">
                        <form method="post" data-parsley-validate="" role="form" novalidate="" class="step4-form step4-a-form">
                            <input type="hidden" name="step4_a" value="true" />
                            <input type="hidden" name="investor_type" value="Retail Investor" />
                            <strong>What is a Retail (restricted) Investor?</strong>
                            <p>Anyone can become an Retail(restricted investor). You just need to agree to not make more than 10% of your investments (including savings, stocks, ISAs, bonds and property (excluding your primary residence) in investments that cannot easily be sold(i.e. illiquid),such as the ones listed on IPM Invest. This is why the Financial Conduct Authority refer to these investors as 'Restricted Investor'.)</p>
                            <strong>Retail (restricted) Investor Statement</strong>
                            <p>I make this statement so that I can receive promotional communications relating to unlisted shares and unlisted debt securities as a restricted investor.</p>
                            <strong>I declare that I qualify as a restricted investor because:</strong>
                            <p>
                                <ol type="a">
                                    <li>In the twelve months preceding 12th September 2014, I have not invested more than 10% of my net assets in unlisted shares or unlisted debt securities; and </li>
                                    <li>I undertake that in the twelve months following 12th September 2014, I will not invest more than 10% of my net assets in unlisted shares or unlisted debt securities. </li>
                                </ol>
                            </p>
                            <strong>Net assets for these purposes do not include:</strong>
                            <p>
                                <ol type="a">
                                    <li>The property which is my primary residence or any money raised through a loan secured on that property;</li>
                                    <li>Any rights of mine under a qualifying contract of insurance; or</li>
                                    <li>Any benefits (in the form of pensions or otherwise) which are payable on the terminantion of my service or on my death or retirement and to which I am (or my dependents are), or may be entitled.</li>
                                </ol>
                            </p>
                            <p>
                            <input type="checkbox" id="accept_investment" name="accept_investment" value="Accepted" data-parsley-required="true" data-parsley-error-message="This is require field." data-parsley-multiple="accept_investment" /> I accept that the investments to which the promotions will relate may expose me to a significant risk of losing all of the money or other property invested. I am aware that it is open to me to seek advice from an authorized person who specialists in advising on unlisted shares and unlisted debt securities.
                            </p>
                            <h3>QUESTIONNAIRE</h3>
                            <p>These questions are designed to check that this type of investment is appropriate for you. Please read each question carefully and select the answer that you believe is correct:</p>
                            <strong>1. After you invest in this offer how easily can you sell your bonds?</strong>
                            <p><input type="checkbox" name="how_easily_sell_bonds" value="under exceptional circumstances" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error" /> The bonds are not freely transferable so I can only sell them under exceptional circumstances</p>
                            
                            <p><input type="checkbox" name="how_easily_sell_bonds2" value="easily" /> Very easily: I can sell them like I do other stocks and bonds</p>
                            <strong>2. The expected return from Providence Bonds?</strong>
                            <p><input type="checkbox" name="return_providence_bond" value="7.5% per annum" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error"  /> Is the 7.5% per annum interest paid over the term (plus my money back at the end)</p>
                            <p><input type="checkbox" name="return_providence_bond2" value="dependent on movements in the financial bond and equity markets" /> Is dependent on movements in the financial bond and equity markets</p>
                            
                            <strong>3. Is your capital secure?</strong>
                            <p><input type="checkbox" name="capital_secure" value="at risk" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error"  /> No: My capital is at risk and I Might not get back all that invested</p>
                            <p><input type="checkbox" name="capital_secure2" value="guaranteed" /> Yes: It is guaranteed by the Financial Services Compensation Scheme</p>
                            
                            <strong>4. Is investment in Providence Bonds intended to be a short, medium or long-term investment?</strong>
                            <p><input type="checkbox" name="short_or_long_term" value="long term" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error"  /> It is intended to be held for a fixed number of years</p>
                            <p><input type="checkbox" name="short_or_long_term2" value="short term" /> It is a short-term investment aimed at providing an immediate return</p>
                            <div class="col-xs-12 col-md-12 step4_footer pull-right">
                                <div class="col-xs-12 col-md-12 nopadding">
                                    <div class="col-xs-12 col-md-6 nopadding">
                                    </div>
                                    <div class="col-xs-12 col-md-6 nopadding">
                                        <div id="questionnaire_error" class="text-right"></div>
                                        <input type="submit" class="btn btn-success continue form_validate" value="CONFIRM" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>

                        <div id="advised-investor" class="tab-pane fade">
                        <form method="post" data-parsley-validate="" role="form" novalidate="" class="step4-form  step4-b-form">
                            <input type="hidden" name="step4_b" value="true" />
                            <input type="hidden" name="investor_type" value="Advised Investor" />
                            <strong>What is an Advised Investor?</strong>
                            <p>An 'Advised Investor' is someone who has a financial advisor that is authorised and regulated by the Financial Conduct Authority; for example, an Independent Financial Advisor (IFA), from whom the investor will receive advice about each investment they make through IPM.</p>
                            
                            <p><input type="checkbox" name="advised_investor" value="Accepted" data-parsley-required="true" data-parsley-error-message="This is a required field." /> I am a client of a regulated firm that advises on unlisted shares and unlisted debt securities, which has assessed me as suitable to receive financial promotions and from whom I will seek advice on any investmentI make through IPM. I accept that the investment to which the IPM promotions relate my expose me to a significant risk of losing all of the money or other property invested.</p>
                            
                            <div class="col-xs-12 col-md-12 step4_footer pull-right">
                                <div class="col-xs-12 col-md-12 nopadding">
                                    <div class="col-xs-12 col-md-6 nopadding">
                                    </div>
                                    <div class="col-xs-12 col-md-6 nopadding">
                                        <input type="submit" class="btn btn-success continue" value="CONFIRM" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        
                        <div id="self-certified-investor" class="tab-pane fade">
                        <form method="post" data-parsley-validate="" role="form" novalidate="" class="step4-form  step4-c-form">
                            <input type="hidden" name="step4_c" value="true" />
                            <input type="hidden" name="investor_type" value="Self-certified Investor" />
                            <strong>What is a Self-certified Investor?</strong>
                            <p>This category is for someone who has invested in more than one unlisted company (including via IPM Invest) in the last two years or has been a member of a business angel syndicate or network for at least six months.</p><br />
                            
                            <strong>Self-certified Investor Statement</strong>
                            <p>I declare that I am a self-certified investor for the purpose of the restriction on promotion of non-mainstream pooled investments. I understand that this means:</p>
                            <ol type="i">
                                <li>I can receive promotional communications made by a person who is authorised by the Financial Conduct Authority which relates to investment activity in non-mainstream pooled investments;</li>
                                <li>The investments to which the promotions will relate may expose me to a significant risk of losing all of the property invested.</li>
                            </ol>

                            <p>I am a Self-certified Investor because at least one of the following applies: </p>
                            <ol type="a">
                                <li>I am a member of a network or syndicate of business angels and have been so for at least the last six months prior to 12th September 2014;</li>
                                <li>I have made more than one investment in an unlisted company, including via Crowdcube, in the two years prior to 12th September 2014;</li>
                                <li>I am working, or have worked in the two years prior to 12th September 2014, in a professional capacity in the private equity sector; or in the provision of finance for small and medium enterprises;</li>
                                <li>I am currently, or have been in the two years prior to 12th September 2014, a director of a company with an annual turnover of at least $1 million.</li>
                            </ol>
                            <p><input type="checkbox" name="self_certified_investor" value="Accepted" data-parsley-required="true" data-parsley-error-message="This is a required field." /> I am aware that it is open to me seek advice from someone who specialises in advising on non-mainstream pooled investments.</p>
                            
                            <div class="col-xs-12 col-md-12 step4_footer pull-right">
                                <div class="col-xs-12 col-md-12 nopadding">
                                    <div class="col-xs-12 col-md-6 nopadding">
                                    </div>
                                    <div class="col-xs-12 col-md-6 nopadding">
                                        <input type="submit" class="btn btn-success continue" value="CONFIRM" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        
                        <div id="high-net-investor" class="tab-pane fade">
                        <form method="post" data-parsley-validate="" role="form" novalidate="" class="step4-form step4-d-form">
                            <input type="hidden" name="step4_d" value="true" />
                            <input type="hidden" name="investor_type" value="Sophisticated High Net Worth Investor" />
                            <strong>What is a Sophisticated High Net Worth Investor?</strong>
                            <p>If you have earn more than &pound;100,000 a year consistency for the past 12 months of have net assets of more than &pound;250,000, this category may applicable to you.</p>
                            
                            <strong>Sophisticated High Net Worth Investor</strong>
                            <p>I make this statement so that I can receive promotional communications which are exempt from the restriction on promotion of non-mainstream pooled investments.</p>

                            <p>The exemption relates to certified high net worth investors and I declare that I qualify as such because at least one of the following applies to me:</p>
                            <p>I have, throughout the previous financial year, an annual income to the value of &pound;100,000;</p>
                            <p>I have held, throughout the previous financial year, net assets to the value of &pound;100,000 or more.</p>
                            
                            <strong>Net assets for these purposes do not include:</strong>
                            <ol type="a">
                                <li>The property which is my primary residence or any money raised through a loan secured on that property;</li>
                                <li>Any rights of mine under a qualifying contract of insurance; or</li>
                                <li>Any benefits (in the form of pensions or otherwise) which are payable on the termination of my service or on my death or retirement and to which I am (or my dependents are), or may be, entitled.</li>
                            </ol>
                            <p><input type="checkbox" name="accept_high_net_investor_promotions" data-parsley-required="true" data-parsley-error-message="This is a required field." /> I accept that the investments to which the promotions will relate may expose me to a significant risk of losing all of the money or other property invested. I am aware that it is open to me to seek advice from an authorised person who specialises in advising on non-mainstream pooled investments.</p>

                            <h3>QUESTIONNAIRE</h3>
                            <p>These questions are designed to check that this type of investment is appropriate for you. Please read each question carefully and select the answer that you believe is correct:</p>

                            <strong>1. After you invest in this offer how easily can you sell your bonds?</strong>
                            <p><input type="checkbox" name="high_net_investor_how_easily_sell_bonds" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error_" /> The bonds are not freely transferable so I can only sell them under exceptional circumtances</p>
                            <p><input type="checkbox" name="high_net_investor_how_easily_sell_bonds2" /> Very easily: I can sell them like I do other stocks and bonds</p>

                            <strong>2. The expected return from Providence Bonds?</strong>
                            <p><input type="checkbox" name="high_net_investor_return_providence_bond" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error_" /> Is the 7.5% per annum interest paid over the term (plus my money back at the end)</p>
                            <p><input type="checkbox" name="high_net_investor_return_providence_bond2" /> Is dependent on movements in the financial bond and equity markets</p>

                            <strong>3. Is your capital secure?</strong>
                            <p><input type="checkbox" name="high_net_investor_capital_secure" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error_" /> No: My capital is at risk and I might not get back all that invested</p>
                            <p><input type="checkbox" name="high_net_investor_capital_secure2" /> Yes: It is guaranteed by the Financial Services Compensation Scheme</p>

                            <strong>4. Is investment in Providence Bonds intended to be a short, medium or long-term investment?</strong>
                            <p><input type="checkbox" name="high_net_investor_short_or_long_term" data-parsley-required="true" data-parsley-error-message="Your answers are incorrect" data-parsley-errors-container="#questionnaire_error_" /> It is intended to be held for a fixed number of years</p>
                            <p><input type="checkbox" name="high_net_investor_short_or_long_term2" /> It is a short-term investment aimed at providing an immediate return</p>
                            
                            <div class="col-xs-12 col-md-12 step4_footer pull-right">
                                <div class="col-xs-12 col-md-12 nopadding">
                                    <div class="col-xs-12 col-md-6 nopadding">
                                    </div>
                                    <div class="col-xs-12 col-md-6 nopadding">
                                        <div id="questionnaire_error_" class="text-right"></div>
                                        <input type="submit" class="btn btn-success continue" value="CONFIRM" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
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
