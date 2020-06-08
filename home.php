<?php
include('index.php');

if (isset($_GET['title'])) {
    echo "<table class='table'>
              <tr>
                <th>Food</th>
                <th>Values</th>

              <tr>
                <td>$titleGET</td>
                <td>$energ_kcal</td>
              </tr>

            </table>";}
