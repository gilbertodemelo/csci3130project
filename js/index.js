$(document).ready(function() {

	$('.login_form').submit(function() {

		var username = $('.username').val().toUpperCase();
		var password = $('.password').val();
		
		window.localStorage.uname = username;

        $.ajax({
                type: 'POST',
                url:  'mySQL.php',
                data: {
                    func: 'get_user_id',
                    uname: username
                },
                dataType: 'text',
                success: function(response) {
                    window.localStorage.uid = response;
                }
         });

        $.ajax({
                type: 'POST',
                url:  'mySQL.php',
                data: {
                    func: 'get_pokemon_id',
                    uid: localStorage.getItem('uid')
                },
                dataType: 'text',
                success: function(response) {
                    window.localStorage.pid = response;
                }
         });


		if (username == '' ) {
			$('#error').html("username needed");
			$('#error').fadeIn('fast');
			return false;
		} else if (password == '') {
			$('#error').html("password needed");
			$('#error').fadeIn('fast');
			return false;
		} else {
			$.ajax({
                type: 'POST',
                url:  'mySQL.php',
                data: {
                    func: 'login',
                    uname: username,
                    pwd: password
                },
                dataType: 'text',
                success: function(response) {
                    if (response === 'success') {
                    	$('#error').html("success")
                        $('#error').fadeIn('fast');
						window.location = 'pages/main.html';
                    } else {
                    	$('#error').html("invalid username/password")
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