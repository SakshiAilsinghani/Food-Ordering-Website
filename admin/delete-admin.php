<?php
include('../config/constants.php');
// 4 steps to delete the admin
// 1. get the Id of admin to be deleted
$id = $_GET['id'];
// var_dump($id);


// 2.Create sql query to delet admin
$sql="DELETE FROM tbl_admin WHERE id=$id";

// 3.Execute the Query
$res=mysqli_query($conn,$sql);

// 4.Redirect to manage admin page with message success or error
if($res==true)
{
    // echo $id;
        $_SESSION['delete']="Admin Deleted Sucessfully!";
        // this above is the msg we'll display after admin is added using session by printing the session so it will rint the value ie admin added sucssfully
        // After adding admin redirect page to Manage admin page for redirecting we'll use header function and siteurl constant
         header('location:'.SITEURL.'admin/manage-admin.php');
     }
else{
    $_SESSION['delete']="Error In Deleting";
    header("location:".SITEURL.'admin/manage-admin.php');
}
// echo $id = $_GET['id'];

?>