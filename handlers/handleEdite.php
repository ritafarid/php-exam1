<?php 
require_once '../inc/db.php';
if(isset($_POST['submit']) && $_GET['id'])
{
    $errors = [];
    $name = $_POST['name'];
    $description = $_POST['desc'];
    $price = $_POST['price'];
    $id = $_GET['id'];
    
    $query = "SELECT * FROM products where id = $id";
    $result = mysqli_query($connection,$query);
    $oldimage = mysqli_fetch_assoc($result)['img'];
    print_r($oldimage);die();
    if(empty($name))
    {
        $errors[] = "the name is empty";
    }
  
    if(empty($price))
    {
        $errors[] = "the price is empty";
    }

    if(isset($_FILES['images']))
    {
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
        elseif(in_array($ext,['jpg','png','jpeg']))
        {
            $errors[] = "your image should be jpg or png";
        }

    }else{
        $new_name = $oldimage;
    }
    if(empty($errors))
    {
        $query = "UPDATE products set 'name'='$name' , 'desc'='$description' , 'price'='$price' , 'img'='$new_name' where id = $id"; 
        
        $result = mysqli_query($connection,$query);
        if($result)
        {
            $_SESSION['success'] = 'the post is inserted successfully';
            move_uploaded_file($image_tmp_name,'../images/'.$new_name);
            header('location:../index.php');
            exit();
        }
    }
    
}
?>