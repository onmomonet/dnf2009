<?php
	$character_index = $_GET['index'];
	$dbh = new PDO('mysql:host=localhost;dbname=skillsimulator', 'root', '111111');
	$delete_skill = $dbh->prepare("DELETE FROM df_user_skill WHERE df_user_character_index = ".$character_index);
	$delete_skill->execute();
	$delete_character = $dbh->prepare("DELETE FROM df_user_character WHERE `index` = ".$character_index);
	$delete_character->execute();

	header("Location: list.php"); 
?>