<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: user_yahoo_include.php
| Author: Digitanium
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
	$user_yahoo = isset($user_data['user_yahoo']) ? $user_data['user_yahoo'] : "";
	if ($this->isError()) { $user_yahoo = isset($_POST['user_yahoo']) ? stripinput($_POST['user_yahoo']) : $user_yahoo; }

	echo "<tr>\n";
	echo "<td class='tbl".$this->getErrorClass("user_yahoo")."'><label for='user_yahoo'>".$locale['uf_yahoo'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_yahoo")."'>";
	echo "<input type='text' id='user_yahoo' name='user_yahoo' value='".$user_yahoo."' maxlength='100' class='textbox' style='width:200px;' />";
	echo "</td>\n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_yahoo", $locale['uf_yahoo_error']); }

// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_yahoo']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_yahoo']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_yahoo']."</td>\n";
		echo "</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 2) {
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_yahoo']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_yahoo']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_yahoo']."</td>\n";
		echo "</tr>\n";
	}
	}
	}

	if ($user_data['user_datenschutz'] == 3) {
	if ($user_data['user_yahoo']) {
		echo "<tr>\n";
		echo "<td class='tbl1'>".$locale['uf_yahoo']."</td>\n";
		echo "<td align='right' class='tbl1'>".$user_data['user_yahoo']."</td>\n";
		echo "</tr>\n";
	}
	}	

// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_yahoo']) && ($_POST['user_yahoo'] != "" || $this->_isNotRequired("user_yahoo"))) {
		// Set update or insert user data
		$this->_setDBValue("user_yahoo", stripinput($_POST['user_yahoo']));
	} else {
		$this->_setError("user_yahoo", $locale['uf_yahoo_error'], true);
	}
}
?>
