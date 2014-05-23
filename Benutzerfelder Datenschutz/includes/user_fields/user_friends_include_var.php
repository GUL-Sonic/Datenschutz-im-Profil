<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: user_friends_include_var.php
| Author: Hajabamba (Starunited, Dennis Vorpahl)
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

// Version of the user fields api
$user_field_api_version = "1.01.00";
// We don't need Log and required for Registration
$user_field_name = $locale['uf_friends'];
$user_field_desc = $locale['uf_friends_desc'];
$user_field_dbname = "user_friends"; // We don't need Database Tables for this
$user_field_group = 1;
$user_field_dbinfo = "";
?>