<?php
function minibond_thankyou_form() {
    $minibonds_helper = new MiniBondsHelper;
    ?>
    <div class="row registration-container login">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="row col-xs-12 col-md-12 col-lg-12">
                <h1 class="login-account-title">THANK YOU FOR REGISTERING</h1>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <span></span>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="col-xs-12 col-md-12 alert alert-success dismissable" style="margin-top:10px;">Payment with reference ID <?php echo $minibonds_helper->mini_bonds_get_session( 'p_ref' ); ?> and virtual deal reference of <?php echo $minibonds_helper->mini_bonds_get_session( 'p_deal_ref' ); ?> was Successful.</div>
                    <h2>We will get back to you shortly.</h2>
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