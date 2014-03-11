<?php
$user = $_GET["user"];

$server_name = "localhost";
$username = "group14";
$password = "group14";

$con = mysql_connect($server_name, $username, $password);
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("group14", $con);

function login($uname, $pwd) {
	$result = mysql_query(
		'SELECT password FROM user WHERE username = \''.$uname.'\'');
	if (mysql_num_rows($result) > 0) {
        $res = mysql_fetch_array($result);
        if ($res[0] == $pwd) {
            return true;
        }
    }
    return false;
}

function get_user_id($uname) {
    $result = 
        mysql_query('SELECT userid FROM group14.user WHERE username = \''.$uname.'\'');

    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_row($result);
        return $row[0];
    }
    return 0;
}

function get_user_info($uid, $pid) {
    $result = 
        mysql_query('SELECT * FROM group14.user WHERE userid = \''.$uid.'\'');
    $pokemon = 
        mysql_fetch_row(
            mysql_query('SELECT name FROM group14.character WHERE character_id = '.$pid.''));

    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_row($result)) {  
            return "<br/>
                    <div> username: <p>{$row[1]}</p></div>
                    <div> nickname: <p>{$row[2]}</p></div>
                    <div> points: <p>{$row[4]}</p></div>
                    <div> current position: </div>
                    <div> pokemon: <p>{$pokemon[0]}</p></div>";
        }
    } 
}

function get_pokemon_id($uid) {
    $result = 
        mysql_query('SELECT character_id FROM group14.user WHERE userid = '.$uid.'');

    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_row($result);
        return $row[0];
    }
    return 0;
}

function get_pokemon_info($pid) {
    $pokemon = 
        mysql_fetch_row(
            mysql_query('SELECT * FROM group14.character WHERE character_id = '.$pid.''));
    return "<br/>
            <div> name: <p>{$pokemon[1]}</p></div>
            <div> from: <p>{$pokemon[3]}</p></div>
            <img src = '../img/{$pokemon[4]}'/>
            <div class = 'long'> description: {$pokemon[2]}</div>";
}

function get_friend_info($uid) {
    $pid = get_pokemon_id($uid);
    $pokemon = 
        mysql_fetch_row(
            mysql_query('SELECT * FROM group14.character WHERE character_id = '.$pid.''));
    $info = 
         mysql_fetch_row(
            mysql_query('SELECT * FROM group14.user WHERE userid = '.$uid.''));

    return "<img src = '../img/{$pokemon[4]}'/>
           <div>character: <p>{$pokemon[1]}</p></div>
           <div>points: <p>{$info[4]}</p></div>";
}

function get_friend_list($uid) {
    $result = 
        mysql_query('SELECT * FROM group14.friendList WHERE id = '.$uid.'');

    $friend = "";
    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_row($result);
        for ($i = 1; $i < count($row); $i++) {
            if ($row[$i] != "") {
                $user = 
                    mysql_fetch_row(
                        mysql_query('SELECT * FROM group14.user WHERE userid = '.$row[$i].''));

                $info = get_friend_info($row[$i]);

                $friend.= "<div><h3>{$user[1]}</h3>
                           <div class = 'content'>{$info}</div>
                           </div>";
            }
        }
    }
    return $friend;
}

function search_friend($uid, $fname) {
    $fid = get_user_id($fname);
    $info = "";
    if ($fid == 0) {
        $info .= "User not exists";
    } else {
        $flist = 
            mysql_query('SELECT * FROM group14.friendList WHERE id = '.$uid.'');
        if (mysql_num_rows($flist) > 0) {
            $row = mysql_fetch_row($flist);
            if (in_array($fid, $row)) 
                $info.= "Already exists";
            else {
                for($i = 1; $i < count($row); $i++) {
                    if ($row[$i] == "")
                        break;
                }
                mysql_query('UPDATE group14.friendList SET friend'.$i.'='.$fid.' WHERE id = '.$uid.'');
                    $info = "Added Successful";
            }
        }
    }
    return $info;
}

$ajax_resp = Array (
    true => 'success',
    false => 'fail'
);	

switch ($_POST['func']) {
    case 'login':
        echo $ajax_resp[
                login($_POST['uname'], $_POST['pwd'])];
        break;
    case 'register':
        echo $ajax_resp[
                register($_POST['uname'], $_POST['pwd'], $_POST['nickname'])];
        break;
    case 'get_user_info':
        echo get_user_info($_POST['uid'], $_POST['pid']);
        break;  
    case 'get_pokemon_id':
        echo get_pokemon_id($_POST['uid']);
        break;     
    case 'get_user_id':
        echo get_user_id($_POST['uname']);
        break; 
    case 'get_pokemon_info':
        echo get_pokemon_info($_POST['pid']);
        break;
    case 'get_friend_list':
        echo get_friend_list($_POST['uid']);
        break;
    case 'search_friend':
        echo search_friend($_POST['uid'], $_POST['fname']);
        break;
}
?>