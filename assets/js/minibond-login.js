/* by Vistal */
jQuery(document).ready(function($) {
    var boholwebtechno_ajax = {"ajaxurl":"wp-admin/admin-ajax.php"};
    $('form#loginform label[for="user_login"]').html('<label for="user_login">Username / Email<br><input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>');
    $('.login-action-lostpassword .message').text('Please enter your email address. You will receive a link to create a new password via email.');
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
                    $('form#loginform').before('<div id="message"><strong>ERROR</strong>: '+data.message+'</div>');
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
                    $('form#lostpasswordform').before('<div id="message"><strong>ERROR</strong>: '+data.message+'</div>');
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
                    $('form#resetpassform').before('<div id="message"><strong>ERROR</strong>: '+data.message+'</div>');
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