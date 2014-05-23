<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_geschlecht_include.php              			|
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
	$user_geschlecht = isset($user_data['user_geschlecht']) ? $user_data['user_geschlecht'] : "";
	if ($this->isError()) { $user_geschlecht = isset($_POST['user_geschlecht']) ? stripinput($_POST['user_geschlecht']) : $user_geschlecht; }

	echo "<tr>\n";
	echo "<td valign='top' class='tbl".$this->getErrorClass("user_geschlecht")."'><label for='user_geschlecht'>".$locale['uf_geschlecht'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_geschlecht")."'>";
	echo "<select name='user_geschlecht' class='textbox' style='width:200px;'>";

	echo "<option value=''".($user_geschlecht == '' ? ' selected=selected' : '')."></option>";
	echo "<option value='".$locale['uf_geschlecht_001']."'".($user_geschlecht == $locale['uf_geschlecht_001'] ? ' selected=selected' : '').">".$locale['uf_geschlecht_001']."</option>";
	echo "<option value='".$locale['uf_geschlecht_002']."'".($user_geschlecht == $locale['uf_geschlecht_002'] ? ' selected=selected' : '').">".$locale['uf_geschlecht_002']."</option>";

	echo "</select><br />";
	echo "</td>\n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_geschlecht", $locale['uf_geschlecht_error']); }

// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_geschlecht']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_geschlecht'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $geschlecht = $user_data['user_geschlecht'];
		$bl = array($locale['uf_geschlecht_001'], $locale['uf_geschlecht_002']);
		$blimg = array("ma", "fe");
		$bl_img = str_replace($bl, $blimg, $geschlecht); 
		echo "<img src='".IMAGES."geschlecht/".strtolower($bl_img).".png' title='".$user_data['user_geschlecht']."' alt='".$user_data['user_geschlecht']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
	}

	if ($user_data['user_datenschutz'] == 2) {	
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_geschlecht']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_geschlecht'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $geschlecht = $user_data['user_geschlecht'];
		$bl = array($locale['uf_geschlecht_001'], $locale['uf_geschlecht_002']);
		$blimg = array("ma", "fe");
		$bl_img = str_replace($bl, $blimg, $geschlecht); 
		echo "<img src='".IMAGES."geschlecht/".strtolower($bl_img).".png' title='".$user_data['user_geschlecht']."' alt='".$user_data['user_geschlecht']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 3) {
	if ($user_data['user_geschlecht']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_geschlecht'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $geschlecht = $user_data['user_geschlecht'];
		$bl = array($locale['uf_geschlecht_001'], $locale['uf_geschlecht_002']);
		$blimg = array("ma", "fe");
		$bl_img = str_replace($bl, $blimg, $geschlecht); 
		echo "<img src='".IMAGES."geschlecht/".strtolower($bl_img).".png' title='".$user_data['user_geschlecht']."' alt='".$user_data['user_geschlecht']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
	
// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_geschlecht']) && stripinput($_POST['user_geschlecht'] != "" || $this->_isNotRequired("user_geschlecht"))) {
		// Set update or insert user data
		$this->_setDBValue("user_geschlecht", stripinput($_POST['user_geschlecht']));
	} else {
		$this->_setError("user_geschlecht", $locale['uf_geschlecht_error'], true);
	}
}
?>