<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

// INSERT INTO Location (apt_num,street_num,street,city,province,country)
// VALUES ('23', '33', 'McTarvish', 'Montreal', 'QC', 'Canada'),

$sql = "INSERT INTO user (first_name,last_name,email,phone_num, password) VALUES (";
if(!empty($_POST["first_name"])){
    $sql = $sql."'".$_POST["first_name"]. "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["last_name"])){
    $sql = $sql."'".$_POST["last_name"]. "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["email"])){
    $sql = $sql."'".$_POST["email"] . "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["phone"])){
    $sql = $sql."'".$_POST["phone"] . "', ";
}else{
    $sql = $sql."NULL, ";
}
if(!empty($_POST["pass"])){
    $sql = $sql."'".$_POST["pass"]. "')";
}else{
    $sql = $sql."NULL)";
}

// echo $sql;
$conn = mysqli_connect($host, $user, $password, $db, $port);

$res=mysqli_query($conn, $sql);
if($res){
    $sql2 = "SELECT MAX(userID) as id FROM user";
    $res2=mysqli_query($conn, $sql2);
    $result=mysqli_fetch_array($res2,MYSQLI_ASSOC);
    $userID = $result["id"];
    echo "<p>Your account id is " .$userID .", please log in with you account id.<p><br>";
    echo "<h2><a href='index.html'>HOME</a></h2>";
}
mysqli_close($conn);
?>