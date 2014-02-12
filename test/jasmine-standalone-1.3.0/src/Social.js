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

var others = new Friend(5, "Derek", "Pikachu", "../img/Pikachu.gif");

function Search(friend) {
	for (i = 0; i < friend_list.length; i++)
		if (friend === friend_list[i].name)
			return "exists";
	if (friend !== others.name)
		return "not found";
	else 
		return "added";
}
