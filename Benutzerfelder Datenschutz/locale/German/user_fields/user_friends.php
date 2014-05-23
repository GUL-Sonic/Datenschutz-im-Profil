<?php
$user_name = isset($user_data['user_name']) ? $user_data['user_name'] : "";
// Userfeld: friends (Freunde)
$locale['uf_friends']       = "Freunde hinzuf&uuml;gen";
$locale['uf_friends_desc']  = "Erm&ouml;glicht es Benutzern Freundschaften zu schlie&szlig;en";
$locale['uf_friends_001'] = "zu meinen Freunden hinzuf&uuml;gen.";
$locale['uf_friends_002'] = "<center>Die Datenschutzeinstellung von <font color=blue>".$user_name."</font> erlaubt es nicht das eine Freundschaft geschlossen werden kann</center>";
$locale['uf_friends_003'] = "<strong>Dieses Profil ist privat!<br>Du mu&szlig;t mit <font color=blue>".$user_name."</font> befreundet sein,<br>um weitere Informationen einsehen zu k&ouml;nnen!</strong>";
$locale['uf_friends_004'] = "<strong>Die Datenschutzeinstellung für Ihr Profil wurde noch nicht gesetzt,<br>bitte klicken sie auf <br><a href='".BASEDIR."edit_profile.php'>Profil bearbeiten</a><br> und stellen sie unter \"Datenschutz\" ein, wer Ihr Profil sehen darf.<br></strong>";
?>