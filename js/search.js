$(document).ready(function() {
	$('#search').click(function() {
		var friend_name = $('#friend').val().toUpperCase();
        $.ajax({
            type: 'POST',
            url:  '../mySQL2.php',
            data: {
                func:  'search_friend',
                uid:   localStorage.getItem('uid'),
                fname: friend_name
            },
            dataType: 'text',
            success: function(response) {
                $('#result').html(response);
                if (response == "added successful") {
                    $('#friend_list').append('<div class = \'friend\'>' + friend_name + 
                      '<button type=\'button\' class=\'delete\' data-icon=\'p\'></button>' + 
                      '</div>');
                }
            }
        });
	});
});