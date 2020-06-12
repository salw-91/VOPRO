<?php
require_once "config.php";
$user_id= $_POST['user_id'];
$food_id= $_POST['kcall'];

$sql = "INSERT INTO food (user_id,food_id)
VALUES ($user_id,$food_id )";

if ($link->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}