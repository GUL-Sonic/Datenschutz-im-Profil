<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: my_friends.php
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
require_once "../../maincore.php";
require_once THEMES."templates/header.php";
require_once INCLUDES."bbcode_include.php";
require_once INFUSIONS."su_friends_panel/infusion_db.php";
include LOCALE.LOCALESET."messages.php";

if (file_exists(INFUSIONS."su_friends_panel/locale/".$settings['locale'].".php")) {
	require_once INFUSIONS."su_friends_panel/locale/".$settings['locale'].".php";
} else {
	require_once INFUSIONS."su_friends_panel/locale/German.php";
}

add_to_title($locale['SUF003']);

// 0=Einladung , 1=Akzeptiert, 2=abgelehnt
if(iMEMBER){
	if(isset($_GET['do']) && isnum($_GET['do'])){
		require_once INCLUDES."sendmail_include.php";
		
		if($_GET['do']==0 && isnum($_GET['friendto'])){
			$friendto=$_GET['friendto'];
			
			$pruefe=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE (friend_from='".$userdata['user_id']."' AND friend_to='".$friendto."') OR (friend_from='".$friendto."' AND friend_to='".$userdata['user_id']."')");
			if(!dbrows($pruefe)){
				$result=dbquery("INSERT INTO ".DB_SUFRIENDS." (friend_from, friend_to, friend_date, friend_name) VALUES ('".$userdata['user_id']."', '".$friendto."', '".time()."','".$userdata['user_vorname']." ".$userdata['user_nachname']."')");
				$id = mysql_insert_id();
				$data = dbarray(dbquery(
				"SELECT u.user_id, u.user_name, u.user_email, mo.pm_email_notify FROM ".DB_USERS." u
				LEFT JOIN ".DB_MESSAGES_OPTIONS." mo USING(user_id)
				WHERE u.user_id='".$friendto."'"));
				
				$subject=$locale['SUF004'];
				$message= "[url=".$settings['siteurl']."profile.php?lookup=".$userdata['user_id']."]".$userdata['user_name']."[/url] lädt dich ein, sein/e Freund/in zu werden.\n
					Du kannst die Freundschaft [url=".$settings['siteurl']."infusions/su_friends_panel/my_friends.php?do=1&id=".$id."]akzeptieren [/url] oder [url=".$settings['siteurl']."infusions/su_friends_panel/my_friends.php?do=2&id=".$id."]ablehnen [/url]";
					
				$message=stripinput($message);
				$result2 = dbquery("INSERT INTO ".DB_MESSAGES." (message_to, message_from, message_subject, message_message, message_smileys, message_read, message_datestamp, message_folder) VALUES('".$data['user_id']."','".$userdata['user_id']."','".$subject."','".$message."','n','0','".time()."','0')");
				$message_content = str_replace("[SUBJECT]", $subject, $locale['626']);
				$message_content = str_replace("[USER]", $userdata['user_name'], $message_content);
				$send_email = isset($data['pm_email_notify']) ? $data['pm_email_notify'] : 1;
				
				if ($send_email == "1") {
					sendemail($data['user_name'], $data['user_email'], $settings['siteusername'], $settings['siteemail'], $locale['625'], $data['user_name'].$message_content); 
				}
				opentable($locale['SUF006']);
				echo "<p>".$locale['SUF007'].".</p>\n";
				closetable();
			}else{
				opentable($locale['SUF006']);
				echo "<p>".$locale['SUF008'].".</p>\n";
				closetable();
			}
		}// next is 1
		if($_GET['do']==1 && isnum($_GET['id'])){
			$result=dbquery("UPDATE ".DB_SUFRIENDS." SET friend_status='1' WHERE friend_id='".$_GET['id']."'");
			$data1=dbarray(dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE friend_id='".$_GET['id']."'"));
			$data = dbarray(dbquery(
				"SELECT u.user_id, u.user_name, u.user_email, mo.pm_email_notify FROM ".DB_USERS." u
				LEFT JOIN ".DB_MESSAGES_OPTIONS." mo USING(user_id)
				WHERE u.user_id='".$data1['friend_from']."'"));
				
			$subject=$locale['SUF009'];
			$message= $locale['SUF030'].$userdata['user_name'].$locale['SUF010'];
			
			$result2 = dbquery("INSERT INTO ".DB_MESSAGES." (message_to, message_from, message_subject, message_message, message_smileys, message_read, message_datestamp, message_folder) VALUES('".$data['user_id']."','".$userdata['user_id']."','".$subject."','".$message."','n','0','".time()."','0')");
			$message_content = str_replace("[SUBJECT]", $subject, $locale['626']);
			$message_content = str_replace("[USER]", $userdata['user_name'], $message_content);
			$send_email = isset($data['pm_email_notify']) ? $data['pm_email_notify'] : 1;
			if ($send_email == "1") {
				sendemail($data['user_name'], $data['user_email'], $settings['siteusername'], $settings['siteemail'], $locale['625'], $data['user_name'].$message_content); 
			}
			opentable($locale['SUF006']);
			echo "<p>".$locale['SUF011']."</p>\n";
			closetable();
		}// next is 2
		if($_GET['do']==2 && isnum($_GET['id'])){
			$result=dbquery("UPDATE ".DB_SUFRIENDS." SET friend_status='2' WHERE friend_id='".$_GET['id']."'");
			$data1=dbarray(dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE friend_id='".$_GET['id']."'"));
			$data = dbarray(dbquery(
				"SELECT u.user_id, u.user_name, u.user_email, mo.pm_email_notify FROM ".DB_USERS." u
				LEFT JOIN ".DB_MESSAGES_OPTIONS." mo USING(user_id)
				WHERE u.user_id='".$data1['friend_from']."'"));
				
			$subject=$locale['SUF012'];
			$message= $locale['SUF030'].$userdata['user_name'].$locale['SUF013'];
			
			$result2 = dbquery("INSERT INTO ".DB_MESSAGES." (message_to, message_from, message_subject, message_message, message_smileys, message_read, message_datestamp, message_folder) VALUES('".$data['user_id']."','".$userdata['user_id']."','".$subject."','".$message."','n','0','".time()."','0')");
			$message_content = str_replace("[SUBJECT]", $subject, $locale['626']);
			$message_content = str_replace("[USER]", $userdata['user_name'], $message_content);
			$send_email = isset($data['pm_email_notify']) ? $data['pm_email_notify'] : 1;
			if ($send_email == "1") {
				sendemail($data['user_name'], $data['user_email'], $settings['siteusername'], $settings['siteemail'], $locale['625'], $data['user_name'].$message_content); 
			}
			opentable($locale['SUF006']);
			echo "<p>".$locale['SUF014'].".</p>\n";
			closetable();
		}
		if($_GET['do']==3 && isnum($_GET['id'])){
			$result = dbquery("DELETE FROM ".DB_SUFRIENDS." WHERE friend_id='".$_GET['id']."'");
			opentable($locale['SUF006']);
			echo "<p>".$locale['SUF028'].".</p>\n";
			closetable();
		}
	}//next is overview
	if (!isset($_GET['rowstart']) || !isnum($_GET['rowstart'])) { $_GET['rowstart'] = 0; }
	
	opentable($locale['SUF003']);
	echo "<table cellpadding='0' cellspacing='0' border='0'>\n";
	echo "<tr>
		<td class='tbl'>".$locale['SUF015']."</td>
		<td class='tbl'>".$locale['SUF016']."</td>
		<td class='tbl'>".$locale['SUF017']."</td>
		<td class='tbl'>".$locale['SUF017']."</td>
		</tr>\n";
	$rows = dbcount("(friend_id)", DB_SUFRIENDS,"friend_from='".$userdata['user_id']."' OR friend_to='".$userdata['user_id']."'");
	$result=dbquery("SELECT * FROM ".DB_SUFRIENDS." WHERE friend_from='".$userdata['user_id']."' OR friend_to='".$userdata['user_id']."' LIMIT ".$_GET['rowstart'].",50");
	if(dbrows($result)){
		while($data=dbarray($result)){
			if($data['friend_from']==$userdata['user_id']) $where="user_id='".$data['friend_to']."'";
			else $where="user_id='".$data['friend_from']."'";
		
			$data2=dbarray(dbquery("SELECT user_id, user_name, user_status FROM ".DB_USERS." WHERE ".$where));
			echo "<tr>\n";
			echo "<td width='25%'>".profile_link($data2['user_id'], $data2['user_name'], $data2['user_status'])."</td>\n";
			if($data['friend_status']==0){
				echo "<td width='25%'><span style='color:blue;'>".$locale['SUF018']."</span></td>\n";
			}elseif($data['friend_status']==1){
				echo "<td width='25%'><span style='color:green;'>".$locale['SUF019']."</span></td>\n";
			}elseif($data['friend_status']==2){
				echo "<td width='25%'><span style='color:red;'>".$locale['SUF020']."</span></td>\n";
			}
			echo "<td  width='25%'>".showdate("longdate", $data['friend_date'])."</td>\n";
			echo "<td  width='25%'><a href='".INFUSIONS."su_friends_panel/my_friends.php?do=3&amp;id=".$data['friend_id']."'>".$locale['SUF027']."</a></td>\n";
			echo "</tr>\n";
		}
		if($rows>50) echo "<p>".makepagenav($_GET['rowstart'], 50, $rows, 3, FUSION_SELF."?")."</p>\n";
	}else{
		echo "<tr><td><p>".$locale['SUF021'].".</p></td></tr>\n";
	}
	echo "</table>";
	closetable();
}else{
	opentable($locale['SUF003'].", ".$locale['SUF022']);
	echo "<p>".$locale['SUF023']."</p>";
	closetable();
}
echo "<div class='small'>Meine Freundepanel &copy; <a href='http://webmaster.meinweb.net'>MeinWeb</a></div>\n";
require_once THEMES."templates/footer.php";
  
?>