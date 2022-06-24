<?php include('partials/menu.php');?>
<!-- jo menu ya nav bar hai vo har page me dikhna chahiye n isliye  -->
<!-- this page is also a part of menu only so give this page ki link to index.php ke menu anchor tag mein-->

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br>

        <!-- button to add category -->
        <!-- next line ke liye refer add category ka line num 8 -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br> <br>
        <table class="tbl-full">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>  
            <!-- Abhi Jo catrgories add ki database mein add-category file se
        usko display krna h database se data fetch krke display -->

        <?php
        $sql="SELECT * FROM tbl_category";

        $res=mysqli_query($conn,$sql);

        // count the rows
        $count=mysqli_num_rows($res);

        if($count>0)
        {
            // we have data in db
            while($row=mysqli_fetch_assoc($res))
            {
                // $id= $row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                $featured= $row['featured'];
                $active=$row['active'];
                ?>
                <tr>
                    <td><?php echo $title ?></td>
                    <td>
                        <?php 
                        if($image_name!="")
                        {
                            // Display the image
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px"  >
                            <?php

                        }
                        else{
                            echo"Image not Added";

                        }
                        ?>

                     </td>
                    <td><?php echo $featured ?></td>
                    <td><?php echo $active?></td>
                    
                </tr>

                <?php



                
            }
        }
        
        ?>
            
                
        </table>


    </div>
</div>
