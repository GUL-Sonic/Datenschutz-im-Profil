<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2011 Nick Jones                 			|
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
$user_name = isset($user_data['user_name']) ? $user_data['user_name'] : "";
 
$locale['uf_googleplus']       = "Google+";
$locale['uf_googleplus_desc']  = "Zeigt den Google+ Channel eines Benutzers an";
$locale['uf_googleplus_error'] = "Du musst deinen Google+ Channel angeben";
$locale['uf_googleplus_001']   = $user_name ."`s Google+ Channel besuchen";
$locale['uf_googleplus_inf'] = "Du musst Deinen Google+ Channel Namen eingeben";
?>
