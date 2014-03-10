$(document).ready(function() {
	var uid = localStorage.getItem('uid');
	$.ajax({
        type: 'POST',
        url:  '../mySQL.php',
        data: {
            func: 'get_friend_list',
            uid : uid
        },
        dataType: 'text',
        success: function(response) {
            $('#list').html(response);
            $("#list").collapse({
				query: "div h3"
			});
        }
	});
});