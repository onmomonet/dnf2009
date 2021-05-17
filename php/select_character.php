<?php
    $dbh = new PDO('mysql:host=localhost;dbname=skillsimulator', 'root', '111111');
    $stmt = $dbh->prepare('SELECT * FROM df_character');
    $stmt->execute();
    $list = $stmt->fetchAll();
    foreach($list as $row) {
        echo '<button type="button" class="btn btn-default" id ="'.$row['character_name'].'">'. $row['character_name_ko'].'</button>';
	}

?>