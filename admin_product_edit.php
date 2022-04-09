<?
session_start();
if(!empty($_SESSION['owner']))
{
   
    include 'server/database.php';
   if(isset($_POST['edit'])){
    $m = $_POST['m'];
    $product_id = $_POST['product_id'];
    $query = "UPDATE products SET m = '$m' WHERE id = '$product_id'";
    $query_run = mysqli_query($connection,$query);
    if($query_run == true){
        header("Location: admin_product.php");
    }else{
        
    }
   }
    
}else{
    header("Location: error.php");
}
?>