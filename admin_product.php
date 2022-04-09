
<?
session_start();
if(!empty($_SESSION['owner']))
{
    include 'inc/header.php';
 ?>
 <div class="container">
     <h3 class="text-center text-info">All products</h3>

       <!-- begining connection -->
       <?
        include 'server/database.php';
        ?>

      <?  
      $query = "SELECT * FROM products ORDER BY id DESC";  
      $result = mysqli_query($connection, $query); 
      for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
      ?>
       <a href="admin.php" class="btn btn-outline-dark">Back</a>
          <table class="table table-striped my-5">
         <thead>
              <tr>
                <th>Name</th>
                <!-- <th>Content</th> -->
                <!-- <th>Prise</th> -->
                <!-- <th>Image</th> -->
                <!-- <th>created_at</th> -->
                <th>Stuation</th>
                <!-- <th>Choose</th> -->
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
                <!-- <th><?=$product['price'];?></th> -->
                <!-- <th>
                  <img style="width: 80px; hieght:80px;object-fit:cover; border-radius:20px; " src="<//?=$product['image'];?>" alt="product image">
                </th> -->
                <!-- <th><//?=$product['created_at'];?></th> -->
                <?
                 if($product['m'] == 1){?>
                <th class="text-danger"> Not active</th>
                <?
                 }elseif($product['m'] == 2){
                  ?>
                   <th class="text-info">Active</th>
                  <?   
                 }
                ?>

                <!-- <th>Ramziddin</th> -->
            
              <th>
                  <form action="admin_product_edit.php" method="POST">
                    <select class="form-control" name="m" id="">
                      <option value="2">Publish</option>
                      <option value="1">Don't publish</option>

                    </select>
                    <input type="hidden" value="<?=$product['id']?>" name="product_id" id="">
                    <button  class="btn btn-outline-primary mt-3" type="submit" name="edit"> <i class="fa fa-plus"></i></button>
                  </form>
                  <a class="btn btn-primary" href="admin_product_view.php?id=<?=$product['id'];?>&owner=<?=$product['user_id'];?>"> <i class="fa fa-eye"></i></a>
              </th>
              <th>

                 <form action="admin_product_delete.php" method="POST">
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
 <?
}else{
  header("Location: error.php");
}
?>