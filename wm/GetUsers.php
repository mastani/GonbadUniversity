﻿<?php
require 'Config.php';

for ($i = 1; $i <= $pages; $i++) {
	$login = $ff->open('http://'.$server.'.warian.ir/statistiken.php?page=' . $i);
	preg_match_all('/\<a href\=\"spieler.php\?uid\=\d+\"\>(.*?)\<\/a\>\<\/td\>/i', $login, $arr, PREG_PATTERN_ORDER);

	foreach ($arr[1] as $value) {
		$users[] = $value;
	}
}

foreach ($users as $value) {
	mysql_query("INSERT INTO users (name) VALUES ('$value')" , $mysql);
}

?>