<?php
$server_name = "localhost";
$username    = "group14";
$password    = "group14";

$con = mysql_connect($server_name, $username, $password);
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("group14", $con);

function get_geo_info($uid) {
	$user_rows = 
		mysql_fetch_row(
        mysql_query(
        	'SELECT * FROM group14.user WHERE userid = '.$uid.''));
			$user_info = array('nickname' => $user_rows[2],
							   'x'        => $user_rows[6],
							   'y'        => $user_rows[7]);
 	return $user_info;
}

function get_user_id($uname) {
	$uid = 
		mysql_fetch_row(
		mysql_query(
			'SELECT userid FROM group14.user WHERE nickname = \''.$uname.'\''));
	return $uid[0];
}

function get_id_list($uid) {
	$friend_id_list = 
		mysql_fetch_row(
		mysql_query('SELECT * FROM group14.friendList WHERE id = '.$uid.''));
	array_shift($friend_id_list);
	return $friend_id_list;
}

function get_friend_info($uid) {
	$friend_info = 
		mysql_fetch_row(
	    mysql_query(
			'SELECT * FROM group14.friendList WHERE id = '.$uid.''));
	$friend_list = array();
	foreach ($friend_info as $value) {
		if ($value != "")
			array_push($friend_list, get_geo_info($value));      
	}
   	$json_result = json_encode($friend_list);       
	echo $json_result;
}

function get_user_location($x, $y) {
	for ($i = 1; $i <= 19; $i++) {
		$location = 
			mysql_fetch_row(
			mysql_query(
				'SELECT * FROM group14.location WHERE id = \''.$i.'\''));

		if ($x > $location[2] && $x < $location[3] &&
            $y > $location[4] && $y < $location[5]) {
			return $location[1];
		}
	}
	return "country road";
}

function get_character_info($cid) {
	$character = 
		mysql_fetch_row(
		mysql_query(
			'SELECT * FROM group14.character WHERE character_id = '.$cid.''));
	$character_info = array('name'=>$character[1],
						    'resource'=>$character[3],
					 	    'img'=>$character[4],
					        'intro'=>$character[2]);
	return $character_info;
}

function get_user_info($uid) {
	$user = 
		mysql_fetch_row(
		mysql_query(
			'SELECT * FROM group14.user WHERE userid = '.$uid.''));
	$location = 
		get_user_location($user[6], $user[7]);

	$profile = array('username'  =>$user[1],
					 'nickname'  =>$user[2],
					 'points'    =>$user[4],
					 'position'  =>$location,
					 'character_id' =>$user[5]);
	return $profile;
}

function get_profile($uid) {
	$profile = 
		get_user_info($uid); 
	$character = 
		get_character_info($profile['character_id']);
	$info = array($profile, $character);
	$json_info = json_encode($info);
	echo $json_info;
}

function get_friend_list($uid) {
	$friend_id_list = 
		get_id_list($uid);
	$friends = array();
	foreach ($friend_id_list as $value) {
		if ($value != "") {
			$profile = 
				get_user_info($value);
			$character = 
				get_character_info($profile['character_id']);

			$friend = array('name' => $profile['nickname'],
							'points'=>$profile['points'],
							'position'=>$profile['position'],
							'character'=>$character['name'],
							'img'=>$character['img'],
							'intro'=>$character['intro']);
			array_push($friends, $friend);
		}		
	} 
	$friend_json = json_encode($friends);
	echo $friend_json;
}

function search_friend($uid, $fname) {
	$fid = 
		get_user_id($fname);
	$result = "";
	if ($fid == "") 
		$result.="user not exists";
	elseif ($fid == $uid)
		$result.="don't add yourself!";
	else {
		$friend_list = 
			get_id_list($uid);
		$i = 0;
		if (in_array($fid, $friend_list))
			$result.="already exists";
		else {
			foreach ($friend_list as $index => $id) {
				if ($id == "") {
					$i= $index+1;
					break;
				}
			}
			mysql_query('UPDATE group14.friendList SET friend'.$i.'='.$fid.' WHERE id = '.$uid.'');
			$result .= "added successful";
		}
	}
	echo $result;
}

function get_delete_list($uid) {
	$friend_list = 
		get_id_list($uid);
	$delete_list = array();
	foreach ($friend_list as $value) {
		if ($value != "") {
			$name = 
				mysql_fetch_row(
				mysql_query(
					'SELECT nickname FROM group14.user WHERE userid = '.$value.''));
			array_push($delete_list, $name[0]);
		}
	}
	$list_json = json_encode($delete_list);
	echo $list_json;
}

function delete_friend($uid, $fname) {
	$fid = 
		get_user_id($fname);
	$friend_list = 
		get_id_list($uid);
	foreach ($friend_list as $i => $value) {
		if ($fid == $value) {
			mysql_query('UPDATE group14.friendList SET friend'.($i+1).'= null WHERE id = '.$uid.'');
            return $fid;
		}
	}
	return $fid;
}

switch ($_POST['func']) {
    case 'get_friend_info':
        get_friend_info($_POST['uid']);
        break;
	case 'get_profile':
        get_profile($_POST['uid']);
        break;
    case 'get_friend_list':
    	get_friend_list($_POST['uid']);
    	break;
    case 'search_friend':
    	search_friend($_POST['uid'],$_POST['fname']);
    	break;
	case 'get_delete_list':
    	get_delete_list($_POST['uid']);
    	break;
    case 'delete_friend':
        echo delete_friend($_POST['uid'], $_POST['fname']);
        break;
}
?>