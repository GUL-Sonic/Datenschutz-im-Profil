<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_friends_include.php							|
 | Author: Hajabamba (Starunited, Dennis Vorpahl)				|
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

// Display user field input
if ($profile_method == "input") {
	// There is nothing to display for input


// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	include INFUSIONS."su_friends_panel/infusion_db.php";
	echo "<tr>\n";
	echo "<td>".$locale['uf_friendslist_001']."</td>\n";
	echo "<td>\n";
		$friendslistresult=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE (friend_from='".$user_data['user_id']."' OR friend_to='".$user_data['user_id']."') AND friend_status='1'");
	if(dbrows($friendslistresult)){
		while($data_friends=dbarray($friendslistresult)){
			if($data_friends['friend_from']==$user_data['user_id']) {
			$where="user_id='".$data_friends['friend_to']."'";
			} else {
			$where="user_id='".$data_friends['friend_from']."'";
			}
			$datafriends2=dbarray(dbquery("SELECT user_id, user_name, user_avatar, user_status FROM ".DB_USERS." WHERE ".$where));
			
			if ($datafriends2['user_avatar'] == ''){
			echo profile_link($datafriends2['user_id'], "<img src='".BASEDIR."images/avatars/noavatar100.png' width='50px' height='50px' title='".$datafriends2['user_name']."'>", $datafriends2['user_status'])." \n";
			} 
			else {
			echo profile_link($datafriends2['user_id'], "<img src='".BASEDIR."images/avatars/".$datafriends2['user_avatar']."' width='50px' height='50px' title='".$datafriends2['user_name']."'>", $datafriends2['user_status'])." \n";
			
			}
	}
	}else{
		echo "<p>".$locale['uf_friendslist_002'].".</p>\n";
	}
	echo "</td>\n</tr>\n";
	}
	}
	
	if ($user_data['user_datenschutz'] == 2) {	
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	include INFUSIONS."su_friends_panel/infusion_db.php";
	echo "<tr>\n";
	echo "<td>".$locale['uf_friendslist_001']."</td>\n";
	echo "<td>\n";
		$friendslistresult=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE (friend_from='".$user_data['user_id']."' OR friend_to='".$user_data['user_id']."') AND friend_status='1'");
	if(dbrows($friendslistresult)){
		while($data_friends=dbarray($friendslistresult)){
			if($data_friends['friend_from']==$user_data['user_id']) {
			$where="user_id='".$data_friends['friend_to']."'";
			} else {
			$where="user_id='".$data_friends['friend_from']."'";
			}
			$datafriends2=dbarray(dbquery("SELECT user_id, user_name, user_avatar, user_status FROM ".DB_USERS." WHERE ".$where));
			
			if ($datafriends2['user_avatar'] == ''){
			echo profile_link($datafriends2['user_id'], "<img src='".BASEDIR."images/avatars/noavatar100.png' width='50px' height='50px' title='".$datafriends2['user_name']."'>", $datafriends2['user_status'])." \n";
			} 
			else {
			echo profile_link($datafriends2['user_id'], "<img src='".BASEDIR."images/avatars/".$datafriends2['user_avatar']."' width='50px' height='50px' title='".$datafriends2['user_name']."'>", $datafriends2['user_status'])." \n";
			
			}
	}
	} else{
		echo "<p>".$locale['uf_friendslist_002'].".</p>\n";
	}
	echo "</td>\n</tr>\n";
	}
	}
	
	
	if ($user_data['user_datenschutz'] == 3) {
	include INFUSIONS."su_friends_panel/infusion_db.php";
	echo "<tr>\n";
	echo "<td>".$locale['uf_friendslist_001']."</td>\n";
	echo "<td>\n";
		$friendslistresult=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE (friend_from='".$user_data['user_id']."' OR friend_to='".$user_data['user_id']."') AND friend_status='1'");
	if(dbrows($friendslistresult)){
		while($data_friends=dbarray($friendslistresult)){
			if($data_friends['friend_from']==$user_data['user_id']) {
			$where="user_id='".$data_friends['friend_to']."'";
			} else {
			$where="user_id='".$data_friends['friend_from']."'";
			}
			$datafriends2=dbarray(dbquery("SELECT user_id, user_name, user_avatar, user_status FROM ".DB_USERS." WHERE ".$where));
			
			if ($datafriends2['user_avatar'] == ''){
			echo profile_link($datafriends2['user_id'], "<img src='".BASEDIR."images/avatars/noavatar100.png' width='50px' height='50px' title='".$datafriends2['user_name']."'>", $datafriends2['user_status'])." \n";
			} 
			else {
			echo profile_link($datafriends2['user_id'], "<img src='".BASEDIR."images/avatars/".$datafriends2['user_avatar']."' width='50px' height='50px' title='".$datafriends2['user_name']."'>", $datafriends2['user_status'])." \n";
			
			}
	}
	}else{
		echo "<p>".$locale['uf_friendslist_002'].".</p>\n";
	}
	echo "</td>\n</tr>\n";
	}
	
// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	// There is nothing for input and update
}
?>