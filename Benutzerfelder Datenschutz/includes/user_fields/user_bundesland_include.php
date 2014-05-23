<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Filename: user_bundesland_include.php              			|
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
	$user_bundesland = isset($user_data['user_bundesland']) ? $user_data['user_bundesland'] : "";
	if ($this->isError()) { $user_bundesland = isset($_POST['user_bundesland']) ? stripinput($_POST['user_bundesland']) : $user_bundesland; }

	echo "<tr>\n";
	echo "<td valign='top' class='tbl".$this->getErrorClass("user_bundesland")."'><label for='user_bundesland'>".$locale['uf_blkant'].$required."</label></td>\n";
	echo "<td class='tbl".$this->getErrorClass("user_bundesland")."'>";
	echo "<select name='user_bundesland' class='textbox' style='width:200px;'>";

	echo "<option value=''".($user_bundesland == '' ? ' selected=selected' : '')."></option>";	
	
	echo "<optgroup label='Nur f&uuml;r Deutschland'>Nur f&uuml;r Deutschland</optgroup>";
	echo "<option value='Baden-Württenberg'".($user_bundesland == 'Baden-Württenberg' ? ' selected=selected' : '').">Baden-Württenberg</option>"; 	
	echo "<option value='Bayern'".($user_bundesland == 'Bayern' ? ' selected=selected' : '').">Bayern</option>"; 	
	echo "<option value='Berlin'".($user_bundesland == 'Berlin' ? ' selected=selected' : '').">Berlin</option>"; 
	echo "<option value='Brandenburg'".($user_bundesland == 'Brandenburg' ? ' selected=selected' : '').">Brandenburg</option>"; 
	echo "<option value='Bremen'".($user_bundesland == 'Bremen' ? ' selected=selected' : '').">Bremen</option>"; 	
	echo "<option value='Hamburg'".($user_bundesland == 'Hamburg' ? ' selected=selected' : '').">Hamburg</option>"; 
	echo "<option value='Hessen'".($user_bundesland == 'Hessen' ? ' selected=selected' : '').">Hessen</option>"; 
	echo "<option value='Mecklenburg-Vorpommern'".($user_bundesland == 'Mecklenburg-Vorpommern' ? ' selected=selected' : '').">Mecklenburg-Vorpommern</option>"; 
	echo "<option value='Niedersachsen'".($user_bundesland == 'Niedersachsen' ? ' selected=selected' : '').">Niedersachsen</option>"; 
	echo "<option value='Nordrhein-Westfalen'".($user_bundesland == 'Nordrhein-Westfalen' ? ' selected=selected' : '').">Nordrhein-Westfalen</option>"; 
	echo "<option value='Rheinland-Pfalz'".($user_bundesland == 'Rheinland-Pfalz' ? ' selected=selected' : '').">Rheinland-Pfalz</option>"; 	
	echo "<option value='Saarland'".($user_bundesland == 'Saarland' ? ' selected=selected' : '').">Saarland</option>"; 
	echo "<option value='Sachsen'".($user_bundesland == 'Sachsen' ? ' selected=selected' : '').">Sachsen</option>"; 
	echo "<option value='Sachsen-Anhalt'".($user_bundesland == 'Sachsen-Anhalt' ? ' selected=selected' : '').">Sachsen-Anhalt</option>"; 
	echo "<option value='Schleswig-Holstein'".($user_bundesland == 'Schleswig-Holstein' ? ' selected=selected' : '').">Schleswig-Holstein</option>"; 
	echo "<option value='Thüringen'".($user_bundesland == 'Thüringen' ? ' selected=selected' : '').">Thüringen</option>"; 

	echo "</select><br />";
	echo "</td>\n</tr>\n";

	if ($required) { $this->setRequiredJavaScript("user_bundesland", $locale['uf_bundesland_error']); }

// Display in profile
} elseif ($profile_method == "display") {
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	require_once INFUSIONS."su_friends_panel/friend_function.php";
	
	if ($user_data['user_datenschutz'] == 1) {
	if (iADMIN or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_bundesland']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_blkant'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $bundesland = $user_data['user_bundesland'];
		$bl = array("Baden-Württenberg", "Bayern", "Berlin", "Brandenburg", "Bremen", "Hamburg", "Hessen", "Mecklenburg-Vorpommern", "Niedersachsen", "Nordrhein-Westfalen", "Rheinland-Pfalz", "Saarland", "Sachsen","Sachsen-Anhalt", "Schleswig-Holstein", "Thüringen");
		$blimg = array("bw", "bayern", "berlin", "brandenburg", "bremen", "hamburg", "hessen", "mv", "niedersachsen", "nrw", "pfalz", "saarland", "sachsen", "sachsen_anhalt", "schleswig", "thu");
		$bl_img = str_replace($bl, $blimg, $bundesland); 
		echo "<img src='".IMAGES."bundesland/".strtolower($bl_img).".png' title='".$user_data['user_bundesland']."' alt='".$user_data['user_bundesland']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 2) {
	if(isfriend($userdata['user_id'], $user_data['user_id']) or (iADMIN) or $userdata['user_id'] == $user_data['user_id']){
	if ($user_data['user_bundesland']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_blkant'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $bundesland = $user_data['user_bundesland'];
		$bl = array("Baden-Württenberg", "Bayern", "Berlin", "Brandenburg", "Bremen", "Hamburg", "Hessen", "Mecklenburg-Vorpommern", "Niedersachsen", "Nordrhein-Westfalen", "Rheinland-Pfalz", "Saarland", "Sachsen","Sachsen-Anhalt", "Schleswig-Holstein", "Thüringen");
		$blimg = array("bw", "bayern", "berlin", "brandenburg", "bremen", "hamburg", "hessen", "mv", "niedersachsen", "nrw", "pfalz", "saarland", "sachsen", "sachsen_anhalt", "schleswig", "thu");
		$bl_img = str_replace($bl, $blimg, $bundesland); 
		echo "<img src='".IMAGES."bundesland/".strtolower($bl_img).".png' title='".$user_data['user_bundesland']."' alt='".$user_data['user_bundesland']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
	}
	
	if ($user_data['user_datenschutz'] == 3) {
	if ($user_data['user_bundesland']) {
		echo "<tr>\n";
		echo "<td align='left' class='tbl1'>".($locale['uf_blkant'])."</td>\n";
		echo "<td align='right' class='tbl1'>";
	    $bundesland = $user_data['user_bundesland'];
		$bl = array("Baden-Württenberg", "Bayern", "Berlin", "Brandenburg", "Bremen", "Hamburg", "Hessen", "Mecklenburg-Vorpommern", "Niedersachsen", "Nordrhein-Westfalen", "Rheinland-Pfalz", "Saarland", "Sachsen","Sachsen-Anhalt", "Schleswig-Holstein", "Thüringen");
		$blimg = array("bw", "bayern", "berlin", "brandenburg", "bremen", "hamburg", "hessen", "mv", "niedersachsen", "nrw", "pfalz", "saarland", "sachsen", "sachsen_anhalt", "schleswig", "thu");
		$bl_img = str_replace($bl, $blimg, $bundesland); 
		echo "<img src='".IMAGES."bundesland/".strtolower($bl_img).".png' title='".$user_data['user_bundesland']."' alt='".$user_data['user_bundesland']."' />\n";
		echo "</td>\n</tr>\n";
	}
	}
			
// Insert and update
} elseif ($profile_method == "validate_insert"  || $profile_method == "validate_update") {
	// Get input data
	if (isset($_POST['user_bundesland']) && ($_POST['user_bundesland'] != "" || $this->_isNotRequired("user_bundesland"))) {
		// Set update or insert user data
		$this->_setDBValue("user_bundesland", stripinput($_POST['user_bundesland']));
	} else {
		$this->_setError("user_bundesland", $locale['uf_bundesland_error'], true);
	}
}
?>