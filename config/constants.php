<!-- To daiplay the msg that data is inserted successfully we use sesson -->
<!-- start the session -->
<?php
session_start();
// <!-- all sessipn varaiables are stored in Global variable $SESSION -->
// <!-- basically syntax of session is $_SESSION['favcolor'],$_SESSION['add'] -->




// create constants to store non repeating values
// when value is changing we create variables and when it is not changing we create constants
// using define we create constants
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');
define('SITEURL','http://localhost/hotel/');



    // 3.Execute the query and savve into db
    $conn= mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//database connection
    // select database
    $db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());// selecting  Database
?>