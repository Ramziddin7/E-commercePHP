<?
session_start();
?>



<!-- begin checking user -->

<?
    if(!empty($_SESSION['user'])){
?>

<?
include 'server/database.php';
include 'inc/header.php';
?>
<?
  $id = $_GET['id'];

  $delete = "DELETE FROM Signup WHERE id = $id";
  $result = mysqli_query($connection , $delete);
  if($result == true){
      header("Location: index.php");
  }
?>
<?
    }else{
        header("Location: error.php");
    }
?>

