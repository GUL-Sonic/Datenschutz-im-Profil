<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_sternzeichen_include.php              		|
 | Author:   GUL-Sonic (Ingo Wehrstedt)                        	|
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
	$user_sternzeichen = isset($user_data['user_sternzeichen']) ? $user_data['user_sternzeichen'] : "";
	if ($this->isError()) { $user_sternzeichen = isset($_POST['user_sternzeichen']) ? stripinput($_POST['user_sternzeichen']) : $user_sternzeichen; }

	echo "<tr>\n";
	echo "<td valign='top' class='tbl' ".$this->getErrorClass("user_sternzeichen")."'><label for='user_sternzeichen'>".$locale['uf_sternzeichen'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_sternzeichen")."'>";
	echo "<select name='user_sternzeichen' class='textbox' style='width:200px;'>";

	echo "<option value=''".($user_sternzeichen == '' ? ' selected=selected' : '')."></option>";
	
	echo "<option value='".$locale['uf_sternzeichen_001']."'".($user_sternzeichen == $locale['uf_sternzeichen_001'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_001']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_002']."'".($user_sternzeichen == $locale['uf_sternzeichen_002'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_002']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_003']."'".($user_sternzeichen == $locale['uf_sternzeichen_003'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_003']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_004']."'".($user_sternzeichen == $locale['uf_sternzeichen_004'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_004']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_005']."'".($user_sternzeichen == $locale['uf_sternzeichen_005'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_005']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_006']."'".($user_sternzeichen == $locale['uf_sternzeichen_006'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_006']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_007']."'".($user_sternzeichen == $locale['uf_sternzeichen_007'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_007']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_008']."'".($user_sternzeichen == $locale['uf_sternzeichen_008'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_008']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_009']."'".($user_sternzeichen == $locale['uf_sternzeichen_009'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_009']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_010']."'".($user_sternzeichen == $locale['uf_sternzeichen_010'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_010']."</option>";	
	echo "<option value='".$locale['uf_sternzeichen_011']."'".($user_sternzeichen == $locale['uf_sternzeichen_011'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_011']."</option>";
	echo "<option value='".$locale['uf_sternzeichen_012']."'".($user_sternzeichen == $locale['uf_sternzeichen_012'] ? ' selected=selected' : '').">".$locale['uf_sternzeichen_012']."</option>";
	
	echo "</select><br />";
	echo "</td>\n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_sternzeichen", $locale['uf_sternzeichen_error']); }

// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_sternzeichen']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_sternzeichen'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $sternzeichen = $user_data['user_sternzeichen'];
		$bl = array($locale['uf_sternzeichen_001'],
	$locale['uf_sternzeichen_002'],
	$locale['uf_sternzeichen_003'],
	$locale['uf_sternzeichen_004'],
	$locale['uf_sternzeichen_005'],
	$locale['uf_sternzeichen_006'],
	$locale['uf_sternzeichen_007'],
	$locale['uf_sternzeichen_008'],
	$locale['uf_sternzeichen_009'],
	$locale['uf_sternzeichen_010'],
	$locale['uf_sternzeichen_011'],
	$locale['uf_sternzeichen_012']);
		$blimg = array("wassermann", "fische","widder", "stier", "zwillinge", "krebs", "loewe", "jungfrau", "waage", "skorpion", "schuetze", "steinbock");
		$bl_img = str_replace($bl, $blimg, $sternzeichen); 
		echo "<img src='".IMAGES."sternzeichen/".strtolower($bl_img).".png' title='".$user_data['user_sternzeichen']."' alt='".$user_data['user_sternzeichen']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
	}

	if ($user_data['user_datenschutz'] == 2) {
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_sternzeichen']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_sternzeichen'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $sternzeichen = $user_data['user_sternzeichen'];
		$bl = array($locale['uf_sternzeichen_001'],
	$locale['uf_sternzeichen_002'],
	$locale['uf_sternzeichen_003'],
	$locale['uf_sternzeichen_004'],
	$locale['uf_sternzeichen_005'],
	$locale['uf_sternzeichen_006'],
	$locale['uf_sternzeichen_007'],
	$locale['uf_sternzeichen_008'],
	$locale['uf_sternzeichen_009'],
	$locale['uf_sternzeichen_010'],
	$locale['uf_sternzeichen_011'],
	$locale['uf_sternzeichen_012']);
		$blimg = array("wassermann", "fische","widder", "stier", "zwillinge", "krebs", "loewe", "jungfrau", "waage", "skorpion", "schuetze", "steinbock");
		$bl_img = str_replace($bl, $blimg, $sternzeichen); 
		echo "<img src='".IMAGES."sternzeichen/".strtolower($bl_img).".png' title='".$user_data['user_sternzeichen']."' alt='".$user_data['user_sternzeichen']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 3) {
	if ($user_data['user_sternzeichen']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_sternzeichen'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $sternzeichen = $user_data['user_sternzeichen'];
		$bl = array($locale['uf_sternzeichen_001'],
	$locale['uf_sternzeichen_002'],
	$locale['uf_sternzeichen_003'],
	$locale['uf_sternzeichen_004'],
	$locale['uf_sternzeichen_005'],
	$locale['uf_sternzeichen_006'],
	$locale['uf_sternzeichen_007'],
	$locale['uf_sternzeichen_008'],
	$locale['uf_sternzeichen_009'],
	$locale['uf_sternzeichen_010'],
	$locale['uf_sternzeichen_011'],
	$locale['uf_sternzeichen_012']);
		$blimg = array("wassermann", "fische","widder", "stier", "zwillinge", "krebs", "loewe", "jungfrau", "waage", "skorpion", "schuetze", "steinbock");
		$bl_img = str_replace($bl, $blimg, $sternzeichen); 
		echo "<img src='".IMAGES."sternzeichen/".strtolower($bl_img).".png' title='".$user_data['user_sternzeichen']."' alt='".$user_data['user_sternzeichen']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}

// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_sternzeichen']) && stripinput($_POST['user_sternzeichen'] != "" || $this->_isNotRequired("user_sternzeichen"))) {
		// Set update or insert user data
		$this->_setDBValue("user_sternzeichen", stripinput($_POST['user_sternzeichen']));
	} else {
		$this->_setError("user_sternzeichen", $locale['uf_sternzeichen_error'], true);
	}
}
?>