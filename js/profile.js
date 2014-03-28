$(document).ready(function() {

    var uid  = localStorage.getItem('uid');
	var info;

    $.ajax({
        type: 'POST',
        url:  '../mySQL2.php',
        data: {
            func: 'get_profile',
            uid : uid
        },
        dataType: 'json',
        success: function(response) {
        	info = eval(response);
        	display_profile();
        }
    });
    function display_profile() {
        $('#header').html('<img src=\'../images/characters/' + info[1].head + '\' id =\'photo\'/>' + 
        	              '<p id =\'name\'>' + info[0].username + '</p>' + 
        	              '<p id = \'at\'>at <span id = \'position\'>' + info[0].position + '</span></p>');

	 	$('#Email').html(info[0].email);
		$('#Character').html(info[1].name);
		$('#Point').html(info[0].points);
		$('#Phone').html(info[0].phone);
    }
});
