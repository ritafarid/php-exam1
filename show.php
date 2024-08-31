
<?php
include 'inc/header.php'; 
require_once 'inc/db.php';
?>



<div class="container my-5">
    <div class="row">
        <?php 
        
        $id = $_GET['id'];
        $query = "SELECT * FROM products where id = $id";
        $result = mysqli_query($connection,$query);
        $product = mysqli_fetch_assoc($result);
        if(!empty($product))
        {
        ?>
        <div class="col-lg-4 mb-3">
            <div class="card">
            <img src="images/<?= $product['img']?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']?></h5>
                    <p class="text-muted"><?php echo $product['price']?> EGP</p>
                    <p class="card-text"><?php echo $product['desc']?></p>
                    <a href="show.php?id=<?php echo $product['id']?>" class="btn btn-primary">Show</a>
                    <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-info">Edit</a>
                    <a href="handlers/handleDelete.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
        <?php 
        }else{?>   <?php }?>
        
    </div>
</div>

<?php include 'inc/footer.php'; ?>