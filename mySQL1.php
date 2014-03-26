<?php
$server_name = "localhost";
$username    = "group14";
$password    = "group14";

$con = mysql_connect($server_name, $username, $password);
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("group14", $con);

function get_user_id($uname) {
	$uid = 
		mysql_fetch_row(
		mysql_query(
			'SELECT userid FROM group14.user WHERE username = \''.$uname.'\''));
	echo $uid[0];
}

function login($uname, $pwd) {
	$password = 
		mysql_fetch_row(
		mysql_query(
			'SELECT password FROM group14.user WHERE username = \''.$uname.'\''));
	if ($password[0] == $pwd)
		echo 'true';
	else 
		echo 'false';
	// echo ($password[0] == $pwd);
}

switch ($_POST['func']) {
    case 'get_user_id':
        get_user_id($_POST['uname']);
        break;
    case 'login':
    	login($_POST['uname'],$_POST['pwd']);
    	break;
}
?>