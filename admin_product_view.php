<?
  session_start();
  if(!empty($_SESSION['owner']))
{
  include 'inc/header.php';
  include 'server/database.php';
  ?>
<!-- begining container -->
<div class="container">
    <!-- begin navbar -->
    <!-- ending navbar -->

    <h3 class="text-center text-primary mb-3">View</h3>
    <a href="admin_product.php" class="btn btn-success my-3">Back</a>
    <?
      $product_id = $_GET['id'];
      $select = "SELECT * FROM products WHERE id = '$product_id'";
      $product_con = mysqli_query($connection,$select);
      $product = mysqli_fetch_assoc($product_con);
      
    ?>
    <div class="row my-pd-5">
        <div class="col-12 col-sm-12 col-md-6">
            <h3 class=" text-success mb-3">Product</h3>
            <div class="card h-100 pb-3">
                <img src="<?=$product['image'];?>" class="card-img-top responsive" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$product['name'];?></h5>
                    <h6 class="card-title"><?=$product['price'];?></h6>
                    <p class="card-text"><?=$product['content'];?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Published _<?=$product['created_at'];?></small>
                </div>
            </div>
        </div>
        <?
                  $owner = $_GET['owner'];
                  $owner_id = "SELECT * FROM signup WHERE id = '$owner'";
                  $owner_con = mysqli_query($connection,$owner_id);
                  $user = mysqli_fetch_assoc($owner_con);
                  
                ?>
        <div class="col-12 col-sm-12 col-md-6">
            <h3 class=" text-success mb-3">Owner</h3>
            <div class="card  border-success mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-success"><?=$user["name"];?></div>
                <div class="card-header bg-transparent border-success"><?=$user["surname"];?></div>
                <div class="card-header bg-transparent border-success">
                    <a href="tel:<?=$user['phone'];?>" class="card-text"><?=$user['phone'];?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?
         include 'inc/footer.php';
}else{
    header("Location: error.php");
}
   ?>
<!-- ending container -->