<!-- Session staret -->
<?
 session_start();
 $_SESSION['user'] = null;
?>
<?
  include 'inc/header.php';
?>
<div class="container">


<!-- begin connection to database -->
<?
 include 'server/database.php';

 if(isset($_POST['send'])){
     $name = $_POST['name'];
     $surname = $_POST['surname'];
     $email = $_POST['email'];
     $password = md5($_POST['password']);
     $repassword = md5($_POST['repassword']);
     $phone = $_POST['phone'];

    //  emailni tekshiramiz bor yoki yo`qligini
     $query = "SELECT * FROM signup WHERE email= 
     '$email'";  
     $result = mysqli_query($connection, $query); 
     $user = mysqli_fetch_assoc($result); 
    //  emailni tikshirish tugadi
     
     $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
     $validate = preg_match($regex, $email);
     if(!$user){
        if($validate){
            if($password === $repassword){
                $created_at = date("Y-m-d ");
                $adding = "INSERT INTO signup (`name`,`surname`,`email`,`password`,`phone`,`created_at`)
                 VALUES ('$name','$surname','$email','$password','$phone','$created_at')";
                $result = mysqli_query($connection,$adding);
               
                if($result == true){
               
                    // $_SESSION['owner'] = true; 
                    // $_SESSION['ownerlogin'] = true; 
                     $_SESSION['user'] = true; 
                     $id = mysqli_insert_id($connection); 
                     $_SESSION['id'] = $id; 
                     $_SESSION['m'] = 'You have registreded successfully';
                     $_SESSION['m_code'] = "success";
                    header("Location: product.php");
                }else{
                    $_SESSION['m'] = 'Something is wrong';
                    $_SESSION['m_code'] = "error";
                }
            }else{
                $_SESSION['m'] = 'Password is not match each other';
                $_SESSION['m_code'] = "warning";

            }
         }else{
            $_SESSION['m'] = 'Your email is not valid';
            $_SESSION['m_code'] = "warning";

         }
     }else{
        $_SESSION['m'] = 'Email has already been exists ';
        $_SESSION['m_code'] = "error";

     }
 }
    //    navbar
    include 'inc/nav.php';
    //end navbar
?>
    <h3 class="bold-500 text-primary py-3">Registration</h3>
  
    <h6 class="text-danger"><?=$message;?></h6>
    <h6 class="text-success"><?=$success;?></h6>
<form action="register.php" method="POST">
    <div class="row">
        <div class="mb-3 col-12 col-sm-12  col-md-6">
            <label  class="form-label">Name </label>
            <input autocomplete="off"  name="name" value="<?=$name?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-6">
            <label  class="form-label">Surname </label>
            <input autocomplete="off" name="surname" value="<?=$surname?>" type="text" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Email </label>
            <input autocomplete="off" name="email" value="<?=$email;?>" type="email" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-6">
            <label  class="form-label">Password </label>
            <input autocomplete="off" name="password" value="" type="password" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-6">
            <label  class="form-label">Confirm Password </label>
            <input autocomplete="off" name="repassword" value="" type="password" class="form-control" required>
        </div>
        <div class="mb-3 col-12 col-sm-12  col-md-12">
            <label  class="form-label">Phone </label>
            <input autocomplete="off" name="phone" value="<?=$phone;?>" type="number" class="form-control" required>
        </div>
        
    </div>
     <button type="submit" name="send" class="btn btn-primary">Submit</button>
    </form>
</div>

<?
include 'inc/footer.php';
?>