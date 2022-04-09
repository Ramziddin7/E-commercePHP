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
                  $error = "File already uploaded --".$fileName;
              }else{
                  move_uploaded_file($_FILES["file"]["tmp_name"],"uploaded_image/".$fileName);
                  $success = "Product uploaded successfully";

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

   if(isset($_POST['update'])){
       $name = $_POST['name'];
       $content = $_POST['content'];
       $price = $_POST['price'];
       $old_image = $_POST['old_image'];
       $id = $_POST['id'];
       $new_image =  $_FILES['image']['name'];

       if($new_image != ''){
         $update_filename = $_FILES['image']['name'];
       }else{
        $update_filename = $old_image;
       }

       if($_FILES['image']['name'] != ''){

        if(file_exists("uploaded_image/".$_FILES['image']['name'])){
            $filename = $_FILES['image']['name'];
            header("Location: product.php");
        }
       }else{
            $query = "UPDATE products SET name='$name', content='$content',price='$price',image='$update_filename' WHERE id='$id'";
            $query_run = mysqli_query($connection,$query);
        }
        if($query_run){
            if($_FILES['image']['name'] != ''){
                move_uploaded_file($_FILES['image']["tmp_name"],$_FILES['image']['name']);
                unlink($old_image);
            }
            header("Location: product.php");
        }
        else{
            header("Location: product_edit.php");
        }
   }
?>
<?  //ending check a user
    }else{
        header("Location: error.php");
    }
    //ending check a user
?>