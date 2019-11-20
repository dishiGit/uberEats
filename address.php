<html>
    <body>
    <div class="row-fluid">
        <div class="span3">
            <div class="help-menu"><h2><a href="/en-ca/account" class="">Account</a></h2>
            <ul class="nav nav--stacked">
                <li><a href="welcome.php?id=<?=$_GET["id"]?>">Home</a></li>
                <li><a href="account.php?id=<?=$_GET["id"]?>">Account Details</a></li>
                <li><a href="/en-ca/account/emails" class="">Email Preferences</a></li>
                <li><a href="orderHistory.php?id=<?=$_GET["id"]?>" class="">Order History</a></li>
                <li><a href="address.php?id=<?=$_GET["id"]?>" class="router-link-exact-active router-link-active">Addresses</a></li>
                <li><a href="index.html">Logout</a></li>
            </ul>
            </div>
        </div>
        <div class="span10 content">
            <div>
                <div class="row-fluid addresses-list">
                    <div class="span16"><h1 class="text-center">Saved addresses</h1>
                        <div class="row-fluid">
                            <div class="span10 offset3 tablet-portrait-full-fluid-width">
                                <?php 
                                $user = 'root';
                                $password = 'root';
                                $db = 'uber_eats';
                                $host = 'localhost';
                                $port = 3306;
                                
                                $conn = mysqli_connect($host, $user, $password, $db, $port);
                                $sql="SELECT l.locationID, l.apt_num, l.street_num, l.street, l.city, l.province, l.country, u.phone_num FROM user u, user_locations ul, location l WHERE u.userID = " . $_GET["id"] ." and u.userID = ul.userID and ul.locationID = l.locationID";

                                $res=mysqli_query($conn, $sql);
                                
                                if ($res)
                                {
                                    while ($newArray=mysqli_fetch_array($res,MYSQLI_ASSOC))
                                    {
                                        $apt=$newArray['apt_num'];
                                        $street_num=$newArray['street_num'];
                                        $street=$newArray['street'];
                                        $city=$newArray['city'];
                                        $province=$newArray['province'];
                                        $country=$newArray['country'];
                                        $phone = $newArray['phone_num'];
                                        $locationID = $newArray['locationID'];
                                        
                                        echo '<div style="margin-bottom:30px">
                                        <div class="address-container">
                                            <div class="address-data"><div></div>
                                                <div>' .$street_num .' ' .$street .', apt.' .$apt .'</div><div></div>
                                                <div>' .$city .', ' .$province .'</div>
                                                <div>' .$country .'</div>
                                                <div>'.$phone .'</div><!----><!----><!---->
                                            </div>
                                            <div class="vspace1 text-uppercase action-box">
                                                <a href="editAddress.php?locationID=' . $locationID .'&id=' . $_GET["id"] .'">Edit</a> &nbsp;
                                                <a href="deleteAddress.php?locationID=' . $locationID .'&id=' . $_GET["id"] .'">Delete</a>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                    
                                }
                                mysqli_close($conn);
                                ?>
                                
                            
                            </div>
                            <div><a href="newAddress.php?id=<?=$_GET["id"]?>">Add new address</a></div>
                        </div>
                    </div>
                </div>
                <div><!----></div>
            </div>
        </div><!---->
    </div>
    </body>
</html>