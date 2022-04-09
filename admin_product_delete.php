<?
session_start();
if(!empty($_SESSION['owner']))
{

  include 'server/database.php';

    if(isset($_POST['delete'])){
        $id = $_POST['delete_id'];
        $delete_file = $_POST['delete_file'];
    
        $query = "DELETE FROM products WHERE id = '$id'";
        $query_run = mysqli_query($connection,$query);
    
        if($query_run == true){
            unlink($delete_file); 
            header("Location: admin_product.php");
        }else{
            header("Location: admin_product.php");
        }
    
    }

}else{
    header("Location: error.php");
}
?>