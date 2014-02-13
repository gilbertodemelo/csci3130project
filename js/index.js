$(document).ready(function() {

    function User(username, pwd) {
        this.username = username;
        this.pwd = pwd;
    }

    var user_list = [];
    user_list.push(new User("Tester", "group14"));

    $('.login_form form').submit(function() {
        var username = $(this).find('.username').val();
        var password = $(this).find('.password').val();

        $('form p').replaceWith('');
        // if username/password is empty
        if (username == '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '16px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.username').focus();
            });
            return false;
        }
        if (password == '') {
            $(this).find('.error').fadeOut('fast', function() {
                $(this).css('top', '70px');
            });
            $(this).find('.error').fadeIn('fast', function() {
                $(this).parent().find('.password').focus();
            });
            return false;
        }
      
        var user_found = false;
        for (i = 0; i < user_list.length; i++) {
            if (user_list[i].username === username) {
                if (user_list[i].pwd === password) {
                    return true;
                }  else {
                    $(this).append('<p><br/>Invalid Password : (</p>');
                    return false;
                }

                user_found = true;
            } 
        }

        if (!user_found)
            $(this).append('<p><br/>Invalid Username : (</p>');

        return user_found;
    });

    $('.login_form form .username, .login_form form .password').keyup(function() {
        $(this).parent().find('.error').fadeOut('fast');
    });
});