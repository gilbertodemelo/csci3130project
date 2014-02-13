$(document).ready(function() {
	// delete later
	// get from database

	function Friend(id, name, info, img) {
		this.id = id;
		this.name = name;
		this.info = info;
		this.img = img;

		this.intro = name + " is " + info + " today.........";
	}

	var friend_list = [];
	friend_list.push(new Friend(1, "Vicky", "Meowth", "../img/Meowth.gif"),
		new Friend(2, "Tsubasa", "Bulbasaur", "../img/Bulbasaur.gif"),
		new Friend(3, "Gilberto", "Squirtle", "../img/Squirtle.gif"),
		new Friend(4, "Richard", "Charmander", "../img/Charmander.gif")
	);
	for (i = 0; i < friend_list.length; i++) {
		var title = "<div>" +
			"<h3>" + friend_list[i].name +
			"<button class = \"delete\">X</button>" +
			"</h3>" +
			"<div class=\"content\">" +
			"<img src =\"" + friend_list[i].img + "\"/>" +
			"<p>" + friend_list[i].intro + "</p>" +
			"</div>" +
			"</div>";
		$("#list").append(title);
	}
	// delete end

	$("#list").collapse({
		query: "div h3"
	});


	$('button.delete').click(function() {
		var d1 = $(this).parentsUntil('#list');
		var d2 = d1.find('.content');
		d1.remove();
		d2.remove();
		return true;
	});
});