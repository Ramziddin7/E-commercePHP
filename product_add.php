<!-- Session staret -->
<?
 session_start();
 if(!empty($_SESSION['user'])){
?>
<?
  include 'inc/header.php';
?>
<div class="container">
<!-- begin connection to database -->
<?
 include 'server/database.php';
 //including upload image php
 include 'inc/upload_product_image.php';
?>

    <h3 class="bold-500 text-primary py-3 text-center">Add Product</h3>
    <h6 class="text-danger"><?=$error;?></h6>
    <h6 class="text-success"><?=$success;?></h6>
<form action="product_add.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Product Name </label>
            <input  name="name" value="<?=$name?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Content </label>
            <input name="content" value="<?=$content?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label"> (begin with $ or just sum)Prise </label>
            <input name="price" value="<?=$price;?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Image </label>
            <input name="file" value="<?=$file?>" type="file" class="form-control" required>
        </div>  
        
    </div>
     <button type="submit" name="add" class="btn btn-primary">ADD</button>
     <a  href="product.php" class="btn btn-outline-dark">Back</a> 
    </form>
</div>
<?
include 'inc/footer.php';
?>
<?
// end checking user
 }else{
    header("Location: error.php");
}
?>