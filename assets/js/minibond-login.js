/* by Vistal - www.boholwebtechno.com */
jQuery(document).ready(function($) {
    var boholwebtechno_ajax = {"ajaxurl":"wp-admin/admin-ajax.php"};
    $('form#loginform label[for="user_login"]').html('<label for="user_login">Username / Email<br><input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>');
    $('form#loginform').after('<div class="contact_support"><strong>Customer Support</strong><br><a href="tel:98080707">98080707</a><br><a href="mailto:example@domain.com">example@domain.com</a></div>');
    $('#nav').after('<div class="bottom_cta bottom-tel"><div class="col-xs-1 col-md-1"><img src="/wp-content/plugins/mini-bonds/img/icon_call_us.png" alt="Telephone Number" class="pull-left"></div><div class="col-xs-11 col-md-11"><h2>If you have any problem please feel free to call us <a href="tel:03456076001" style="color: #0f3269 !important;">0345 607 6001</a></h2><span>Monday - Friday 07:30-21:00 - Saturday 09:00-15:00</span></div></div>');
    $('.login-action-lostpassword .message').text('Please enter your email address. You will receive a link to create a new password via email.');
    $('.login h1 a').text('LOGIN INTO YOUR ACCOUNT').attr('href', 'javascript:;');
    $('form#loginform input[name="wp-submit"]').click( function(e) {
        e.preventDefault();
        $('.message').remove();
        $('#login_error').remove();
        $('form#loginform').before('<p class="message">Please wait.. We are processing your login..</p>');
        $('form#loginform #wp-submit').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: boholwebtechno_ajax.ajaxurl,
            data: { 
                'action': 'minibondlogin',
                'username': $('form#loginform #user_login').val(), 
                'password': $('form#loginform #user_pass').val(), 
                'security': $('form#loginform #rememberme').val() 
            }, 
            success: function(data) {
                console.log(data);
                $('.message').remove();
                $('#login_error').remove();
                $('form#loginform #wp-submit').removeAttr('disabled');
                if (data.loggedin == true) {
                    $('form#loginform').before('<div id="message">'+data.message+'</div>');
                    document.getElementById("loginform").submit();
                    return true;
                } else {
                    $('form#loginform').before('<div id="login_error"><strong>ERROR</strong>: '+data.message+'</div>');
                    return false;
                }
            }
        });
    });
    $('form#lostpasswordform input[name="wp-submit"]').click( function(e) {
        e.preventDefault();
        $('.message').remove();
        $('#login_error').remove();
        $('form#lostpasswordform').before('<p class="message">Please wait.. We are processing your request..</p>');
        $('form#lostpasswordform #wp-submit').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: boholwebtechno_ajax.ajaxurl,
            data: { 
                'action': 'minibondforgotpassword',
                'email': $('form#lostpasswordform #user_login').val()
            }, 
            success: function(data) {
                console.log(data);
                $('.message').remove();
                $('#login_error').remove();
                $('form#lostpasswordform #wp-submit').removeAttr('disabled');
                if (data.loggedin == true) {
                    $('form#lostpasswordform').before('<div id="message">'+data.message+'</div>');
                    document.getElementById("lostpasswordform").submit();
                    return true;
                } else {
                    $('form#lostpasswordform').before('<div id="login_error"><strong>ERROR</strong>: '+data.message+'</div>');
                    return false;
                }
            }
        });
    });
    $('form#resetpassform input[name="wp-submit"]').click( function(e) {
        e.preventDefault();
        $('.message').remove();
        $('#login_error').remove();
        $('form#resetpassform').before('<p class="message">Please wait.. We are processing your request..</p>');
        $('form#resetpassform #wp-submit').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: boholwebtechno_ajax.ajaxurl,
            data: { 
                'action': 'minibondresetpassword',
                'email' : $('form#resetpassform #user_login').val(),
                'password': $('form#resetpassform #pass1').val()
            }, 
            success: function(data) {
                console.log(data);
                $('.message').remove();
                $('#login_error').remove();
                $('form#resetpassform #wp-submit').removeAttr('disabled');
                if (data.loggedin == true) {
                    $('form#resetpassform').before('<div id="message">'+data.message+'</div>');
                    document.getElementById("resetpassform").submit();
                    return true;
                } else {
                    $('form#resetpassform').before('<div id="login_error"><strong>ERROR</strong>: '+data.message+'</div>');
                    return false;
                }
            }
        });
    });
    $('form#loginform #user_login, form#loginform #user_pass').change( function() {
        $('form#loginform #wp-submit').removeAttr('disabled');
    });
});