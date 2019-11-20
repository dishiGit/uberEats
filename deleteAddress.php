<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

$sql = "DELETE FROM user_locations WHERE locationID=".$_GET["locationID"] ." and userID=".$_GET['id'];

$conn = mysqli_connect($host, $user, $password, $db, $port);

$res=mysqli_query($conn, $sql);
if($res){
    header("Location: address.php?id=".$_GET['id']);
    exit();
}
mysqli_close($conn);
?>