<?php 
include('../config/constants.php');
?>

<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <div class="login">
        <h1>login</h1>
        <?php 
        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>

        <br><br>
         <!-- creation of form -->
    <form action="" method="POST">
        Username:<br>
        <input type="text" name="username" placeholder="Enter Useername">
        <br> <br>
        password:<br>
        <input type="text" name="username" placeholder="Password">
        <br> <br>
        
        <input type="submit" name="submit" value="login" class="btn-primary">
</form>
    </div>

   



</html>
<?php 
// Check whether submit button is clicked or not
if(isset($_POST['submit']))
{
    $username= $_Post['username'];
    $password =md5($_POST['password']);


// sql query to check whether user with username exists or not
$sql="SELECT * FROM tbl_admin WHERE username='$username' And password='$password'";
// agar ye query chali toh ek he row return hoga

$res= mysqli_query($conn,$sql);

// ek row return hoga isliye hum check krenge ki row ka count 1 h ya nhi
// count the nos of rows

if(mysqli_num_rows($res)==1)

{
// user exists

$_SESSION['user']= $username;
header('location:'.SITEURL.'admin/index.php');

}
}


?>