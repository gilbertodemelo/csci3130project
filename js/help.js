$(document).ready(function() {
	var a_on = 0;
	var b_on = 0;
	var c_on = 0;
	var d_on = 0;
	/**
	 * Introduction to this  game
	 * @return {[type]} [description]
	 */
	$('#a').click(function() {
		if(!a_on) {
			$(this).append('<p id = \'a_de\'>hello</p>');
			$(this).css('color', '#FB9CA1');
			a_on = 1;
		} else {
			$('#a_de').remove();
			$(this).css('color', '#858585');
			a_on = 0;
		}
	});
	/**
	 * How to play this game
	 * @return {[type]} [description]
	 */
	$('#b').click(function() {
		if(!b_on) {
			$(this).append('<p id = \'b_de\'>Generic Game #1067 is a game that allows a user to interact with his/her friends by simply moving around
the Dalhousie Campus. Just open the game as soon as you are on campus, and you will be playing!</p>');
			$(this).css('color', '#B6AEF2');
			b_on = 1;
		} else {
			$('#b_de').remove();
			$(this).css('color', '#858585');
			b_on = 0;
		}
	});
	/**
	 * How to gain points
	 * @return {[type]} [description]
	 */
	$('#c').click(function() {
		if(!c_on) {
			$(this).append('<p id = \'c_de\'>instruction3</p>');
			$(this).css('color', '#9CF0BC');
			c_on = 1;
		} else {
			$('#c_de').remove();
			$(this).css('color', '#858585');
			c_on = 0;
		}
	});
	/**
	 * Who is derek reilly
	 * @return {[type]} [description]
	 */
	$('#d').click(function() {
		if(!d_on) {
			$(this).append('<p id = \'d_de\'>instruction4</p>');
			$(this).css('color', '#F0DC9C');
			d_on = 1;
		} else {
			$('#d_de').remove();
			$(this).css('color', '#858585');
			d_on = 0;
		}
	});

});