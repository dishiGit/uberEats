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

### query 5 already implemented in the web page


### query 6
$sql6 = "SELECT Menu_item.name,price,Menu_item.description,Restaurant.name as res_name FROM Menu_item,Restaurant WHERE Menu_item.restaurantID=Restaurant.restaurantID AND Menu_item.name LIKE '%Combo%'";
$res=mysqli_query($conn, $sql6);
echo "<h3>Query 6</h3>";
echo "<b> Objective of this query: Create a query to locate any dish that has the word 'Combo' in it along with the restaurant </b><br><br>";  
echo "The query was: ".$sql6."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "item name: ". $newArray['name'] ."<br>";
        echo "price: ". $newArray['price'] ."<br>";
        echo "description: ". $newArray['description'] ."<br>";
        echo "restaurant name: ". $newArray['res_name'] ."<br><br>";
    }  
}else{
    echo "query 6 failed";
} 

### query 7
$sql7 = "SELECT Restaurant.restaurantID,name,avgSalesPerBill FROM Restaurant LEFT JOIN Orders ON Orders.restaurant=Restaurant.restaurantID LEFT JOIN (SELECT Orders.restaurant,AVG(bill) AS avgSalesPerBill FROM Orders GROUP BY Orders.restaurant) ast ON Restaurant.restaurantID=ast.restaurant GROUP BY Restaurant.restaurantID;";
$res=mysqli_query($conn, $sql7);
echo "<h3>Query 7</h3>";
echo "<b> Objective of this query: Create a query to get the restaunt info to get average sales per bill </b><br><br>";  
echo "The query was: ".$sql7."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurantID: ". $newArray['restaurantID'] ."<br>";
        echo "name: ". $newArray['name'] ."<br>";
        echo "Average Sales Per Bill: ". $newArray['avgSalesPerBill'] ."<br><br>";
    }  
}else{
    echo "query 7 failed";
}

### query 8
$sql8 = "SELECT Restaurant.restaurantID,name,SUM(Orders.bill) as totalSales FROM Restaurant LEFT JOIN Orders ON Orders.restaurant=Restaurant.restaurantID GROUP BY Restaurant.restaurantID HAVING totalSales>100;";
$res=mysqli_query($conn, $sql8);
echo "<h3>Query 8</h3>";
echo "<b> Objective of this query: Create a query to get the total sales of a restaurant in the system which is >$100 </b><br><br>";  
echo "The query was: ".$sql8."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurantID: ". $newArray['restaurantID'] ."<br>";
        echo "name: ". $newArray['name'] ."<br>";
        echo "Total Sales: ". $newArray['totalSales'] ."<br><br>";
    }  
}else{
    echo "query 8 failed";
}

### query 9
$sql9 = "SELECT * FROM Orders WHERE Orders.status='failed';";
$res=mysqli_query($conn, $sql9);
echo "<h3>Query 9</h3>";
echo "<b> Objective of this query: Create a query to get all the orders in the system that are not delivered successfully </b><br><br>";  
echo "The query was: ".$sql9."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "orderID: ". $newArray['orderID'] ."<br>";
        echo "time: ". $newArray['time'] ."<br>";
        echo "Status: ". $newArray['status'] ."<br><br>";
    }  
}else{
    echo "query 9 failed";
}

### query 10
$sql10 = "SELECT Deliverer.driverID,first_name,last_name,COUNT(Orders.orderID) as failedDelivery
FROM Orders,Deliverer 
WHERE Orders.driverID=Deliverer.driverID AND Orders.status='failed'
GROUP BY Deliverer.driverID
ORDER BY failedDelivery DESC;";
$res=mysqli_query($conn, $sql10);
echo "<h3>Query 10</h3>";
echo "<b> Objective of this query: Create a query to see the deliverers who have failed deliveries in descending order </b><br><br>";  
echo "The query was: ".$sql10."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "driverID: ". $newArray['driverID'] ."<br>";
        echo "first name: ". $newArray['first_name'] ."<br>";
        echo "last name: ". $newArray['last_name'] ."<br>";
        echo "# of failed deliveries: ". $newArray['failedDelivery'] ."<br><br>";
    }  
}else{
    echo "query 9 failed";
}

### query 11
$sql11 = "SELECT * FROM Restaurant 
ORDER BY rating DESC;";
$res=mysqli_query($conn, $sql11);
echo "<h3>Query 11</h3>";
echo "<b> Objective of this query: Create a query to sort restaurants based on rating </b><br><br>";  
echo "The query was: ".$sql11."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurantID: ". $newArray['restaurantID'] ."<br>";
        echo "restaurant name: ". $newArray['name'] ."<br>";
        echo "rating: ". $newArray['rating'] ."<br>";
        echo "price estimation: ". $newArray['price_estimation'] ."<br><br>";
    }  
}else{
    echo "query 11 failed";
}

### query 12
$sql12 = "SELECT * FROM Restaurant 
WHERE status = 'open';";
$res=mysqli_query($conn, $sql12);
echo "<h3>Query 12</h3>";
echo "<b> Objective of this query: Create a query to select restaurants are open </b><br><br>";  
echo "The query was: ".$sql12."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurantID: ". $newArray['restaurantID'] ."<br>";
        echo "restaurant name: ". $newArray['name'] ."<br>";
        echo "status: ". $newArray['status'] ."<br>";
        echo "price estimation: ". $newArray['price_estimation'] ."<br><br>";
    }  
}else{
    echo "query 12 failed";
}

### query 13
$sql13 = "SELECT * FROM Restaurant 
WHERE price_estimation = '$$';";
$res=mysqli_query($conn, $sql13);
echo "<h3>Query 13</h3>";
echo "<b> Objective of this query: Create a query to get restaurants with based on price range ('$$') </b><br><br>";  
echo "The query was: ".$sql13."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurantID: ". $newArray['restaurantID'] ."<br>";
        echo "restaurant name: ". $newArray['name'] ."<br>";
        echo "rating: ". $newArray['rating'] ."<br>";
        echo "price estimation: ". $newArray['price_estimation'] ."<br><br>";
    }  
}else{
    echo "query 13 failed";
}

### query 14
$sql14 = "SELECT name, description FROM Restaurant 
WHERE LocationID IN 
	(SELECT LocationID FROM User_locations WHERE userID = 1); ";
$res=mysqli_query($conn, $sql14);
echo "<h3>Query 14</h3>";
echo "<b> Objective of this query: Create a query to get all the restaurants nearby to user 1 </b><br><br>";  
echo "The query was: ".$sql14."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "name: ". $newArray['name'] ."<br>";
        echo "description: ". $newArray['description'] ."<br><br>";
    }  
}else{
    echo "query 14 failed";
}

### query 15
$sql15 = "SELECT * FROM Restaurant
WHERE price_estimation IN 
    (SELECT price_estimation FROM Restaurant, User_favorites
     WHERE Restaurant.restaurantID = User_favorites.restaurantID); ";
$res=mysqli_query($conn, $sql15);
echo "<h3>Query 15</h3>";
echo "<b> Objective of this query: Create a query to suggest the most suitable restaurants to the customer based on previous spending </b><br><br>";  
echo "The query was: ".$sql15."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurantID: ". $newArray['restaurantID'] ."<br>";
        echo "restaurant name: ". $newArray['name'] ."<br>";
        echo "rating: ". $newArray['rating'] ."<br>";
        echo "price estimation: ". $newArray['price_estimation'] ."<br><br>";
    }  
}else{
    echo "query 15 failed";
}

### query 16
$sql16 = "DELETE FROM Restaurant WHERE restaurantID = 10018; ";
$res=mysqli_query($conn, $sql16);
echo "<h3>Query 16</h3>";
echo "<b> Objective of this query: Create a query to remove a restaurant from the database </b><br><br>";  
echo "The query was: ".$sql16."<br><br>Result: <br><br>"; 
if ($res)
{
    echo "Restaurant 10018 deleted";
}else{
    echo "Restaurant 10018 doesn't exist";
}

$sql = "INSERT INTO Restaurant VALUES ('10018', 'Mozza', 5.61,'$$','open','Enoteca Monza Pizzeria Moderna, a modern-world restaurant that stays true to old-world traditions.',time('12:00:00'),time('22:00:00'),14)";
$res=mysqli_query($conn, $sql);


### query 17
$sql17 = "SELECT R.name, COUNT(O.restaurant) AS Number_Restaurant_Ordered_From
FROM Restaurant R, Orders O 
WHERE R.restaurantID = O.restaurant
GROUP BY R.name
ORDER BY Number_Restaurant_Ordered_From DESC;";
$res=mysqli_query($conn, $sql17);
echo "<h3>Query 17</h3>";
echo "<b> Objective of this query: Create a query to find which restaurant a customers orders from often </b><br><br>";  
echo "The query was: ".$sql17."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurant name: ". $newArray['name'] ."<br>";
        echo "Number of times the user has ordered in this restaurant: ". $newArray['Number_Restaurant_Ordered_From'] ."<br><br>";
    } 
}else{
    echo "query 17 failed";
}

### query 18
$sql18 = "SELECT M.name, COUNT(IO.orderID) AS Number_orders
FROM item_in_order IO, Menu_item M, Orders O
WHERE IO.itemID = M.itemID AND
	  IO.orderID = O.orderID AND 
      O.restaurant = 10012
GROUP BY M.name
ORDER BY Number_orders DESC;";
$res=mysqli_query($conn, $sql18);
echo "<h3>Query 18</h3>";
echo "<b> Objective of this query: Create a query to find which item is ordered the most in McDonalds </b><br><br>";  
echo "The query was: ".$sql18."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "item name: ". $newArray['name'] ."<br>";
        echo "Number of orders: ". $newArray['Number_orders'] ."<br><br>";
    } 
}else{
    echo "query 18 failed";
}

### query 19
$sql19 = "SELECT R.name, AVG(M.calorie) AS average_calories
FROM Restaurant R, Menu_item M
WHERE R.restaurantID = M.restaurantID
GROUP BY R.name
HAVING average_calories < 700;";
$res=mysqli_query($conn, $sql19);
echo "<h3>Query 19</h3>";
echo "<b> Objective of this query: Create a query to find the restaurants with menu item calories is less than 700 </b><br><br>";  
echo "The query was: ".$sql19."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurant name: ". $newArray['name'] ."<br>";
        echo "Average calories: ". $newArray['average_calories'] ."<br><br>";
    } 
}else{
    echo "query 19 failed";
}

### query 20
$sql20 = "SELECT R.name as res_name, M.*
FROM Restaurant R, Menu_item M
WHERE R.restaurantID = M.restaurantID AND
	R.restaurantID = 10012 AND
    M.status = 'in stock';";
$res=mysqli_query($conn, $sql20);
echo "<h3>Query 20</h3>";
echo "<b> Objective of this query: Create a query to only display the items in the menu that are in stock for Mcdonalds (ID=10012) </b><br><br>";  
echo "The query was: ".$sql20."<br><br>Result: <br><br>"; 
if ($res)
{
    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        echo "restaurant name: ". $newArray['res_name'] ."<br>";
        echo "item name: ". $newArray['name'] ."<br>";
        echo "status: ". $newArray['status'] ."<br>";
        echo "price: ". $newArray['price'] ."<br><br>";
    }  
}else{
    echo "query 20 failed";
}




mysqli_close($conn);
?>