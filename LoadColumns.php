<?php
require_once 'Database.php';

$Columns = array();

$result = $conn->query('SHOW COLUMNS FROM users');

$i = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Columns[$i]['name'] = $row['Field'];
        $Columns[$i]['type'] = $row['Type'];
        $i++;
    }
}