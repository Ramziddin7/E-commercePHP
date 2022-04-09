<!-- Session staret -->
<?
 session_start();
 if(!empty($_SESSION['user'])){
?>
<?
include 'inc/header.php'
?>

<div class="container">

<!-- begin connection to database -->
<?

   
    include 'server/database.php';

    $id = $_GET['id'];
    $select = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($connection,$select);
    $product = mysqli_fetch_assoc($result);
    //update and add coding included;
    include 'inc/update_product_image.php';          
?>

    <h3 class="bold-500 text-primary py-3 text-center">Update</h3>
    <h6 class="text-danger"><?=$error;?></h6>
    <h6 class="text-success"><?=$success;?></h6>

    <!-- form begin -->
  <form action="product_edit.php?id=<?=$product['id'];?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Product Name </label>
            <input  name="name" value="<?=$product['name'];?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Content </label>
            <input name="content" value="<?=$product['content'];?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Prise </label>
            <input name="price" value="<?=$product['price'];?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Image </label>
            <input name="old_image" value="<?=$product['image'];?>" type="hidden" class="form-control" >
            <input name="image" value="<?=$product['image'];?>" type="file" class="form-control" >
            <input name="id" value="<?=$product['id'];?>" type="hidden" class="form-control">
            <img class="my-2" style="width: 80px; hieght:80px;object-fit:cover; border-radius:20px; " src="<?=$product['image'];?>" alt="product image">
        </div>  
        
    </div>
     <button type="submit" name="update" class="btn btn-primary">Update</button>
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