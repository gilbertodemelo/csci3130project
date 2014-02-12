describe("Social pgae: friend search check", function() {

    var friend = "Derek";

	it("user is already a friend", function() {
        expect("exists").toEqual(Search("Vicky"));
    });

    it("user not found", function() {
        expect("not found").toEqual(Search("Sandy"));
    });

    it("user added", function() {
        expect("added").toEqual(Search(friend));
    });
});