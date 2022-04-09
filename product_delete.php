<?
session_start();
if(!empty($_SESSION['user'])){
    //connect to database
  include 'server/database.php';
?>

<?

if(isset($_POST['delete'])){
    $id = $_POST['delete_id'];
    $delete_file = $_POST['delete_file'];

    $query = "DELETE FROM products WHERE id = '$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run == true){
        unlink($delete_file); 
        header("Location: product.php");
    }else{
        header("Location: product.php");
    }

}

if(isset($_POST['delete_btn_set'])){
    $id = $_POST['delete_id'];
    $delete_file = $_POST['delete_file'];

    $query = "DELETE FROM products WHERE id = '$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run == true){
        unlink($delete_file); 
        header("Location: product.php");
    }else{
        header("Location: product.php");
    }

}
?>
<?
}else{
    header("Location: error.php");
}
?>