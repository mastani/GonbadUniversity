﻿<?php
ignore_user_abort(true);
set_time_limit(0);

include_once('browser.class.php');
$users = array();
$pages = 10;

$server = 'x100';
$username = 'WMA';
$password = '137300';
$subject = '';
$message = ' سلام
 نرم افزار وارين منيجر براي بالا بردن خودکار سطح منابع و ساختمان ها به صورت فوري و پشت سر هم ...
 به علاوه امکانات جديدتر شامل جستجو فارم خودکار+ ساخت ليست فارم خودکار + ليست فارم + بهبود خودکار در آهنگري
برنامه به زودي تکميل ميشود .... توضيحات بيشتر در سايت برنامه 

 سايت برنامه : www.warian-manager.ir

 موفق باشيد


';


$mysql = mysql_connect('localhost','clashira_message','F49(oOrq%+_W');

mysql_select_db('clashira_manager_message', $mysql);

$ff = new Browser();
//$ff->Debug(true);
$login = $ff->Open('http://'.$server.'.warian.ir/login.php', 'ft=a4&user='.$username.'&pw='.$password.'&s1=ورود&w=&login=1370529013');

?>