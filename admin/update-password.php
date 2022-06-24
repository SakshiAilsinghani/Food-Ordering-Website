<?php
include('partials/menu.php');
?>
<html>
    <body>
        <div class="main-section">
            <div class="wrapper">
                <h1>Change Password</h1>
            </div>
       
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Old password</td>
                        <td><input type="password" name="old_password" placeholder="Old password"></td>
                    </tr>
                    <tr>
                        <td>New Password</td>
                        <td><input type="password" name="new_password" placeholder="New Password"></td>
                    </tr>

                    <tr>
                        <td>Confirm Password</td>
                        <td><input type="password" name="confirm_password" placeholder="Re-enter password"></td>
                    </tr>

                    <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Password" class="btn-secondary">
                    </td>
                    </tr>
                </table>
            </form>

          

        </div>
        <?php
        // JAB B HUMKO UPDATE KRNA H KUCH TOH ID LENI HE PADEGI ID INCLUDE KRNI PADEGI KYUNKI USSE HE TOH PTA  CHALEGA KONSE USER KO UPDATE KRRHE
        // 1.check submit button is clicked or not
            if(isset($_POST['submit']))
            {

                //2. get data from form
                $id=$_POST['id'];
                $old_password=md5($_POST['old_password']);
                $new_password=md5($_POST['new_password']);
                $confirm_password=md5($_POST['confirm_password']);

                // 3. check whether the user with current id andc password exists or not
                $sql="SELECT * FROM  tbl_admin WHERE id='$id' AND password='$old_password'";

                $res=mysqli_query($conn,$sql);

               if($res==true)
               {
                   $count=mysqli_num_rows($res);
               
               if($count==1)
               {
                if($new_password===$confirm_password)
                {
                 $sql2="UPDATE tbl_admin SET
                 password='$new_password'
                 WHERE id=$id
                 ";
                  echo "password matched";
                  $res2=mysqli_query($conn,$sql2);

                  if($res2==true)
                  {
                    $_SESSION['update-pwd']="Password Updated";
                    header("location:".SITEURL.'admin/manage-admin.php');
                  }
                 
                }
                
                   
               }

                // if($new_password===$confirm_password)
                // {
                //     $sql="UPDATE tbl_admin SET
                //     password='$new_password'";

                //     $res=mysqli_query($conn,$sql);

                    
                // }
            }
        }
            ?>
    </body>
</html>