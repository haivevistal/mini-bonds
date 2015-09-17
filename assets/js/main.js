(function($) {
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
})(jQuery);