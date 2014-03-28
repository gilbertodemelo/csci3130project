$(document).ready(function() {

    $('#register_form').submit(function() {

        var username = $('.username').val().toUpperCase();
        var password = $('.password').val();
        var email = $('.email').val();
        var phone = $('.phone').val();


        if (username == '') {
            $('#error').html("<br/>username needed");
            return false;
        } else if (password == '') {
            $('#error').html("<br/>password needed");
            return false;
        } else {
           $.ajax({
                type: 'POST',
                url: '../mySQL1.php',
                data: {
                    func: 'register',
                    uname: username, 
                    password: password,
                    email: email,
                    phone: phone
                },
                dataType: 'text',
                success: function(response) {
                    if (response === "Username Exists") {
                         $('#error').html("<br/>Username Exists");
                    } else {
                        $('#error').html("<br/>"+response);
                         window.location = '../index.html';
                    }
                }
            });
        }
        return false;
    });

    $('.username').keyup(function() {
        $('#error').html('');
    });
    $('.password').keyup(function() {
        $('#error').html('');
    });
});