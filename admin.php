<?
session_start();
if(!empty($_SESSION['owner']))
{
 ?>
 <?
    include 'inc/header.php'; 
    include 'server/database.php'; 
?>
<div class="container">
     <!-- begin nav -->
    
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="admin.php">
      <img src="data:image/jpeg;base64,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" alt="Ocean" width="50" height="24">
    </a>
    <?
       if(empty($_SESSION['owner'])){
         ?>
           <div class="d-flex flex-row-reverse bd-highlight ">
            <div class="p-2 bd-highlight">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                      <a class="nav-link" href="signin.php"><strong>Sign in</strong> </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="register.php"><strong>Register</strong></a>
                    </li>
                </ul>
            </div>
       </div>

        <?
        }else{
        ?>
           <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="admin.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="admin_product.php">Products</a></li>
                  
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
       </div>
        <?
        }
        ?>
       
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
   
      </ul> -->
      <form class="d-flex justify-content-md-center">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
     <!--  -->
    </div>
  </div>
</nav>
       
     <!-- ending nav -->




    <h1 class="text-center text-info py-2"> Admin LTE</h1>
     <a href="admin_product.php" class="btn btn-primary"> <i class="fa fa-product-hunt"></i>Products</a>
     <!-- <a href="admin.user.php" class="btn btn-primary">Users</a>/ -->
      <h3 class="text-info text-center">Users</h3>

   <?
     include 'admin.user.php';
   ?>

  <?
     include 'inc/footer.php'; 
  ?>
</div>

<!-- ending user check -->
 <?
}else{
   header("Location: Error.php");
}
?>