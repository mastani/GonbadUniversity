<?php
define('ACCESS', true);

require 'Database.php';
require 'Session.php';
require 'LoadColumns.php';

$page = 'Dashbord';

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = $_GET['page'];
}

require 'Header.php';
if (!$_login)
    require 'Login.php';
else {
    switch ($page) {
        case 'Dashbord':
            require 'Dashbord.php';
            break;
        case 'Search':
            require 'Search.php';
            break;
    }
}
require 'Footer.php';