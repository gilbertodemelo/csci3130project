$(document).ready(function() {

	var user = {
		'name' : "Derek Reilly",
		'points' : 100,

		'display' : function() {
			$('#search').append('<p>Username: ' + this.name + '</p>' +
		                '<p>Points:' + this.points + '</p>').css('color', '#fff');	
		}	
	}
	
	user.display();
});