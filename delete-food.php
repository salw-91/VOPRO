<?php
require_once "config.php";
include('index.php');

$id = $_POST['id'];

$sql = "DELETE FROM food2 WHERE id = $id ";

if ($link->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}
