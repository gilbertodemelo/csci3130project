$(document).ready(function() {
	var a_on = 0;
	var b_on = 0;
	var c_on = 0;
	var d_on = 0;
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
	$('#b').click(function() {
		if(!b_on) {
			$(this).append('<p id = \'b_de\'>instruction2</p>');
			$(this).css('color', '#B6AEF2');
			b_on = 1;
		} else {
			$('#b_de').remove();
			$(this).css('color', '#858585');
			b_on = 0;
		}
	});
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