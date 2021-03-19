<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    body {
        background-color: #4CAE50;
    }
</style>
<?php

$con = mysqli_connect("localhost", "root", "", "mini-api");

$response = array();

if($con){
    $sql = "SELECT * from DATA ";
    $result = mysqli_query($con, $sql);
    if($result){
        header("Conect-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['age'] = $row['age'];
            $response[$i]['email'] = $row['email'];
            $i++;
        }
        $json = json_encode($response, JSON_UNESCAPED_UNICODE,JSON_PRETTY_PRINT);
    } else{echo 'Database connection failed';};

}

echo '<br><br>';
echo $json;
echo '<br><br>';


$arr = json_decode($json, true);

foreach ($arr as $key) {
    echo $key['name'] .': '. $key['email'] . '<br>';
}
?>

</body>
</html>







