<?php
$server_name = "localhost";
$username    = "group14";
$password    = "group14";

$con = mysql_connect($server_name, $username, $password);
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("group14", $con);
/**
 * get user id based on username
 * @param  [text] $uname [the username]
 * @return [int]        [user id]
 */
function get_user_id($uname) {
	$uid = 
		mysql_fetch_row(
		mysql_query(
			'SELECT userid FROM group14.user WHERE username = \''.$uname.'\''));
	echo $uid[0];
}
/**
 * login check
 * @param  [text] $uname [user input username]
 * @param  [text] $pwd   [user input password]
 * @return [login result]        
 */
function login($uname, $pwd) {
	$password = 
		mysql_fetch_row(
		mysql_query(
			'SELECT password FROM group14.user WHERE username = \''.$uname.'\''));
	if ($password[0] == $pwd)
		echo 'true';
	else 
		echo 'false';
}
/**
 * register
 * @param  [text] $uname    [username]
 * @param  [text] $password [user password]
 * @param  [text] $email    [email]
 * @param  [text] $phone    [phone number]
 * @return [register result]         
 */
function register($uname, $password, $email, $phone) {
	$user_id = 
		mysql_fetch_row(
		mysql_query(
			'SELECT userid FROM group14.user WHERE username = \''.$uname.'\''));
	if ($user_id[0] != '') {
		echo "Username Exists";
	} else {
		$unum = 
			mysql_fetch_row(
			mysql_query(
				'SELECT count(*) FROM group14.user'));
		$num = $unum[0] + 1;
		$c_num =
			mysql_fetch_row(
			mysql_query(
				'SELECT count(*) FROM group14.character'));
		$c_id = rand(1, $c_num[0]);
		mysql_query('INSERT INTO group14.user VALUES (\''.$num.'\', \''.$uname.'\', \''.$email.'\', \''.$password.'\', \'0\',\''.$c_id.'\', \'0.2\', \'0.2\', \''.$phone.'\')');
		mysql_query('INSERT INTO group14.friendList (id) VALUES (\''.$num.'\')');
		mysql_query('INSERT INTO group14.eventList (user_id) VALUES (\''.$num.'\')');
		echo 'Register successful';
	}
}

switch ($_POST['func']) {
    case 'get_user_id':
        get_user_id($_POST['uname']);
        break;
    case 'login':
    	login($_POST['uname'],$_POST['pwd']);
    	break;
    case 'register':
    	register($_POST['uname'], $_POST['password'], $_POST['email'], $_POST['phone']);
    	break;
}
?>