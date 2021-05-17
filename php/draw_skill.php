<?php
	function draw_skill_table($list) {
		$xml = simplexml_load_file("../xml/skill_info.xml");
		$skill_info = get_skill_location();
		foreach($list as $row) {
	       		// echo '<button type="button" class="btn btn-default" id ="'.$row['skill_name'].'">'. $row['skill_name'].'</button>';
			for	($i = 0; $i < sizeof($xml); $i++) {	
				$x_index = (int)$xml->item[$i]->x;
				$y_index = (int)$xml->item[$i]->y;
				$db_name = $xml->item[$i]->dbname;
				$img_loc = $xml->item[$i]->img_location;

				if ($row['skill_name'] == $db_name) {
					// echo $db_name.' '.$x_index.' '.$y_index.'<br />';
					$skill_info[$x_index][$y_index] = $db_name.'|'.$img_loc;
					if ($row['skill_level'] != null) {
						$max_level = $xml->item[$i]->max_level;
						if ($row['skill_level'] == $max_level) {
							$row['skill_level']	= "Master";
						}
						$skill_info[$x_index][$y_index] = $skill_info[$x_index][$y_index].'|'.$row['skill_level'];
					}
				}
			}
		}
		return $skill_info;
	}

	function get_skill_location() {
		$skill_interface_row = 15;
 		$skill_interface_column = 11;

		for ($i=0; $i < $skill_interface_row; $i++) { 
			for ($j=0; $j < $skill_interface_column; $j++) { 
				$skill_info[$i][$j] = "0";
			}
		}

		return $skill_info;
	}

?>