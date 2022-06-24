<?php 
include('partials/menu.php');
?>

<!-- ECHO DO NOT DISPLAY THE VALUE OF ARRAY -->

<div class="main-content">
    <div class="wrapper">
        <h1>ADD Category</h1>
        <!-- go to manage-category file and give this page link vaha par jaha add category ka button and href h -->

        <br> <br>

        <!-- adding of categories start here -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title :</td>

                    <td><input type="text" name="title" placeholder="category title"></td>
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
                        <input type="submit" name="submit" value="Add category" class="btn-secondary">

                    </td>
                </tr>
            </table>
</form>

<?php
// check button clicked
if(isset($_POST['submit']))
{
    $title= $_POST['title'];
    
   

 // for radio input we need to check whether the button is selected or not
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

 // check whether image is selected

//  print_r($_FILES['image']);

//  die();

// if($_FILES['pic']){
//     $file_name = $_FILES['image']['name'];

//     // Extracting The Extension
//     // $data = explode('.',$file_name);
//     // $ext = strtolower(end($data));

    

//     $image_name = $_FILES['image']['name'];
//     $source =$_FILES['image']['tmp_name'];
//     $destination = "./images/users/$image_name";
//     move_uploaded_file($source,$destination);
// }

 if(isset($_FILES['image']['name']))
 {
    // Upload the image
    // To upload image we need name, source and destination path
    $image_name= $_FILES['image']['name'];
    // echo $image_name;
    // die();


    // Auto Rename image
    // GET the extension of image (jpg,png,gif) eg. food.jpg
    $ext= end(explode('.', $image_name));

    // RENAME THE IMAGE
    $image_name="food_category_".rand(000,999).'.'.$ext;

    $source_path= $_FILES['image']['tmp_name'];

    $destination_path= "../images/category/".$image_name;

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
   else{
    // else mein dont upload the image
    $image_name="";
 }

//  2. WRITE SQL QUERY TO INSERT DATA 
$sql = "INSERT INTO tbl_category SET
title='$title',
image_name='$image_name',
featured='$featured',
active='$active'
";

$res=mysqli_query($conn,$sql);

if($res==true)
{
    header('location:'.SITEURL.'admin/manage-category.php');
}
}

?>
    </div>
</div>

