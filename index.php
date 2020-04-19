<?php
header("Content-Type: application/json");
require_once 'config.php';

$query = "select * from food";
$results = $conn->query($query);
$output = [];
while ($item = $results->fetch_assoc()){
    $output[]= $item;
}
echo json_encode($output);

//PROCEDUREEL

$curl = curl_init();

if (isset($_GET['title'])) //variablen URl balk
{
    $titleGET = $_GET['title']; //url balk of via Form
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://food-calorie-data-search.p.rapidapi.com/api/search?keyword=" . $titleGET,
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
    echo $response;
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
//        echo $response;
    }
}
?>