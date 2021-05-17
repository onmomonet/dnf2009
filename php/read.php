<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/skillsimulator.css" rel="stylesheet">
    <title>D&F Skill Simulator</title>
</head>
<body>
	<div>
		<h2>Read Page</h2>
	</div>
	<div>
		<?php
			include 'draw_skill.php';

			$xml = simplexml_load_file("../xml/skill_info.xml");

			$character_index = $_GET['index'];
			$dbh = new PDO('mysql:host=localhost;dbname=skillsimulator', 'root', '111111');
			$stmt = $dbh->prepare("SELECT * FROM df_user_character WHERE `index` = ".$character_index);
		    $stmt->execute();
		    $list = $stmt->fetchAll();

		    $user_skill = $dbh->prepare("SELECT * FROM df_user_skill WHERE df_user_character_index = ".$character_index);
		    $user_skill->execute();
		    $skill_list = $user_skill->fetchAll();
		    echo '<div id="delete_page">';
		    echo '<a href="../php/list.php" target="contents"><button class="btn btn-danger" value="'.$character_index.'" style="margin-bottom:10px">삭제</button></a>';
		    echo '</div>';
			foreach ($list as $row) {
				echo '<div class="panel panel-primary"><div class="panel-body">제목</div><div class="panel-footer">';
				echo $row['title'];
				echo '</div></div>';
				echo '<div class="panel panel-primary"><div class="panel-body">캐릭터</div><div class="panel-footer">';
				echo $row['character_name'];
				echo '</div></div>';
				echo '<div class="panel panel-primary"><div class="panel-body">직업</div><div class="panel-footer">';
				echo $row['job_name'];
				echo '</div></div>';
			}
		?>

		<table id="user_skill_table">
		<?php
			$skill_info = draw_skill_table($skill_list);
			for ($i=0; $i < sizeof($skill_info); $i++) { 
				echo '<tr value="'.$i.'">';
				for ($j=0; $j < sizeof($skill_info[$i]); $j++) { 
					$skill_data = $skill_info[$i][$j];
					$skill_explode = explode('|', $skill_data);
					$db_name = $skill_explode[0];
					$img_loc = $skill_explode[1];
					$current_level = $skill_explode[2];

					if ($img_loc == "0") {
						echo '<td width="52" height="53"></td>';
					} else {
						echo '<td width="52" height="53" value="'.$j.'"><button class="skill_button" id="'.$db_name.'" disabled><div class="img_div" style="background-image: url('.$img_loc.');" ><div class="prev_skill_level" id="'.$db_name.'_level">'.$current_level.'</div></div></button></td>';
						// echo '<td width="52" heigh="53" value="'.$j.'"><a href="#" class="skill_info" onclick="layer_open('.$layer.');return false;"><img src="'.$img_loc.'" title="'.$skill_name.'"  /></a></td>';
					}
				}
				echo '</tr>';
			}								
		?>
		</table>
	</div>

	<script type="../js/jquery_2.1.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/skillsimulator.js"></script>
</body>
</html>
