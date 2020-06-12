<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
};
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/156ac59753.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    
</head>
<body>
<nav class=" navbar-default" role="navigation">

    <div class="topnav">
        <a href="welcome.php"><i class="fas fa-home"></i></a>
        <form action="home.php" method="get">
            <input class="search" type="text" placeholder="Search for food.." name="title">
        </form>

    </div>
</nav>
        ';
//MY API link
//https://rapidapi.com/kenpi04/api/food-calorie-data-search

//PROCEDUREEL

$curl = curl_init();
if (isset($_GET['title'])) //variablen URl balk
{
    $titleGET = $_GET['title']; //url balk of via Form
    $replaceChars = array(' ');
    $title = str_replace($replaceChars, '_', $titleGET);
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://food-calorie-data-search.p.rapidapi.com/api/search?keyword=" . $title,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "x-rapidapi-host: food-calorie-data-search.p.rapidapi.com",
            "x-rapidapi-key: aa9cfbdf0cmsh431da9066c61c6fp1ef2f8jsn91d84ae8ad77"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    $phpArray =json_decode($response);
    curl_close($curl);
    $user_id = htmlspecialchars($_SESSION["id"]);
    $energ_kcal=$phpArray[0]->energ_kcal;
    $id=$phpArray[0]->id;

//     var_dump($phpArray);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
//        echo $response;
    }

}
echo'
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>';
?>