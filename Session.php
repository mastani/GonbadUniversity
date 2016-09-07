<?php
defined('ACCESS') or die(header('HTTP/1.1 403 Forbidden'));

session_start();

if (isset($_SESSION['username']))
    $_login = true;
else
    $_login = false;