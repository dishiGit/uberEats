<html>
    <body>
        <div class="row-fluid">
            <div class="span3">
                <div class="help-menu">
                    <h2><a href="/en-ca/account" class="router-link-exact-active ">Account</a></h2>
                    <ul class="nav nav--stacked">
                        <li><a href="welcome.php?id=<?=$_GET["id"]?>">Home</a></li>
                        <li><a href="account.php?id=<?=$_GET["id"]?>">Account Details</a></li>
                        <li><a href="/en-ca/account/emails" class="">Email Preferences</a></li>
                        <li><a href="orderHistory.php?id=<?=$_GET["id"]?>" class="">Order History</a></li>
                        <li><a href ="address.php?id=<?=$_GET["id"]?>">Addresses</a></li>
                        <li><a href="index.html">Logout</a></li>
                    </ul>
                </div>
            </div>

            <div>
                <?php
                $user = 'root';
                $password = 'root';
                $db = 'uber_eats';
                $host = 'localhost';
                $port = 3306;
                
                $conn = mysqli_connect($host, $user, $password, $db, $port);
                
                echo "<h3>Order History</h3>";
                $sql1 = "SELECT time, orderID,  bill, status FROM orders WHERE user=" . $_GET["id"];
                $res=mysqli_query($conn, $sql1);
                if ($res)
                {
                    while($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC)){
                        echo  "date: ". $newArray['time'] ."<br>";
                        echo  "oderID: ". $newArray['orderID'] ."<br>";
                        echo  "bill: ". $newArray['bill'] ."<br>";
                        echo  "status: ". $newArray['status'] ."<br><br>";
                    }
                }else{
                    echo "query failed";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
        </div><!----></div>
    </body>
</html>