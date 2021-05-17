<?php
	$title = $_GET['title'];
	$character_name = $_GET['character_name'];
	$job_name = $_GET['job_name'];
	$skill_info = $_GET['skill_info'];

	$dbh = new PDO('mysql:host=localhost;dbname=skillsimulator', 'root', '111111');
	$user_index_query = $dbh->prepare("SELECT `index` FROM df_user WHERE user_id = 'test'");
	$user_index_query->execute();
	$user_index = $user_index_query->fetch()[index];

	$insert_user_character = $dbh->prepare('INSERT INTO df_user_character (title, character_name, job_name, df_user_index) VALUES ("'.$title.'" ,"'.$character_name.'", "'.$job_name.'", '.$user_index.')');
	$insert_user_character->execute();

	$character_index_query = $dbh->prepare("SELECT `index` FROM df_user_character WHERE title = '".$title."'");
	$character_index_query->execute();
	$character_index = $character_index_query->fetch()[index];

	foreach ($skill_info as $key => $value) {
		$temp = $skill_info[$key];
		$skill_name = substr($temp, 0, strrpos($temp, "|"));
		$skill_level = substr($temp, strrpos($temp, "|")+1);

		if ($skill_level == "Master") {
			$master_level = $dbh->prepare("SELECT max_level FROM df_skill WHERE skill_name = '".$skill_name."'");
			$master_level->execute();
			$skill_level = $master_level->fetch()[max_level];
		}

		$insert_user_skill = $dbh->prepare('INSERT INTO df_user_skill (skill_name, skill_level, df_user_character_index) VALUES ("'.$skill_name.'", "'.$skill_level.'", '.$character_index.')');
		$insert_user_skill->execute();
	}
	header("Location: read.php?index=".$character_index); 
?>
