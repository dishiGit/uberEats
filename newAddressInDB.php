<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

// INSERT INTO Location (apt_num,street_num,street,city,province,country)
// VALUES ('23', '33', 'McTarvish', 'Montreal', 'QC', 'Canada'),

$sql = "INSERT INTO Location (apt_num,street_num,street,city,province,country) VALUES (";
if(!empty($_POST["apt"])){
    $sql = $sql."'".$_POST["apt"]. "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["street_num"])){
    $sql = $sql."'".$_POST["street_num"]. "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["street"])){
    $sql = $sql."'".$_POST["street"] . "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["city"])){
    $sql = $sql."'".$_POST["city"]. "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["province"])){
    $sql = $sql."'".$_POST["province"]. "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["country"])){
    $sql = $sql."'".$_POST["country"]. "')";
}else{
    $sql = $sql."NULL)";
}

echo $sql;
$conn = mysqli_connect($host, $user, $password, $db, $port);

$res=mysqli_query($conn, $sql);
if($res){
    $sql2 = "SELECT MAX(locationID) as id FROM Location";
    $res2=mysqli_query($conn, $sql2);
    $result=mysqli_fetch_array($res2,MYSQLI_ASSOC);
    $locationID = $result["id"];
    $sql3 = "INSERT INTO user_locations VALUES (". $_GET['id'] .", ". $locationID .")";
    echo $sql3;
    mysqli_query($conn, $sql3);
    header("Location: address.php?id=".$_GET['id']);
    exit();
}
mysqli_close($conn);
?>