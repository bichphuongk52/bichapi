<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>

<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once ('../config/db.php');
include_once ('../model/user.php');

$db = new db();
$connect = $db->connect();

$user = new User($connect);
$read = $user->read();

$num = $read->rowCount();
if ($num > 0) {
    $user_array = [];
    $user_array['data'] = [];
    while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            'user_id'=> $user_id,
            'username'=>$username,
            'password'=>$password,
            'class_id' =>$class,
            'name' =>$name,
            'avatar'=>$avatar,
        );
        array_push($user_array['data'], $user_item);
    }
    echo json_encode($user_array);
}
?>

</body>

</html>
