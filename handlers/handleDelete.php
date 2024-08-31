<?php 
require_once '../inc/db.php';
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id = '$id'";
    $result = mysqli_query($connection,$query);
    if($result)
    {
        $_SESSION['success'] = 'the post is inserted successfully';
        move_uploaded_file($image_tmp_name,'../images/'.$image_name);
        header('location:../index.php');
        exit();
    }
    $_SESSION['error']='the post is not deleted ';
    header('location:../index.php');
}
?>