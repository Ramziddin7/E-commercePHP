<?session_start();
  include 'inc/header.php';
    if(!empty($_SESSION['user'])){
?>
     <!-- begining container -->
        <div class="container">
         <!-- begin navbar -->

        <?
        include 'inc/nav.php';
        ?> 

        <h3 class="text-center text-primary pt-3"> My products</h3>
        <p class="text-center text-info fa-1x"><span class="text-danger">Note</span>: After you upload your product , our admins review this product then it appears on public section ! Be Carryful  !</p>

      <!-- begining connection -->
        <?
        include 'server/database.php';
        ?>

      <?
      $id = $_SESSION['id'];  
      $query = "SELECT * FROM   products WHERE user_id = '$id' ORDER BY id DESC";  
      $result = mysqli_query($connection, $query); 
      for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
      ?>
            <a  href="product_add.php" class="btn btn-success">Add Product</a> 

          <table class="table table-striped my-5 responsive">
         <thead>
              <tr>
                <th>Name</th>
                <!-- <th>Content</th> -->
                <!-- <th>Prise</th> -->
                <th>Image</th>
                <!-- <th>Owner</th> -->
                <!-- <th>created_at</th> -->
                <th>Actions</th>
             </tr>
        </thead>
       <tbody>
         <?
          foreach($data as $product){
        ?>
               <tr>
                <th><?=$product['name'];?></th>
                <!-- <th>100 % quality best</th> -->
                <!-- <th><//?=$product['price'];?></th> -->
                <th>
                  <img style="width: 80px; hieght:80px;object-fit:cover; border-radius:20px; " src="<?=$product['image'];?>" alt="product image">
                </th>
                <!-- <th>Ramziddin</th> -->
                <!-- <th><//?=$product['created_at'];?></th> -->
              <th>
                <a type="submit" name="edit" href="product_edit.php?id=<?=$product["id"];?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                <a  href="product_view.php?id=<?=$product["id"]?>" class="btn btn-outline-success"><i class="fa fa-eye"></i></a>
                <form action="product_delete.php" method="POST">
                  <input type="hidden" name="delete_id"  value="<?=$product["id"]?>">
                  <input type="hidden" name="delete_file" value="<?=$product["image"]?>">
                  <button type="submit" name="delete" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                </form> 
              </th>
            </tr>
         <?
          }
         ?>
       </tbody>
        </table>
  
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