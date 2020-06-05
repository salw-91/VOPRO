<?php

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

    $energ_kcal=$phpArray[0]->energ_kcal;

    // var_dump($phpArray);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
//        echo $response;
    }

}

?>