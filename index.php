<?php
 include 'inc/header.php'; 
 require_once 'inc/db.php';
 ?>



<div class="container my-5">

    <div class="row">
        



    <?php 

    if(isset($_SESSION['success']))
    {
        ?><div class="alert alert-success">
            <?php echo $_SESSION['success'];?>
        </div>
    <?php }
    unset($_SESSION['error']);
    if(isset($_SESSION['error']))
    {
        ?><div class="alert alert-danger">
            <?php echo $_SESSION['error']; ?>
        </div>
    <?php 
    }
    $query = "SELECT * FROM products";
    $result = mysqli_query($connection,$query);
    $products = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if(!empty($products)){
        foreach($products as $product)
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
    }}else{
        ?><h1>there is no data</h1><?php }
        ?>
    </div>

</div>



<?php include 'inc/footer.php'; ?>