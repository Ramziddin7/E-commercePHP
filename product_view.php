<?
       session_start();
      include 'inc/header.php';
?>
<!-- begin checking user -->
<?
    if(!empty($_SESSION['user'])){
?>
     <!-- begining container -->
        <div class="container">
         <!-- begin navbar -->

        <?
        include 'inc/nav.php';
        ?> 

        <h3 class="text-center text-primary my-3"> My product in public view</h3>

      <!-- begining connection -->
        <?
        include 'server/database.php';
        ?>

      <?
      $getid = $_GET['id'];
      $id = $_SESSION['id'];  
      $query = "SELECT * FROM products WHERE user_id ='$id' and id = '$getid'";  
      
      $result = mysqli_query($connection, $query); 
      $product = mysqli_fetch_assoc($result); 
      ?>
       <a  href="product.php" class="btn btn-success my-3">Back</a> 
      
         <div class="row row-cols-1 row-cols-md-3 g-4">    
         <div class="col">
            <div class="card h-100">
            <img style="width: 350px; hieght:200px;object-fit:cover;border-radius:10px;" src="<?=$product['image'];?>" class="card-img-top" alt="...">
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
         </div>

        </div>
        <!-- ending container -->
        <?
         include 'inc/footer.php';
        ?>
        <?
        }else{
          header("Location: error.php");
       }
        ?>