<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once ('../../config/db.php');
include_once ('../../model/notify.php');

$db = new db();
$connect = $db->connect();

$notify = new Notify($connect);

$readInClass = $notify->readInClass(3);

$num = $readInClass->rowCount();

if ($num > 0){
    $notify_in_class_array = [];
    $notify_in_class_array['data2'] = [];
    while ($row = $readInClass->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $notify_item = array(
            'name' =>$name,
            'des' =>$des,
            'img' =>$img,
            'class_id' =>$class_id,
        );
        array_push($notify_in_class_array['data2'], $notify_item);
    }
    echo json_encode($notify_in_class_array);
}
?>