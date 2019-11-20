<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db, $port);
### query 1
echo "<h3>Query 1</h3>";
$sql1 = "SELECT name,rating FROM Restaurant WHERE name='McDonalds'";
$res=mysqli_query($conn, $sql1);
echo "<b> Objective of this query: Create a query to get the rating of MacDonalds </b><br><br>";  
echo "The query was: ".$sql1."<br><br>Result: <br><br>";  
if ($res)
{
    $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
    echo  "name: ". $newArray['name'] ."<br>";
    echo  "rating: ". $newArray['rating'] ."<br><br>";
}else{
    echo "query 1 failed";
} 

### query 2
echo "<h3>Query 2</h3>";
$sql2 = "SELECT first_name,last_name,rating FROM Deliverer WHERE first_name='Arthur' AND last_name='Pentecoste';";
$res=mysqli_query($conn, $sql2);
echo "<b> Objective of this query: Create a query to get the rating of a driver by his/her name (Arthur Pentecoste) </b><br><br>";  
echo "The query was: ".$sql2."<br><br>Result: <br><br>"; 
if ($res)
{
    $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
    echo  "first name: ". $newArray['first_name'] ."<br>";
    echo  "last name: ". $newArray['last_name'] ."<br>";
    echo "rating: ". $newArray['rating'] ."<br><br>";
}else{
    echo "query 2 failed";
} 

### query 3
echo "<h3>Query 3</h3>";
$sql3 = "SELECT Restaurant.name as res_name,Menu_item.itemID,Menu_item.name,Menu_item.status FROM Restaurant LEFT JOIN Menu_item ON Restaurant.restaurantID=Menu_item.restaurantID WHERE Menu_item.status='in stock';";
$res=mysqli_query($conn, $sql3);
echo "<b> Objective of this query: Create a query to get the current status of a menu item at a restaurant </b><br><br>";  
echo "The query was: ".$sql3."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo  "restaurant name: ". $newArray['res_name'] ."<br>";
        echo  "itemID: ". $newArray['itemID'] ."<br>";
        echo "item name: ". $newArray['name'] ."<br>";
        echo "status: ". $newArray['status'] ."<br><br>";
    }
    
}else{
    echo "query 3 failed";
} 

### query 4
$sql4 = "SELECT User.userID,first_name, last_name,SUM(bill) as totalSpending FROM User LEFT JOIN Orders ON User.userID=Orders.user GROUP BY User.userID ORDER BY totalSpending DESC";
$res=mysqli_query($conn, $sql4);
echo "<h3>Query 4</h3>";
echo "<b> Objective of this query: Create a query to get the total spending of all customer in descending order </b><br><br>";  
echo "The query was: ".$sql4."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo  "userID: ". $newArray['userID'] ."<br>";
        echo  "first name: ". $newArray['first_name'] ."<br>";
        echo "last name: ". $newArray['last_name'] ."<br>";
        echo "total spending: ". $newArray['totalSpending'] ."<br><br>";
    }
    
}else{
    echo "query 4 failed";
} 


mysqli_close($conn);
?>