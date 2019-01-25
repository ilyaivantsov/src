<?php

$get_json_data = file_get_contents('php://input');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents('./store.json',$get_json_data);
    echo 200;
}
else {
    header('Content-Type: application/json');
    $store = file_get_contents('./store.json');
    echo $store;
}
?>
