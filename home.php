<?php
include('index.php');
require_once "config.php";

$auth_id = $_SESSION["id"];
$food = "SELECT * FROM food2 WHERE $auth_id ='user_id'";
$result = $link->query($food);

$titleGET = $_GET['title'];

if (isset($_GET['title'])) {
  echo "<table class='table'>
              <tr>
                <th>Food</th>
                <th>Values</th>
                <th>Food ID</th>
              <tr>
                <td>$titleGET</td>
                <form action=\"register-food.php\" method=\"post\">
                <td name='food'>$energ_kcal</td>
                <td name='food'>$food_id</td>
                <td> 
                    <input type=\"hidden\" name=\"kcall\" value=\"$energ_kcal\">
                    <input type=\"hidden\" name=\"food_id\" value=\"$food_id\">
                    <input type=\"hidden\" name=\"user_id\" value=\"$user_id\">";
  echo '<button type="submit" class="btn btn success" >Add</button>';
  echo "</form>
                </td>
              </tr>
            </table>";
}

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo " User ID: " . $row["user_id"] . " Food kcal " . $row["food_id"] . "<br>";
  }
} else {
  echo "0 results";
}
$link->close();

// $row["user_id"];