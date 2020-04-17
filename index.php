<?php
//MY API link
//https://rapidapi.com/kenpi04/api/food-calorie-data-search

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/156ac59753.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class=" navbar-default" role="navigation">

    <div class="topnav">
        <a href="index.php"><i class="fas fa-home"></i></a>

        <form action="" method="get">
            <input class="search" type="text" placeholder="Search.." name="title">
        </form>

    </div>

</nav>
</body>
</html>';


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

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}
?>