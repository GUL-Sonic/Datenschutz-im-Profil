<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: friend_function.php
| CVS Version: 1.0.0
| Author: Dennis Vorpahl
| Email: info@meinweb.net
| Support: http://webmaster.meinweb.net
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

function isfriend($friendfrom, $friendto){
	
	require_once INFUSIONS."su_friends_panel/infusion_db.php";
	$result=dbquery("SELECT friend_id FROM ".DB_SUFRIENDS." WHERE (friend_from='".$friendfrom."' AND friend_to='".$friendto."') OR (friend_from='".$friendto."' AND friend_to='".$friendfrom."') AND friend_status='1'");
	
	if(dbrows($result)){
		return true;
	}else{
		return false;
	}
}
?>