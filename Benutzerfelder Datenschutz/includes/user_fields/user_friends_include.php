<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: user_friends_include.php
| Author: Hajabamba (Starunited, Dennis Vorpahl)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

// Display user field input
if ($profile_method == "input") {
	// There is nothing to display for input
 echo"";

// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if((!iADMIN) and $userdata['user_id'] != $user_data['user_id']){
	echo"<center><img src='".BASEDIR."images/stop.png'><br><br><strong>Dieses Profil ist privat!</strong></center>";
	echo "<tr>\n";
	echo "<td class='tbl1'>".$locale['uf_friends_002']."</td>\n";
	}
	}
	
	elseif ($user_data['user_datenschutz'] == 2) {
	if(!isfriend($userdata['user_id'], $user_data['user_id']) and (!iADMIN) and $userdata['user_id'] != $user_data['user_id']){
	echo"<center><img src='".BASEDIR."images/stop.png'><br><br>".$locale['uf_friends_003']."</center>";
	}
	include INFUSIONS."su_friends_panel/infusion_db.php";
	$friendsaddresult=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE (friend_from='".$user_data['user_id']."' AND friend_to='".$userdata['user_id']."') OR (friend_from='".$userdata['user_id']."' AND friend_to='".$user_data['user_id']."')");
	if(!dbrows($friendsaddresult) && $userdata['user_id'] != $user_data['user_id']){
		echo "<tr>\n";
		echo "<td class='tbl1'>".$user_data['user_name']."</td>\n";
		echo "<td align='right' class='tbl1'>";
		echo "<a href='".INFUSIONS."su_friends_panel/my_friends.php?do=0&amp;friendto=".$user_data['user_id']."' title='".$user_data['user_name']." ".$locale['uf_friends_001']."'>".$locale['uf_friends_001']."</a>\n";
		echo "</td>\n</tr>\n";
	}
	}
	
	elseif ($user_data['user_datenschutz'] == 3) {
	include INFUSIONS."su_friends_panel/infusion_db.php";
	$friendsaddresult=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE (friend_from='".$user_data['user_id']."' AND friend_to='".$userdata['user_id']."') OR (friend_from='".$userdata['user_id']."' AND friend_to='".$user_data['user_id']."')");
	if(!dbrows($friendsaddresult) && $userdata['user_id'] != $user_data['user_id']){
		echo "<tr>\n";
		echo "<td class='tbl1'>".$user_data['user_name']."</td>\n";
		echo "<td align='right' class='tbl1'>";
		echo "<a href='".INFUSIONS."su_friends_panel/my_friends.php?do=0&amp;friendto=".$user_data['user_id']."' title='".$user_data['user_name']." ".$locale['uf_friends_001']."'>".$locale['uf_friends_001']."</a>\n";
		echo "</td>\n</tr>\n";
	}
	}

	else {
	if((iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	echo"<center><img src='".BASEDIR."images/warn.png'><br><br>".$locale['uf_friends_004']."</center>";
	echo "<tr>\n";
	}
	else {
	echo"<center><img src='".BASEDIR."images/stop.png'><br><br><strong>Dieses Profil ist privat!</strong></center>";
	echo "<tr>\n";
	}
	echo "<td class='tbl1'>".$locale['uf_friends_002']."</td>\n";
	}
// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	// There is nothing for input and update
	echo "";
}
?>