describe("Main Page: link check", function() {

	it("jump tp profile", function() {
        expect("../pages/profile.html").toEqual(page_jump(true, false, false, false));
    });

    it("jump tp social", function() {
        expect("../pages/social.html").toEqual(page_jump(false, true, false, false));
    });

    it("jump tp help", function() {
        expect("../pages/help.html").toEqual(page_jump(false, false, true, false));
    });

    it("exit", function() {
        expect("../pages/social.html").toEqual(page_jump(false, true, false, false));
    });

});