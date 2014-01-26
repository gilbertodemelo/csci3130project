$(document).ready(function() {

    $('.login_form form').submit(function() {
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();
        // if username/password is empty
        if (username == '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '17px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.username').focus();
            });
            return false;
        }
        if (password == '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '75px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.password').focus();
            });
            return false;
        }
    });

    $('.login_form form .username, .login_form form .password').keyup(function() {
        $(this).parent().find('.error').fadeOut('fast');
    });
});