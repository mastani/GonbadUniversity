<?php
require 'Config.php';

$result = $mysqli->query('SELECT * FROM users');

$i = 0;

while($row = mysqli_fetch_array($result)){
	$login = $ff->Open('http://'.$server.'.warian.ir/nachrichten.php', 'c=3e9&p=&an='.$row['name'].'&be='.$subject.''.$row['name'].'&message='.rand(1, 1000)."\n\n".$message."\n".rand(1, 1000).'&s1=%D8%A7%D8%B1%D8%B3%D8%A7%D9%84&ft=m2');
	if (strrpos($login, "اسپم") === false) {
		$mysqli->query("DELETE FROM users WHERE name='".$row['name']."'");
	}else{echo '<h1>Spam</h1>';  break 2; }
	sleep(rand(20, 25));
	$i++;
	
	if ($i == 5){echo '<h1>End</h1>'; break 2; }
}

?>