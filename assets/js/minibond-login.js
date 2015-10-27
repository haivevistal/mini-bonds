jQuery(document).ready(function($) {
    var boholwebtechno_ajax = {"ajaxurl":"/wp-admin/admin-ajax.php"};
    $('form#loginform label[for="user_login"]').html('<label for="user_login">Username / Email<br><input type="text" name="log" id="user_login" class="input" value="" size="20"></label>');
    $('input[name="wp-submit"]').click( function(e) {
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
                $('form#loginform').before('<div id="login_error"><strong>ERROR</strong>: '+data.message+'</div>');
                if (data.loggedin == true) {
                    document.getElementById("loginform").submit();
                    return true;
                } else {
                    return false;
                }
            }
        });
    });
    $('form#loginform #user_login, form#loginform #user_pass').change( function() {
        $('form#loginform #wp-submit').removeAttr('disabled');
    });
});