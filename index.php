<?
session_start();
?>

<!-- begining connection -->
<?
   include 'server/database.php';
   ?>

<?
 $query = "SELECT * FROM   products  WHERE status = '2' ORDER BY id DESC ";  
 $result = mysqli_query($connection, $query); 
 for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>
<?
 include 'inc/header.php';
 ?>
<div class="container">
    <?
include 'inc/nav.php';
?>

    <div
        id="carouselExampleControls"
        class="carousel slide"
        data-bs-ride="carousel">
        <div class="carousel-inner vhimage">
            <div class="carousel-item active">
                <img src="image/MR-Future-Products-2020-2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item ">
                <img src="image/shopping.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/online-shopping-products.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/product.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/sell-your-product-online.jpg" class="d-block w-100" alt="...">
            </div>

        </div>
        <a
            class="carousel-control-prev"
            href="#carouselExampleControls"
            role="button"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a
            class="carousel-control-next"
            href="#carouselExampleControls"
            role="button"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <h1 class="text-center text-info my-2">
        <i class="fa fa-product-hunt"></i>
        Products</h1>
    <div class="row">
        <?
        foreach($data as $product){?>
        <div class="col-12 col-md-4 mt-4 ">
            <div class="card h-100">
                <img
                    style="width: auto;"
                    src="<?=$product['image']?>"
                    class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$product['name']?>
                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                    </h5>
                    <p class="card-text">
                        <i class="fa fa-info-circle text-info" aria-hidden="true"></i><?=$product['created_at']?></p>
                    <p class="card-text">
                        <span class="text-primary">Price
                        </span>
                        <strong><?=$product['price']?></strong>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">
                        <i class="fa fa-bell text-info"></i>
                        Last updated
                        <?=$product['created_at']?></small><br>
                    <form action="buy.php" method="post">
                        <input type="hidden" name="id" value="<?=$product['id'];?>">
                        <input type="hidden" name="owner" value="<?=$product['user_id'];?>">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?
        }
      ?>
        <!-- </div> <nav class="py-2 my-3" aria-label="Page navigation example"> <ul
        class="pagination justify-content-center"> <li class="page-item disabled"> <a
        class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a> </li>
        <li class="page-item"> <a class="page-link" href="#">1</a> </li> <li
        class="page-item"> <a class="page-link" href="#">2</a> </li> <li
        class="page-item"> <a class="page-link" href="#">3</a> </li> <li
        class="page-item"> <a class="page-link" href="#">Next</a> </li> </ul> </nav>
        </div>-->
       
    </div>
    <footer class="text-center text-white py-3 my-2" style="background-color: #caced1;">
  <!-- Grid container -->

  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
  </div>
  
  <!-- Copyright -->
</footer>
    <? 
        include 'inc/footer.php';
        ?>
</div>
