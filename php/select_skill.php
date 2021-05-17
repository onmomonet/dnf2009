<?php
	
	include 'draw_skill.php';

	function draw_skill_interface($skill_info) {
		for ($i=0; $i < sizeof($skill_info); $i++) { 
			echo '<tr value="'.$i.'">';
			for ($j=0; $j < sizeof($skill_info[$i]); $j++) { 
				$skill_name_img = $skill_info[$i][$j];
				$db_name = substr($skill_name_img, 0, strrpos($skill_name_img,"|"));
				$img_loc = substr($skill_name_img, strrpos($skill_name_img,"|")+1);

				if ($img_loc == "0") {
					echo '<td width="52" height="53"></td>';
				} else {
					echo '<td width="52" height="53" value="'.$j.'"><button class="skill_button" id="'.$db_name.'"><div class="img_div" style="background-image: url('.$img_loc.');" ><div class="prev_skill_level" id="'.$db_name.'_level">0</div></div></button></td>';
					// echo '<td width="52" heigh="53" value="'.$j.'"><a href="#" class="skill_info" onclick="layer_open('.$layer.');return false;"><img src="'.$img_loc.'" title="'.$skill_name.'"  /></a></td>';
				}
			}
			echo '</tr>';
		}

	}
	
	$job_name = $_GET['job_name'];
	$dbh = new PDO('mysql:host=localhost;dbname=skillsimulator', 'root', '111111');
	$stmt = $dbh->prepare("SELECT b.* FROM df_skill_info AS a LEFT OUTER JOIN df_skill AS b ON a.`skill_index` = b.`index` 
				   WHERE a.job_index = 99 or a.job_index = ".'('."SELECT `index` FROM df_job WHERE job_name = '".$job_name."')");
	$stmt->execute();
 	$list = $stmt->fetchAll();
    $skill_info = draw_skill_table($list);
	draw_skill_interface($skill_info);

?>