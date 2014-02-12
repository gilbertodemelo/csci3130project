
function page_jump(profile_pressed, social_pressed, help_pressed, exit) {

	if (profile_pressed)
		return "../pages/profile.html";
	else if (social_pressed)
		return "../pages/social.html";
	else if (help_pressed)
		return "../pages/help.html";
	else if (exit)
		return "../index.html";
}