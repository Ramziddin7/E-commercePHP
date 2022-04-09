<?
session_start();
include 'server/database.php';
include 'inc/header.php';
?>

<!-- begin checking user -->

<?
    if(!empty($_SESSION['user'])){
?>

<?
   //connection to datbase

   $id = $_SESSION['id'];  
   $query = "SELECT * FROM signup WHERE id='$id'";  
   
   $result = mysqli_query($connection, $query); 
   $user = mysqli_fetch_assoc($result); 

?>
<!-- begining container -->
        <div class="container">
        <!-- begin navbar -->

        <?
        include 'inc/nav.php';
        ?>
        <!-- ending navbar -->
        <!-- user interface -->
        <div class="col">
           <h5 class="text-info my-3">Your Profile</h5>     

          <div class="card  border-success mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-success"><?=$user["name"];?></div>
            <div class="card-body text-success">
                <h5 class="card-title"><?=$user['surname'];?></h5>
                <p class="card-text"><?=$user['phone'];?></p>
            </div>
            <div class="card-footer bg-transparent border-success">
            <a type="submit" name="edit" href="p_edit.php?id=<?=$user["id"];?>" class="btn btn-primary">Edit</a>
            <a type="submit" name="delete" href="logout.php" class="btn btn-danger">logout </a>
            </div>
        </div>
          </div>
        <!-- user interface end -->
        </div>
    <!-- ending container -->
    <!-- start footer -->
    <?
        include 'inc/footer.php';
    ?>
     <?
    }else{
        header("Location: error.php");
    }
    ?>
