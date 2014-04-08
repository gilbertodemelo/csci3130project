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
 * get user's geographic information
 * @param  [num] $uid user id
 * @return [json]username and positions
 */
function get_geo_info($uid) {
	$user_rows = 
		mysql_fetch_row(
        mysql_query(
        	'SELECT * FROM group14.user WHERE userid = '.$uid.''));
			$user_info = array('username' => $user_rows[1],
							   'x'        => $user_rows[6],
							   'y'        => $user_rows[7]);
 	return $user_info;
}
/**
 * get id of the user based on his username
 * @param  [type] $uname [usernmae]
 * @return [type]        [description]
 */
function get_user_id($uname) {
	$uid = 
		mysql_fetch_row(
		mysql_query(
			'SELECT userid FROM group14.user WHERE username = \''.$uname.'\''));
	return $uid[0];
}
/**
 * get the friend list of user with specific user if
 * @param  [num] $uid the userid
 * @return [array]    the list of friends 
 */
function get_id_list($uid) {
	$friend_id_list = 
		mysql_fetch_row(
		mysql_query('SELECT * FROM group14.friendList WHERE id = '.$uid.''));
	array_shift($friend_id_list);
	return $friend_id_list;
}
/**
 * get the basic informtaion of friends
 * this is used in the main page where only 
 * @param  [num ] $uid user id 
 * @return [json]      an array of json data contains the geo locatiosn and friends' names
 */
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
/**
 * get the location (game) based on longitude and laltitude
 * @param  [num ] $x longitude
 * @param  [num ] $y laltitude
 * @return [text]    the corresponding location
 */
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
/**
 * get the character information based on character id
 * @param  [num ] $cid the character id
 * @return [json]      the json data containing character information
 */
function get_character_info($cid) {
	$character = 
		mysql_fetch_row(
		mysql_query(
			'SELECT * FROM group14.character WHERE character_id = '.$cid.''));
	$character_info = array('name'=>$character[1],
						    'resource'=>$character[3],
					 	    'img'=>$character[4],
					 	    'head'=>$character[5],
					        'intro'=>$character[2]);
	return $character_info;
}
/**
 * get the profile information of a user, contains both account info and character info
 * @param  [num ] $uid [the user id]
 * @return [json]      [the json data containing user information]
 */
function get_user_info($uid) {
	$user = 
		mysql_fetch_row(
		mysql_query(
			'SELECT * FROM group14.user WHERE userid = '.$uid.''));
	$location = 
		get_user_location($user[6], $user[7]);
	$last_event = 
		get_last_event($uid);
	$profile = array('username'  =>$user[1],
					 'phone'     =>$user[8],
					 'email'     =>$user[2],
					 'points'    =>$user[4],
					 'position'  =>$location,
					 'character_id' =>$user[5],
					 'event' => $last_event);
	return $profile;
}
/**
 * get the profile
 * @param  [num ] $uid 
 * @return [json] profile information
 */
function get_profile($uid) {
	$profile = 
		get_user_info($uid); 
	$character = 
		get_character_info($profile['character_id']);
	$info = array($profile, $character);
	$json_info = json_encode($info);
	echo $json_info;
}
/**
 * the header profile in each page, only head img and username is needed
 * @param  [uname] $uname [username]
 * @return [json ]        
 */
function get_profile2($uname) {
	$uid = get_user_id($uname);
	echo get_profile($uid);
}
/**
 * get the last event of friend
 * @param  [num ] $uid user id 
 * @return [text]      the last event
 */
function get_last_event($uid) {
	$event_list = 
		mysql_fetch_row(
		mysql_query(
			'SELECT event5 FROM group14.eventList WHERE user_id = '.$uid.''));
	$event = 
		mysql_fetch_row(
		mysql_query(
			'SELECT event FROM group14.events WHERE id = '.$event_list[0].''));
	return $event[0];
}
/**
 * get the list of friends with corresponding information
 * @param  [uid ] $uid [user id]
 * @return [json]      [the array of json data containing friends information]
 */
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

			$friend = array('name' => $profile['username'],
							'points'=>$profile['points'],
							'position'=>$profile['position'],
							'character'=>$character['name'],
							'img'=>$character['img'],
							'intro'=>$character['intro'],
							'head'=>$character['head']);
			array_push($friends, $friend);
		}		
	} 
	$friend_json = json_encode($friends);
	echo $friend_json;
}
/**
 * search friend function
 * @param  [num ] $uid   the user id
 * @param  [text] $fname the name of the user you want to search
 * @return [text] user not exist/don't add yourself/add successful       
 */
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
/**
 * get the events list displayed in recent events
 * @param  [num ] $uid user id
 * @return [json]      get the list of recent events, containing events, points
 *                     and it direction (+/-)
 */
function get_event_list($uid) {
	$event_list = 
		mysql_fetch_row(
		mysql_query(
			'SELECT * FROM group14.eventList WHERE user_id = '.$uid.''));
	$recent = array();
	$profile;
	$events = array();
	foreach ($event_list as $index => $event_id) {
		if ($index == 0) {
			$user_info = 
				mysql_fetch_row(
				mysql_query(
				'SELECT * FROM group14.user WHERE userid = '.$event_id.''));
			$head = 
				mysql_fetch_row(
				mysql_query(
				'SELECT head FROM group14.character WHERE character_id = '.$user_info[5].''));
			$profile = array('name' => $user_info[1], 
				             'points' => $user_info[4], 
				             'head' => $head[0]);
			array_push($recent, $profile);
			continue;
		}

		$event_info = 
			mysql_fetch_row(
			mysql_query(
			'SELECT * FROM group14.events WHERE id = '.$event_id.''));
		$event = array('direction' => $event_info[2],
			           'event' => $event_info[1], 
			           'value' => $event_info[3]);
		array_push($events, $event);
	}
	array_push($recent, $events);
	$event_json = json_encode($recent);
	echo $event_json;
}
/**
 * delete friend
 * @param  [num ] $uid   [user id]
 * @param  [text] $fname [the friend user]
 * @return [num ]        [the friend id]
 */
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
    case 'get_event_list':
        get_event_list($_POST['uid']);
        break;
	case 'get_profile':
        get_profile($_POST['uid']);
        break;
	case 'get_profile2':
        get_profile2($_POST['uname']);
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