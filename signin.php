<?
 session_start();
 $_SESSION['user'] = null;
?>

<?
  include 'inc/header.php';
?>
<!-- connecting to database -->
<?
   include 'server/database.php';

   if(isset($_POST['send'])){
       $email = $_POST['email'];
       $password = md5($_POST['password']);

       $sellecting = "SELECT * FROM signup WHERE `email` = '$email' AND `password` = '$password'";
       $tabel = mysqli_query($connection,$sellecting);
       $each = mysqli_fetch_assoc($tabel);
         if(!empty($each)){ 
             if($each['email'] == 'rustamovramziddin7@gmail.com' && $each['password'] == $password){
                $_SESSION['owner'] = true;  
                //  $_SESSION['id'] = $each['id']; 
                 $message_success = 'Successfully';
                 header("Location: admin.php");
             }elseif($each['email'] == $email && $each['password'] == $password ){
                 $_SESSION['user'] = true;  
                 $_SESSION['id'] = $each['id']; 
                 $message_success = 'Successfully';
                 header("Location: product.php");   
             }else{
                $message_error = 'Login or password incorrect !';
                $_SESSION["m"] = "Something is wrong";
                $_SESSION["m_code"] = "error";
            }
            
         }else{
             
            $message_error = 'Login or password incorrect !';
         }
 }
?>


<div class="container">
    <?
    //  navbar
       include 'inc/nav.php';
    //end navbar
    ?>
    <h2 class="text-center text-danger"><?=$message_error?></h2>
    <h2 class="text-center text-info"><?=$message_success?></h2>
    <form class="my-4" action="signin.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-3 mx-auto">
        <label  class="form-label"><strong>Email</strong> </label>
            <div class="input-group mb-3">
                <input class="form-control" type="email" value="<?=$email;?>"  name="email" required  style="text-align:center">
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-3 mx-auto">
        <label  class="form-label"><strong>Password</strong> </label>
            <div class="input-group mb-3">
                <input autocomplete="off" class="form-control" type="password"  name="password" style="text-align:center" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3 mx-auto">
            <div class="input-group mb-3">
                <input autocomplete="off" class="btn btn-outline-primary" type="submit" value="Sign in" name="send">
            </div>
        </div>
    </div>
    </form>
</div>
<?
  include_once 'inc/footer.php';
?>
