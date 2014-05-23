<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion.php
| CVS Version: 1.5.0
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

if (file_exists(INFUSIONS."su_friends_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."su_friends_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."su_friends_panel/locale/German.php";
}

include INFUSIONS."su_friends_panel/infusion_db.php";

$inf_title = $locale['SUF001'];
$inf_description = $locale['SUF002'];
$inf_version = "1.5.0";
$inf_developer = "Dennis Vorpahl";
$inf_email = "info@meinweb.net";
$inf_weburl = "http://webmaster.meinweb.net";

$inf_folder = "su_friends_panel";

// Delete any items not required here.
$inf_newtable[1] = DB_SUFRIENDS." (
  			friend_id smallint(8) UNSIGNED NOT NULL auto_increment,
  			friend_from smallint(8) UNSIGNED NOT NULL DEFAULT '0',
  			friend_to smallint(8) UNSIGNED NOT NULL DEFAULT '0',
  			friend_date INT(10) UNSIGNED NOT NULL DEFAULT '0',
			friend_status tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
			friend_name varchar(100) NOT NULL,
			PRIMARY KEY  (friend_id)
			) ENGINE=MyISAM;";

						
$inf_insertdbrow[1] = DB_PANELS." SET panel_name='".$inf_title."', panel_filename='".$inf_folder."', panel_side=1, panel_order='4', panel_type='file', panel_access='0', panel_display='0', panel_status='1' ";

$inf_deldbrow[1] = DB_PANELS." WHERE panel_filename='".$inf_folder."'";

$inf_droptable[1] = DB_SUFRIENDS;

$inf_sitelink[1] = array(
	"title" => $locale['SUF003'],
	"url" => "my_friends.php",
	"visibility" => "101"
);
?>