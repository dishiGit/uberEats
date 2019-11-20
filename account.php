<?php
$user = 'root';
$password = 'root';
$db = 'uber_eats';
$host = 'localhost';
$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db, $port);
$sql="SELECT * FROM user WHERE userID = " . $_GET["id"];
$res=mysqli_query($conn, $sql);
if ($res)
{
    $newArray=mysqli_fetch_array($res,MYSQLI_ASSOC);
    $firstname=$newArray['first_name'];
    $lastname=$newArray['last_name'];
    $email=$newArray['email'];
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
                        <li><a href="account.php?id=<?=$_GET["id"]?>" class="router-link-exact-active router-link-active">Account Details</a></li>
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
                        <form data-v-910d3df0="" action="/en-ca/account" method="POST">
                        <h1 data-v-910d3df0="" class="text-center">Account Details</h1>
                        <p data-v-910d3df0="">Edit your preferences below.</p>
                        <h5 data-v-910d3df0="">Account Information</h5>
                        <label data-v-910d3df0="" class="vspace1">First name</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$firstname?>"><!----><label data-v-910d3df0="">Last name</label>
                        <input data-v-910d3df0="" type="text" placeholder = "<?=$lastname?>"><!----><label data-v-910d3df0="">Email address</label>
                        <input data-v-910d3df0="" type="text" disabled="disabled" placeholder = "<?=$email?>">
                        <h5 data-v-910d3df0="" class="vspace1">Account Password</h5>
                        <label data-v-910d3df0="" class="vspace1">Old password</label>
                        <input data-v-910d3df0="" type="password" name="oldPassword"><!---->
                        <div data-v-7d76a87e="" data-v-910d3df0="" class="span16" barinmiddle="true">
                            <div data-v-7d76a87e="" class="span16"><label data-v-7d76a87e="">New password</label>
                            <div data-v-7d76a87e="" class="password">
                                <input data-v-7d76a87e="" id="password" type="password" name="password" autocomplete="new-password">
                                <button data-v-7d76a87e="" type="button" class="hide-show-button"> Show </button>
                            </div><!----><!---->
                        </div><!---->
                    </div>
                    <div data-v-910d3df0="" class="span16 text-center vspace2">
                        <button data-v-910d3df0="" type="submit" class="button full-width button button-primary smartphone-landscape-full-width">
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