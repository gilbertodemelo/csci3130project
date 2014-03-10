$(document).ready(function() {

	$('#search').click(function() {
		var friend_name = $('#friend').val().toUpperCase();

		$.ajax({
            type: 'POST',
            url:  '../mySQL.php',
            data: {
                func: 'search_friend',
                uid: localStorage.getItem('uid'),
                fname: friend_name
            },
            dataType: 'text',
            success: function(response) {
                $('#result').html(response);
            }
        });
	});
});