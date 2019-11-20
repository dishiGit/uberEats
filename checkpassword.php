<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db, $port);

$sql="SELECT * FROM user WHERE userID = " . $_POST["name"] ;
$res=mysqli_query($conn, $sql);
$counter=false;
if ($res)
{     
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        $counter=true;
        echo $ln;
        $ln=$newArray['password']; 
        if ($_POST["pwd"]==$ln) 
        {header("Location: welcome.php?name=".$newArray['first_name']."&id=".$newArray['userID']);
        exit();
        }
    else
    {echo "<br> <b>wrong password</b>";
    }
}
if ($counter==false)
{echo "<br>";
    echo "user does not exist";}
}
else
{echo "query failed";}

mysqli_close($conn);
?>