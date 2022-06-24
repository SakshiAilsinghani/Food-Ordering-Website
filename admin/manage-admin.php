<?php include('partials/menu.php');?>

        
        <!-- main section starts -->
        <div class="main-section">
            <div class="wrapper">

      
                <h1>Manage Admin</h1>

                <br></br>

                <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                }
                if(isset($_SESSIONN['delete']))
                {
                    echo $_SESSION['delete'];
                }
                if(isset($_SESSION['update-pwd']))
                {
                    echo $_SESSION['update-pwd'];
                }

                ?>
                <br></br>

                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br></br>

   
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>

            </tr>  

            <?php 
            // display all admins added to database 
            // query to get admins from db
            $sql= "SELECT * FROM tbl_admin";
            // execute the query
            $res=mysqli_query($conn,$sql);
            // check whether query executedc or not

            if($res==true)
            {
                // count the no of rows to check whether we have data in database
                $rows=mysqli_num_rows($res);//function to get all the rows in db
               
                //agar data h matlab rows h toh fetch kro
                if($rows>0)
                {
                    // we have data
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        // using while loop to get all data from database
                        // and while loop will run as long as we have data in db 

                        // Get individual data
                        $id=$rows['id'];
                        $full_name=$rows['first_name'];
                        $username=$rows['username'];
                        //Display vaues in table 
                        ?>
                         <tr>
                <td><?php echo $id;?></td> 
                <td><?php echo $full_name; ?></td>
                <td><?php echo $username; ?></td>
                
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class="btn-secondary">Change Password</a>
                     <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                </td>

            </tr> 


                        <?php 

                        

                        

                    }
                }
                
            }
            ?>

          
            <!-- th is table heading, tr table row td is table data -->
            
            
                
        </table>
    </div>
</div>
            
 
       

