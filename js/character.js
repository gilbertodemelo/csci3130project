$(document).ready(function() {

    var uid  = localStorage.getItem('uid');
	var info;
    /**
     * ajax function to call get_profile function 
     * @param  {json} response) {                       info = eval(response);            display_character();        }    } [description]
     * @return           
     */
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
        	display_character();
        }
    });
    /**
     * display the basic information of the character of the user today
     * @return 
     */
    function display_character() {
        $('#header').html('<a href = \'profile.html\'><div id = \'back\' data-icon = \'i\'></div></a>' + 
        	              '<p id =\'name\'>' + info[1].name + '</p>' + 
        	              '<p id = \'at\'>from <span id = \'position\'>' + info[1].resource + '</span></p>');

	 	$('#container').html('<img src=\'../images/characters/' + info[1].img + '\' />' + 
                             '<div id = \'long\'>' + info[1].intro + '</div>' +   
                             '<br/><br/><br/>');
    }
});
