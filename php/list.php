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
<table class="table table-striped">
	<thead>
		<tr>
			<th width="10%">글번호</th>
			<th width="70%">제목</th>
			<th width="20%">작성자</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$dbh = new PDO('mysql:host=localhost;dbname=skillsimulator', 'root', '111111');
			$stmt = $dbh->prepare("SELECT * FROM df_user_character");
			$stmt->execute();
			$list = $stmt->fetchAll();

			foreach ($list as $row) {
				echo "<tr>";
				echo "<td>";
				echo $row['index'];
				echo "</td>";
				echo "<td>";
				echo '<a href="../php/read.php?index='.$row['index'].'" target="contents">';
				echo $row['title'];
				echo "</a>";
				echo "</td>";
				$user_index_query = $dbh->prepare("SELECT user_id FROM df_user WHERE `index` = ".$row['df_user_index']);
				$user_index_query->execute();
				$user_index = $user_index_query->fetch()['user_id'];
				echo "<td>";
				echo $user_index;
				echo "</td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
