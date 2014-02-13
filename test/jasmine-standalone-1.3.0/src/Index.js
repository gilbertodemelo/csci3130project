
function input_check(username, password) {

	this.correct_usr = "Derek";
	this.correct_pwd = "Test";

	this.null_check = function() {
		return !(username === '' || password === '');
	}

	this.correct_check = function() {
		return username === this.correct_usr && password === this.correct_pwd;
	}	

	this.to_main_page = function() {
		if (this.null_check())
			return "../pages/main.html";
	}
}