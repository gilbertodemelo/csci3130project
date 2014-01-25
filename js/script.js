$(document).ready(function() {

    $('.page-container form').submit(function() {
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();
        // if username/password is empty
        if (username == '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '10px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.username').focus();
            });
            return false;
        }
        if (password == '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '67px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.password').focus();
            });
            return false;
        }
    });

    $('.page-container form .username, .page-container form .password').keyup(function() {
        $(this).parent().find('.error').fadeOut('fast');
    });

});