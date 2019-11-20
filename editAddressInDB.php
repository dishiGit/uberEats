<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

$sql = "UPDATE Location SET ";
if(!empty($_POST["apt"])){
    $sql = $sql."apt_num='".$_POST["apt"]. "', ";
}
if(!empty($_POST["street_num"])){
    $sql = $sql."street_num='".$_POST["street_num"]. "', ";
}
if(!empty($_POST["street"])){
    $sql = $sql."street='".$_POST["street"] . "', ";
}
if(!empty($_POST["city"])){
    $sql = $sql."city='".$_POST["city"]. "', ";
}
if(!empty($_POST["province"])){
    $sql = $sql."Province='".$_POST["province"]. "', ";
}
if(!empty($_POST["country"])){
    $sql = $sql."country='".$_POST["country"]. "', ";
}

$sql = substr($sql, 0, -2);
$sql = $sql." WHERE locationID=".$_GET["locationID"];
// echo $sql;
$conn = mysqli_connect($host, $user, $password, $db, $port);

$res=mysqli_query($conn, $sql);
if($res){
    header("Location: address.php?id=".$_GET['id']);
    exit();
}
mysqli_close($conn);
?>