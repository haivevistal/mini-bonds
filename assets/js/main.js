(function($) {
    var mini_bonds_ajax = '/wp-admin/admin-ajax.php';
    $(document).ready( function() {
        $('#minibonds-registrationForm').parsley();
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