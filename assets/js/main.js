(function($) {
    var mini_bonds_ajax = '/wp-admin/admin-ajax.php';
    $(document).ready( function() {
        $('#minibonds-registrationForm').parsley();
        $('#minibonds-paymentForm').parsley();
        $('.login-form').parsley();
        window.ParsleyValidator.addValidator('dobvalidation', function () {
            if(!$("#selmonth").val()) {
                window.ParsleyValidator.addMessage('en', 'dobvalidation', 'Please select a valid month');
                return false;
            } else if(!$("#birthdayday").val() || !$("#birthdayyear").val()) {
                return true;
            } else {
                birthdayDay = parseInt($("#birthdayday").val());
                birthdayMonth = parseInt($('#selmonth :selected').val()) - 1;
                birthdayYear = parseInt($("#birthdayyear").val()) + 18;
                tempDate = new Date(birthdayYear, birthdayMonth, birthdayDay);
                if(tempDate >= new Date()) {
                    window.ParsleyValidator.addMessage('en', 'dobvalidation', 'You need to be over the age of 18 to register');
                    return false;
                } else {
                    return true;
                }
            }
        }, 32);
        $('.step4-a-form').submit( function() {
            if( $('input[name="how_easily_sell_bonds2"]').prop("checked") ) {
                $('#questionnaire_error').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
            if( $('input[name="return_providence_bond2"]').prop("checked") ) {
                $('#questionnaire_error').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
            if( $('input[name="capital_secure2"]').prop("checked") ) {
                $('#questionnaire_error').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
            if( $('input[name="short_or_long_term2"]').prop("checked") ) {
                $('#questionnaire_error').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
        });
        $('.step4-d-form').submit( function() {
            if( $('input[name="high_net_investor_how_easily_sell_bonds2"]').prop("checked") ) {
                $('#questionnaire_error_').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
            if( $('input[name="high_net_investor_return_providence_bond2"]').prop("checked") ) {
                $('#questionnaire_error_').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
            if( $('input[name="high_net_investor_capital_secure2"]').prop("checked") ) {
                $('#questionnaire_error_').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
            if( $('input[name="high_net_investor_short_or_long_term2"]').prop("checked") ) {
                $('#questionnaire_error_').html('<ul class="parsley-errors-list filled" id="parsley-id-multiple-how_easily_sell_bonds"><li class="parsley-custom-error-message">Your answers are incorrect</li></ul>');
                return false;
            }
        });
    });
    $("select").selectBoxIt({});
    //$("#findaddress").click(function( e ) {e.preventDefault();findaddress("");});
    function findaddress(p){
        $("#findaddress" + p ).val("Loading...");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: mini_bonds_ajax,
            data: { action: "getaddress", postcode: $("#postcode" + p).val(), nonce : $('#ukaddress_nonce').val()
        }})
        .done(function( msg ) {
            console.log(msg);
            $("#street" + p ).val(msg["address"]);
            $("#city" + p).val(msg["city"]);
            $("#county" + p).val(msg["county"]);
            $("#street" + p).trigger('blur');
            $("#city" + p).trigger('blur');
            $("#county" + p).trigger('blur');
            $("#addresscountry" + p).focus();
            $("#findaddress" + p).val("Find Address");        
        });
    }
})(jQuery);