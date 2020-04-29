<?php
include('index.php');
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
        <a href="home.php"><i class="fas fa-home"></i></a>

        <form action="" method="get">
            <input class="search" type="text" placeholder="Search.." name="title">
        </form>

    </div>
</nav>';

if (isset($_GET['title'])) {

    echo '<form method="post">';
    if ($objectnumber > 0) {
        echo '<input type="submit" name="modify" value="Back" />

';
    }
    echo '
<input type="submit" name="ok" value="Next" />
</form>';

    echo $objectnumber;

    echo "
            <table class='table'>
              <tr>
                <th>Company</th>
                <th>Values</th>
              </tr>
              <tr>
                <td>Water</td>
                <td>$water</td>
              </tr><tr>
                <td>Calcium</td>
                <td>$calcium</td>
              </tr>
              <tr>
                <td>Energ kcal</td>
                <td>$energ_kcal</td>
              </tr>
              <tr>
                <td>Iron</td>
                <td>$iron</td>
              </tr>
            </table>";
}
var_dump($phpArray);

echo '
</body>
</html>
';
