
<?

if(isset($_SESSION["m"]) & $_SESSION["m"] != ""){
?>
  <script>
  swal({
      title: "<?=$_SESSION["m"];?>",
      // text: "You clicked the button!",
      icon: "<?=$_SESSION["m_code"];?>",
      button: "OK !",
      });
</script>
<?
    unset($_SESSION["m"]);
    session_destroy($_SESSION["m"]);
}
?>

