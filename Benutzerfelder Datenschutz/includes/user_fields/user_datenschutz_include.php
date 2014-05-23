<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2011 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_datenschutz_include.php              			|
 | Author:   GUL-Sonic                              			|
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
	$user_datenschutz = isset($user_data['user_datenschutz']) ? $user_data['user_datenschutz'] : "";
	if ($this->isError()) { $user_datenschutz = isset($_POST['user_datenschutz']) ? stripinput($_POST['user_datenschutz']) : $user_datenschutz; }

	echo "<tr>\n";
	echo "<td valign='top' class='tbl".$this->getErrorClass("user_datenschutz")."'><label for='user_datenschutz'>".$locale['uf_datenschutz'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_datenschutz")."'>";
	echo "<select name='user_datenschutz' class='textbox' style='width:200px;'>";

	echo "<option value=''".($user_datenschutz == '' ? ' selected=selected' : '')."></option>";
	echo "<option value='1'".($user_datenschutz == '1' ? ' selected=selected' : '').">".$locale['uf_datenschutz_001']."</option>";
	echo "<option value='2'".($user_datenschutz == '2' ? ' selected=selected' : '').">".$locale['uf_datenschutz_002']."</option>";
	echo "<option value='3'".($user_datenschutz == '3' ? ' selected=selected' : '').">".$locale['uf_datenschutz_003']."</option>";
	echo "</select>";
	echo " ".$locale['uf_datenschutz_004']."</td> \n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_datenschutz", $locale['uf_datenschutz_error']); }

// Insert and update
}  elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_datenschutz']) && stripinput($_POST['user_datenschutz'] != "" || $this->_isNotRequired("user_datenschutz"))) {
		// Set update or insert user data
		$this->_setDBValue("user_datenschutz", stripinput($_POST['user_datenschutz']));
	} else {
		$this->_setError("user_datenschutz", $locale['uf_datenschutz_error'], true);
	}
}
?>