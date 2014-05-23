<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: su_friends_panel.php								|
 | CVS Version: 1.5												|
 | Author: 	Dennis Vorpahl										|
 | Support: http://webmaster.meinweb.net						|
 | updated 	for privacy policy by:								|
 | Author:  GUL-Sonic (Ingo Wehrstedt)                          |
 | Web: 	http://www.germanys-united-legends.de 				|
 +--------------------------------------------------------------+
 | This program is released as free software under the			|
 | Affero GPL license. You can redistribute it and/or			|
 | modify it under the terms of this license which you			|
 | can read by viewing the included agpl.txt or online			|
 | at www.gnu.org/licenses/agpl.html. Removal of this			|
 | copyright header is strictly prohibited without				|
 | written permission from the original author(s).				|
 +--------------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (file_exists(INFUSIONS."su_friends_panel/locale/".$settings['locale'].".php")) {
	require_once INFUSIONS."su_friends_panel/locale/".$settings['locale'].".php";
} else {
	require_once INFUSIONS."su_friends_panel/locale/German.php";
}
if ((iMEMBER) and $userdata['user_datenschutz'] == '') {
openside ('Datenschutzeinstellung');
echo"<div style='background-color:#FFDDDD'>".$locale['SUF031']."</div>";
closeside();
}
else {

openside($locale['SUF003']);

if(iMEMBER){
	include INFUSIONS."su_friends_panel/infusion_db.php";
	
	$result=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE (friend_from='".$userdata['user_id']."' OR friend_to='".$userdata['user_id']."') AND friend_status='1' ORDER BY friend_name ASC LIMIT 0,5");
	if(dbrows($result)){
		while($data=dbarray($result)){
			if($data['friend_from']==$userdata['user_id']) $where="user_id='".$data['friend_to']."'";
			else $where="user_id='".$data['friend_from']."'";
		
			$data2=dbarray(dbquery("SELECT user_id, user_vorname, user_nachname, user_status FROM ".DB_USERS." WHERE ".$where));
			echo "
			<table border='0' width='100%'>
			<tr>
			<td width='90%'>".profile_link($data2['user_id'], $data2['user_vorname']." ".$data2['user_nachname'],$data2['user_status'], true)." </td>
			<td width='10%'><a href='".BASEDIR."messages.php?msg_send=".$data2['user_id']."'><img src='".IMAGES."04.png' border='0' /></a><br /></td>\n
			</tr>
			</table>";
		}

		echo "<br /><center><a href='".INFUSIONS."su_friends_panel/my_friends.php' class='side'>".$locale['SUF029']."</a></center>\n";
	}else{
		echo "<p>".$locale['SUF024']."</p>\n";
	}
}else{
	echo "<p>".$locale['SUF025'].".</p>\n";
	
}
closeside();
}
?>