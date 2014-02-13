describe("Index pgae: input check", function() {
    
    var username = "Derek";
    var password = "Test";
    var check;

    it("Username is null", function() {
        check = new input_check('', password);
        expect(false).toEqual(check.null_check());
    });

    it("Password is null", function() {
        check = new input_check(username, '');
        expect(false).toEqual(check.null_check());
    });

    it("Both have inputs", function() {
        check = new input_check(username, password);
        expect(true).toEqual(check.null_check());
    });

    it("User found and pwd matches", function() {
        check = new input_check(username, password);
        expect(true).toEqual(check.correct_check());
    });

    it("user found but pwd not matchses", function() {
        check = new input_check(username, '');
        expect(false).toEqual(check.correct_check());
    });

    it("jump to main page if info matches", function() {
        check = new input_check(username, password);
        expect("../pages/main.html").toEqual(check.to_main_page());
    });
});
