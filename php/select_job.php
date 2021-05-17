<?php
	$character_name = $_GET['character_name'];
	$dbh = new PDO('mysql:host=localhost;dbname=skillsimulator', 'root', '111111');
	$stmt = $dbh->prepare("SELECT * FROM df_job WHERE `df_character_index` = (select `index` from df_character where character_name = '".$character_name."')");
	$stmt->execute();
 	$list = $stmt->fetchAll();
    	foreach($list as $row) {
        		echo '<button type="button" class="btn btn-default" id ="'.$row['job_name'].'">'. $row['job_name_ko'].'</button>';
    	}
?>