$(document).ready(function() {

    $('.login_form').submit(function() {

        var username = $('.username').val().toUpperCase();
        var password = $('.password').val();

        $.ajax({
            type: 'POST',
            url: 'mySQL1.php',
            data: {
                func: 'get_user_id',
                uname: username
            },
            dataType: 'text',
            success: function(response) {
                localStorage.setItem('uid', response);
            }
        });
        /**
         * if userinput is none
         * @type {[type]}
         */
        if (username == '') {
            $('#error').append("username needed</br>");
            $('#error').fadeIn('fast');
            return false;

        }
        /**
         * if password is none
         * @type {[type]}
         */
        else if (password == '') {
            $('#error').html("password needed</br>");
            $('#error').fadeIn('fast');
            return false;
        } else {
            $.ajax({
                type: 'POST',
                url: 'mySQL1.php',
                data: {
                    func: 'login',
                    uname: username,
                    pwd: password
                },
                dataType: 'text',
                success: function(response) {
                    if (response === 'true') {
                        $('#error').html("success")
                        $('#error').fadeIn('fast');
                        window.location = 'pages/main.html';
                    } else {
                        /**
                         * if username and password don't match
                         */
                        $('#error').html("invalid username/password<br/>")
                        $('#error').fadeIn('fast');
                    }
                }
            });
        }
        return false;
    });

    $('.username').keyup(function() {
        $('#error').fadeOut('fast');
    });
    $('.password').keyup(function() {
        $('#error').fadeOut('fast');
    });
});