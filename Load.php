<?php

require 'Database.php';
require 'libs/jdf.php';

if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $query = $_REQUEST['id'];

    if ($stmt = $conn->prepare('SELECT * FROM users WHERE id = ?')) {
        $stmt->bind_param('d', $query);
        $stmt->execute();
        $stmt->store_result();

        while ($assoc_array = fetchAssocStatement($stmt)) {
            $timestamp = strtotime($assoc_array['birthday']);
            $assoc_array['birthday'] = jdate('Y/n/j', $timestamp);
            $timestamp = strtotime($assoc_array['employment_date']);
            $assoc_array['employment_date'] = jdate('Y/n/j', $timestamp);
            echo json_encode($assoc_array);
            break;
        }

        $stmt->close();
    }
}

function fetchAssocStatement($stmt)
{
    if ($stmt->num_rows > 0) {
        $result = array();
        $md = $stmt->result_metadata();
        $params = array();
        while ($field = $md->fetch_field()) {
            $params[] = &$result[$field->name];
        }
        call_user_func_array(array($stmt, 'bind_result'), $params);
        if ($stmt->fetch())
            return $result;
    }

    return null;
}
