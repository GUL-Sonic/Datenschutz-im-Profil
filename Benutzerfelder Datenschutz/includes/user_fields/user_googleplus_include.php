<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_googleplus_include.php              			|
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
	$user_googleplus = isset($user_data['user_googleplus']) ? $user_data['user_googleplus'] : "";
	if ($this->isError()) { $user_googleplus = isset($_POST['user_googleplus']) ? stripinput($_POST['user_googleplus']) : $user_googleplus; }

	echo "<tr>\n";
	echo "<td class='tbl".$this->getErrorClass("user_googleplus")."'><label for='user_googleplus'>".$locale['uf_googleplus'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_googleplus")."'>";
	echo "<input type='text' id='user_googleplus' name='user_googleplus' title='".$locale['uf_googleplus_inf']."' value='".$user_googleplus."' maxlength='50' class='textbox' style='width:200px;' />";
	echo "</td>\n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_googleplus", $locale['uf_googleplus_error']); }

// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_googleplus']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_googleplus']."</td>\n";
		echo "<td align='right' class='tbl1'>";
		if (!strstr($user_data['user_googleplus'], "http://plus.google.com/") && !strstr($user_data['user_googleplus'], "https://plus.google.com/")) {
			$urlprefix = "http://plus.google.com/";
		} else {
			$urlprefix = "";
		}
		echo "<a href='".$urlprefix.$user_data['user_googleplus']."' title='".$locale['uf_googleplus_001']."' target='_blank'><img src='images/googleplus/googleplus.png' /></a>\n";
		echo "</td>\n</tr>\n";
	}
	}
	}

	if ($user_data['user_datenschutz'] == 2) {	
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_googleplus']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_googleplus']."</td>\n";
		echo "<td align='right' class='tbl1'>";
		if (!strstr($user_data['user_googleplus'], "http://plus.google.com/") && !strstr($user_data['user_googleplus'], "https://plus.google.com/")) {
			$urlprefix = "http://plus.google.com/";
		} else {
			$urlprefix = "";
		}
		echo "<a href='".$urlprefix.$user_data['user_googleplus']."' title='".$locale['uf_googleplus_001']."' target='_blank'><img src='images/googleplus/googleplus.png' /></a>\n";
		echo "</td>\n</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 3) {
	if ($user_data['user_googleplus']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_googleplus']."</td>\n";
		echo "<td align='right' class='tbl1'>";
		if (!strstr($user_data['user_googleplus'], "http://plus.google.com/") && !strstr($user_data['user_googleplus'], "https://plus.google.com/")) {
			$urlprefix = "http://plus.google.com/";
		} else {
			$urlprefix = "";
		}
		echo "<a href='".$urlprefix.$user_data['user_googleplus']."' title='".$locale['uf_googleplus_001']."' target='_blank'><img src='images/googleplus/googleplus.png' /></a>\n";
		echo "</td>\n</tr>\n";
	}
	}

// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_googleplus']) && ($_POST['user_googleplus'] != "" || $this->_isNotRequired("user_googleplus"))) {
		// Set update or insert user data
		$this->_setDBValue("user_googleplus", stripinput($_POST['user_googleplus']));
	} else {
		$this->_setError("user_googleplus", $locale['uf_googleplus_error'], true);
	}
}
?>