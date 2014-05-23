<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_telefon_include.php      		        		|
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
	$user_telefon = isset($user_data['user_telefon']) ? stripinput($user_data['user_telefon']) : "";
	if ($this->isError()) { $user_telefon = isset($_POST['user_telefon']) ? stripinput($_POST['user_telefon']) : $user_telefon; }

	echo "<tr>\n";
	echo "<td class='tbl".$this->getErrorClass("user_telefon")."'><label for='user_telefon'>".$locale['uf_telefon'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_telefon")."'>";
	echo "<input type='text' id='user_telefon' name='user_telefon' value='".$user_telefon."' maxlength='50' class='textbox' style='width:200px;' />";
	echo "</td>\n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_telefon", $locale['uf_telefon_error']); }
	
// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_telefon']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_telefon']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_telefon']."</td>\n";
		echo "</tr>\n";
	}
	}
	}

	if ($user_data['user_datenschutz'] == 2) {
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_telefon']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_telefon']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_telefon']."</td>\n";
		echo "</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 3) {
	if ($user_data['user_telefon']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_telefon']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_telefon']."</td>\n";
		echo "</tr>\n";
	}
	}

// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_telefon']) && ($_POST['user_telefon'] != "" || $this->_isNotRequired("user_telefon"))) {
		// Set update or insert user data
		$this->_setDBValue("user_telefon", stripinput(trim($_POST['user_telefon'])));
	} else {
		$this->_setError("user_telefon", $locale['uf_telefon_error'], true);	
	}
}
?>