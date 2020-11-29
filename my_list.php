<?php
include('index.php');
require_once "config.php";
$auth_id = $_SESSION["id"];
$food = "SELECT * FROM food2 WHERE  'user_id' = $auth_id";
$result = $link->query($food);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<form action="delete-food.php" method="post">';
        echo " User ID: " . $row["user_id"] . " Food kcal " . $row["food_id"] . '<button type="submit" class="btn btn success">Delete</button>' . "<br>";
        echo "<input type=\"hidden\" name=\"id\" value=" . $row["id"] . ">";
        echo "</form>";
    }
} else {
    echo "0 results";
}
