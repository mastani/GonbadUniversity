<?php

require 'Database.php';

if (isset($_REQUEST['query']) && !empty($_REQUEST['query'])) {
  $query = $_REQUEST['query'];
  $array = array();
  $likeString = '"' . $query . '"';

  if ($stmt = $conn->prepare('SELECT id, pname, pfamily, national_code FROM users WHERE MATCH(pname,pfamily,ename,efamily) AGAINST (?)')) {
    $stmt->bind_param('s', $likeString);
    $stmt->execute();
    $stmt->bind_result($id, $pname, $pfamily, $national_code);

    while ($stmt->fetch()) {
      $array[] = array (
        'id' => $id,
        'label' => $national_code,
        'value' => "$pname $pfamily"
      );
    }

    $stmt->close();
  }

  echo json_encode($array);
}
