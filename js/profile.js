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

    $('#profile').click(function() {
        display_profile();
    });

    $('#character').click(function() {
    	display_character();
    });
    function display_profile() {
	 	$('#container').html('<div>username:<p>' + info[0].username +'</p></div>' + 
							 '<div>nickname:<p>' + info[0].nickname +'</p></div>' + 
							 '<div>points:<p>' + info[0].points +'</p></div>' + 
							 '<div>current position:<p>' + info[0].position +'</p></div>'+
							 '<div>character:<p>' + info[1].name +'</p></div>');
    }
    function display_character() {
    	$('#container').html('<div>character name:<p>' + info[1].name +'</p></div>' +
	    				 	 '<div>from:<p>' + info[1].resource +'</p></div>' +  
	    				 	 '<img src=\'../img/characters/' + info[1].img +'\'/>' + 
	    				 	 '<div class = \'long\'>' + info[1].intro + '</div><br/><br/>');
    }
});