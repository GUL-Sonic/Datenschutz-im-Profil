<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright � 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_vorname_include.php              				|
 | Author:   GUL-Sonic (Ingo Wehrstedt)                         |
 | Web: 	 http://www.germanys-united-legends.de 				|
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
	$user_vorname = isset($user_data['user_vorname']) ? stripinput($user_data['user_vorname']) : "";
	if ($this->isError()) { $user_vorname = isset($_POST['user_vorname']) ? stripinput($_POST['user_vorname']) : $user_vorname; }

	echo "<tr>\n";
	echo "<td class='tbl".$this->getErrorClass("user_vorname")."'><label for='user_vorname'>".$locale['uf_vorname'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_vorname")."'>";
	echo "<input type='text' id='user_vorname' name='user_vorname' value='".$user_vorname."' maxlength='50' class='textbox' style='width:200px;' />";
	echo "</td>\n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_vorname", $locale['uf_vorname_error']); }
	
// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_vorname']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_vorname']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_vorname']."</td>\n";
		echo "</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 2) {
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_vorname']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_vorname']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_vorname']."</td>\n";
		echo "</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 3) {
	if ($user_data['user_vorname']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_vorname']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_vorname']."</td>\n";
		echo "</tr>\n";
	}
	}

// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_vorname']) && ($_POST['user_vorname'] != "" || $this->_isNotRequired("user_vorname"))) {
		// Set update or insert user data
		$this->_setDBValue("user_vorname", stripinput(trim($_POST['user_vorname'])));
	} else {
		$this->_setError("user_vorname", $locale['uf_vorname_error'], true);	
	}
}
?>