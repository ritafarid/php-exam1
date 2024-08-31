<?php
include 'inc/header.php'; 
require_once 'inc/db.php';
?>


<div class="container my-5">
    <class="row">
        <div class="col-lg-6 offset-lg-3">
        <?php 
      
        $id = $_GET['id'];
        $query = "SELECT * FROM products where id = $id";
        $result = mysqli_query($connection,$query);
        $product = mysqli_fetch_assoc($result);
        if(!empty($product))
        {
        ?>

            <form action="handlers/handleEdite.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name" value="<?=$product['name']?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']?>">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" >Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc" <?php echo $product['desc']?>></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="img">
                </div>

                <div class="col-lg-3">
                <img src="images/<?= $product['img']?>" class="card-img-top">
                        </div>
                        
                <center><a href="index.php" class="btn btn-info">Edit</a></center>
            </form>
            <?php 
        }else{?>   <?php }?>
    
        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>