<?
session_start();
if(!empty($_SESSION['owner']))
{?>
          <!-- begining container -->
          <div class="container">
         <!-- begin navbar -->

       

      <!-- begining connection -->
        <?
        include 'server/database.php';
        ?>

      <? 
      $query = "SELECT * FROM signup ORDER BY id DESC";  
      $result = mysqli_query($connection, $query); 
      for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
      ?>
           

          <table class="table table-striped my-5">
         <thead>
              <tr>
                <th>Name</th>
                <!-- <th>Surname</th> -->
                <!-- <th>Email</th> -->
                <!-- <th>Phone</th> -->
                <th>created_at</th>
                <th>Actions</th>
             </tr>
        </thead>
       <tbody>
         <?
          foreach($data as $product){
        ?>
               <tr>
                <th><?=$product['name'];?></th>
                <!-- <th><//?=$product['surname'];?></th> -->
                <!-- <th><//?=$product['email'];?></th> -->
                <!-- <th><//?=$product['phone'];?></th> -->
                <th><?=$product['created_at'];?></th>
              <th>
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
<?
}else{
    header("Location: error.php");
}
?>