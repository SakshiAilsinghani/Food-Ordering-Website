<?php  include('partials/menu.php');?>

<div class="main-section">
    <div class="wrapper">
        <h1>Add admin</h1>

        <br></br>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="text" name="password" placeholder="Enter your password">
                    </td>
                </tr>
                
                <tr>
                   
                    <td colspan="2">
                        <input type="submit" name="submit" value="add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

</div>
<?php

// process the value and savve it in database
//1. check whether submit button is clicked or not

if(isset($_POST['submit']))
{
    // button clicked
    // get yhe data through form
    //  1. Get the data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    // md5 will convert the password into hashed password


    //2Write sql query to save the data
    $sql= "INSERT INTO  tbl_admin SET
    first_name='$full_name' ,
    username='$username',
    password='$password'";

    // echo "$sql";

    // // 3.Execute the query and savve into db
    // $conn= mysqli_connect('localhost','root','');
    // // select database
    // $db_select=mysqli_select_db($conn,'');
   
    // Executing query and saving data into database
    $res = mysqli_query($conn,$sql) or die(mysqli_error());
    // mysqli_query performs query

     if($res==true)
     {
            // echo "Data inserted";
        //    create a Session Variable to display the msg
        // all session varaiables are stored in Global variable $SESSION 
        // basically syntax of session is $SESSION['favcolor']="green",$SESSION['add'] ,etc
        $_SESSION['add']="Admin Added Sucessfully!";
        // this above is the msg we'll display after admin is added using session by printing the session so it will rint the value ie admin added sucssfully
        // After adding admin redirect page to Manage admin page for redirecting we'll use header function and siteurl constant
         header("location:".SITEURL.'admin/manage-admin.php');
     }
     else{
        // echo"data not ";
    $_SESSION['add']="Failed to add!";
    // this above is the msg we'll display after admin is added using session by printing the session so it will rint the value ie admin added sucssfully
    // After adding admin redirect page to Manage admin page for redirecting we'll use header function and siteurl constant
     header("location:".SITEURL.'admin/manage-admin.php');
           
              
     
    }

}
?>