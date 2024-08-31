<?php 
require_once '../inc/db.php';

if(isset($_POST['submit']))
{
    $errors = [];
    $name = $_POST['name'];
    $description = $_POST['desc'];
    $price = $_POST['price'];
    
    if(empty($name))
    {
        $errors[] = "the name is empty";
    }
  
    if(empty($price))
    {
        $errors[] = "the price is empty";
    }
    $image = $_FILES['img'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_error = $image['error'];
    $image_size = $image['size']/(1024*1024);
    $ext = pathinfo($image_name,PATHINFO_EXTENSION);
    
    if(empty($image))
    {
        $errors[] = "you should upload photo";
    }
    elseif($image_error > 0)
    {
        $errors[] = "your file is broken";
    }
    elseif(in_array($ext,['png']))
    {
        $errors[] = "your image should be jpg or png";
    }
    if(empty($errors))
    {
        $query = "INSERT INTO products(`name`,`desc`,`price`,`img`) 
        VALUES ('$name','$desc','$price','$img_name')";
        $result = mysqli_query($connection,$query);
        if($result)
        {
            $_SESSION['success'] = 'the post is inserted successfully';
            move_uploaded_file($image_tmp_name,'../images/'.$image_name);
            header('location:../index.php');
            exit();
        }
    }
    $_SESSION['errors'] = $errors;
    header('location:../add.php');

}
?>