<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db, $port);
$sql="SELECT * FROM location WHERE locationID = " . $_GET["locationID"];
$res=mysqli_query($conn, $sql);
if ($res)
{
    $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $apt=$newArray['apt_num'];
    $street_num=$newArray['street_num'];
    $street=$newArray['street'];
    $city=$newArray['city'];
    $province=$newArray['province'];
    $country=$newArray['country'];
    $phone = $newArray['phone_num'];
}
mysqli_close($conn);
?>
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
            <div class="span10 content">
                <div data-v-910d3df0="" class="row-fluid">
                    <div data-v-910d3df0="" class="span16">
                        <form action="editAddressInDB.php?id=<?=$_GET["id"]?>&locationID=<?=$_GET["locationID"]?>" method="POST">
                        <h1 data-v-910d3df0="">Edit your address below.</h1>
                        <h5 data-v-910d3df0="">Account Information</h5>
                        <label data-v-910d3df0="" class="vspace1">Street Number</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$street_num?>" name="street_num"><!---->
                        <label data-v-910d3df0="">Street</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$street?>" name="street"><!---->
                        <label data-v-910d3df0="">City</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$city?>" name="city"><!----><br></br>
                        <label data-v-910d3df0="">APT.</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$apt?>" name="apt"><!----><br></br>
                        <label data-v-910d3df0="">Province</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$province?>" name="province"><!---->
                        <label data-v-910d3df0="">Country</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$country?>" name="country">
                        
                        <div data-v-910d3df0="" class="span16 text-center vspace2">
                            <button data-v-910d3df0="" type="submit">
                                <span class="button-label">Save Changes</span>
                                <span class="load-wrapper" style="display: none;">
                                    <span class="load-animation">
                                        <span class="dot" style="width: 3px; height: 3px; border-radius: 3px; margin-right: 12px; animation: 0.45s step-end 0s infinite normal none running blink;"></span>
                                        <span class="dot" style="width: 3px; height: 3px; border-radius: 3px; margin-right: 12px; animation: 0.45s step-end 0.075s infinite normal none running blink;"></span>
                                        <span class="dot" style="width: 3px; height: 3px; border-radius: 3px; margin-right: 0px; animation: 0.45s step-end 0.15s infinite normal none running blink;"></span>
                                    </span>
                                </span>
                            </button>
                        </div>
                </form>
            </div>
        </div>
        </div><!----></div>
    </body>
</html>