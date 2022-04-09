<!-- Session staret -->
<?
 session_start();
?>
<!-- checking user  -->
<?
   if(!empty($_SESSION['user'])){
?>

<!-- html begin -->
<?
  include 'inc/header.php';
?>
<div class="container">

<!-- begin connection to database -->
<?
 include 'server/database.php';

        $id = $_GET['id'];
         if(isset($id)){
         //  emailni tekshiramiz bor yoki yo`qligini
         $query = "SELECT * FROM signup WHERE id = $id";  
         $result = mysqli_query($connection, $query); 
         $user = mysqli_fetch_assoc($result);
          //  emailni tikshirish tugadi
         }
    
        if(isset($_POST["edit"])){
            $name    =   $_POST['name'];
            $surname =   $_POST['surname'];
            $phone   =   $_POST['phone'];

            $update = "UPDATE signup SET name = '$name',surname = '$surname',phone = '$phone' WHERE id = $id";
            $all = mysqli_query($connection,$update);
            if($all == true){
                $success = "Successfuly";
                header("Location:profile.php");
            }else
            {
                $error = "Error";
            }          
        } 
    
// navbar
include 'inc/nav.php';
//end navbar
?>
    <h3 class="bold-500 text-primary py-3">Update your profile </h3>
    <h4 class="text-danger"><?=$error;?></h4>
    <h4 class="text-success"><?=$success?></h4>
<form action="p_edit.php?id=<?=$user['id'];?>" method="POST">
    <div class="row">
        <div class="mb-3 col-12 col-sm-12  col-md-4">
            <label  class="form-label">Name </label>
            <input  name="name" value="<?=$user["name"]?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-4">
            <label  class="form-label">Surname </label>
            <input name="surname" value="<?=$user["surname"]?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-4">
            <label  class="form-label">Phone </label>
            <input name="phone" value="<?=$user["phone"];?>" type="number" class="form-control" required>
        </div>
        
    </div>
     <button type="submit" name="edit" class="btn btn-primary">Update</button>
    </form>
</div>
<?
include 'inc/footer.php';
?>

<?
   }else{
    header("Location: error.php");
}
?>
<!-- checking user end -->