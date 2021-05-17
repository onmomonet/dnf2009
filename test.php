<?php
	$money = "10,123,456,000";
	$pattern = ",";

	$arrMoney = split($pattern,$money);
	for($i=0;$i< sizeof($arrMoney);$i++){
	  echo $arrMoney[$i]."<br>\n";
	}
?>