<?php 
include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>ADD Food</h1>
        <!-- go to manage-category file and give this page link vaha par jaha add category ka button and href h -->

        <br> <br>

        <!-- adding of categories start here -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title :</td>

                    <td><input type="text" name="title" placeholder="category title"></td>
                </tr>

                
                
                <tr>
                    <td>Description :</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description Of The Food"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td>Price</td>
                    <td> <input type="num" name="price" >
                </td>
               </tr>
               <tr>
                    <td>
                        SELECT IMAGE:

                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Select category</td>
                    <td>
                        <select name="category">
                           <?php
                               $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                              // Executing Query
                               $res=mysqli_query($conn, $sql);
      
                              // count rows to check whether categories are there or not
                               $count=mysqli_num_rows($res);
      
                              // if count is greater than zero we have categories
                               if($count>0)
                               {
                                  while($row=mysqli_fetch_assoc($res))
                                  {
                                    $id= $row['id'];
                                    $title=$row['title'];
      
                                     ?>
      
                                     <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
       
                                     <?php
      
                                  }
                             
                               }
                               else
                               {
                                // we dont have category
                                ?>
                                <option value="0">No Category Found</option>
                                <?php
      
                               }
      
                           ?>
                           
                        </select>
                    </td>
                
                </tr>

                <tr>
                    <td>
                        Featured:
                    </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">NO

                    </td>
                </tr>
                <tr>
                
                    <td>
                       Active:
                    </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">NO

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">

                    </td>


                </tr>


            </table>
</form>
<?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $category=$_POST['category'];

    if(isset($_POST['featured']))
 {
    $featured= $_POST['featured'];
    
 }
 else{
    $featured="No";
 }

 if(isset($_POST['active']))
 {
    $active= $_POST['active'];
    
 }
 else{
    $active="No";
 }





    if(isset($_FILES['image']['name']))
 {
    // Upload the image
    // To upload image we need name, source and destination path
    $image_name= $_FILES['image']['name'];
    // echo $image_name;
    // die();

    if($image_name!="")
    {

    


    // Auto Rename image
    // GET the extension of image (jpg,png,gif) eg. food.jpg
    // $ext= end(explode('.', $image_name));

    // // RENAME THE IMAGE
    // $image_name="food-name-".rand(0000,9999).".".$ext;

    $source_path= $_FILES['image']['tmp_name'];

    $destination_path= "../images/food/".$image_name;

    // finally upload the image
    $upload= move_uploaded_file($source_path, $destination_path);
    // $upload=move_uploaded_file($_FILES['image']['tmp_name'], $destination_path);
//    $upload= copy($_FILES['image']['tmp_name'], $destination_path);

    // if($upload==false)
    // {
    //     header('location:'.SITEURL.'admin/manage-category.php');

    //     die();
    // }

    }
 }
   else{
    // else mein dont upload the image
    $image_name="";
 }

//  Insert into db


// $sql2="INSERT INTO tbl_food SET 
// (title, description, price, image_name, category_id, featured, active) VALUES ('$title','$description',$price,'$image_name','$category','$featured','$active')";
// $res2 =mysqli_query($conn, $sql2);

// if($res2==true)
// {
//     header('location:'.SITEURL.'admin/manage-food.php');
// }

$sql2= "INSERT INTO tbl_food SET
title ='$title',
description = '$description',
price = $price,
image_name = '$image_name',
category_id = $category,
featured = '$featured',
active = '$active'
";

$res2 =mysqli_query($conn, $sql2);

if($res2==true)
{
    // header('location:'.SITEURL.'admin/manage-food.php');
    // header('location:'.SITEURL.'admin/manage-category.php');
//

 }



}

?>

    </div>

</div>