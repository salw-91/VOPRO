<?php
include('index.php');
require_once "config.php";
$titleGET = $_GET['title'];
if (isset($_GET['title'])) {
    echo "<table class='table'>
              <tr>
                <th>Food</th>
                <th>Values</th>

              <tr>
                <td>$titleGET</td>
                <form action=\"register-food.php\" method=\"post\">
                <td name='food'>$energ_kcal</td>
                <td> 
                    <input type=\"hidden\" name=\"kcall\" value=\"$energ_kcal\">
                    <input type=\"hidden\" name=\"user_id\" value=\"$user_id\">
                    <button type=\"submit\" class=\"btn btn-success\" >Add</button></form>
                </td>
              </tr>

            </table>";
}
require_once "config.php";

$food = "select    user_id,
                                        food_id,
                                from    food
                                ";
$result = $link->query($food);

//echo "<table>";
//foreach($result as $result)
//{
//    echo "<tr>";
//    echo "<td>" . $result["user_id"]."</td>";
//    echo "<td>" . $result["food_id"]."</td>";
//    echo "</tr>";
//}
//echo "</table>";


//echo "<table class='table'>
//              <tr>
//              <td>your food</td></tr>
//
//                <th>Food</th>
//                <th>Values</th>
//
//              <tr>
//                <td></td>
//                <form action=\"\" method=\"post\">
//                <td name='food'></td>
//                <td>
//                    <input type=\"hidden\" name=\"kcall\" value=\"\">
//                    <input type=\"hidden\" name=\"user_id\" value=\"\">
//                    <button type=\"submit\" class=\"btn btn-success\" >Delete</button></form>
//                </td>
//              </tr>
//
//            </table>";