﻿<?php
require 'Config.php';

if (isset($_GET['del'])){
	mysql_query("DELETE FROM `users` WHERE name='".$_GET['del']."'");
}else{
	$result = mysql_query('SELECT * FROM `users` LIMIT 1');

	while($row = mysql_fetch_array($result)){
		echo '#WM#'.$row['name'].'#WM#';
	}
}

?>