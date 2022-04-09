<?//begin check user
    if(!empty($_SESSION['user'])){
?>
<?
  if(isset($_POST['add'])){
     $name = $_POST['name'];
     $content = $_POST['content'];
     $price = $_POST['price'];
     $file = $_POST['file'];
     //  uploading image
      if(isset($_FILES["file"]) && $_FILES['file']['error'] == 0){
          $allowed = ["jpg" => "image/jpg","jpeg" => "image/jpeg","png" => "image/png","JPG" => "image/jpg",
          "JPEG" => "image/jpg"];
          $fileName = $_FILES['file']['name'];
          $fileType = $_FILES['file']['type'];
          $fileSize = $_FILES['file']['size'];

          $ext = pathinfo($fileName, PATHINFO_EXTENSION);
          if(!array_key_exists($ext,$allowed)){
              $error = "Put image in allowed format !";
          }
          $maxSize = 2 * 1024 * 1024;
          if($fileSize > $maxSize){
              $error = "Uploaded image size is larger !";
          }
          if(in_array($fileType,$allowed)){
              if(file_exists("uploaded_image/".$fileName)){
                  $_SESSION['m'] = 'File already uploaded --'.$fileName;
                  $_SESSION['m_code'] = "error";
              }else{
                  move_uploaded_file($_FILES["file"]["tmp_name"],"uploaded_image/".$fileName);
                  $_SESSION['m'] = 'Your product added successfully , soon Our admon review it , then published';
                  $_SESSION['m_code'] = "success";
                  $path = "uploaded_image/".$fileName;
                  $m = 1;
                  $user_id = $_SESSION['id'];
                  $created_at = date("Y-m-d");
                  $adding = "INSERT INTO products (`name`,`content`,`price`,`image`,`user_id`,`m`,`created_at`)
                  VALUES ('$name','$content','$price','$path','$user_id','$m','$created_at')";
                  $result = mysqli_query($connection,$adding); 
                  header("Location:product.php");
              }
          }else{
              $error = "Error occured";
          }
      }
   }

?>
<?  //ending check a user
    }else{
        header("Location: error.php");
    }
    //ending check a user
?>