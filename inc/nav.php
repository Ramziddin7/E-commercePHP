<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img
                src="image/shopping.jpg"
                alt="Ocean"
                width="50"
                height="24">
        </a>
        <?
       if(empty($_SESSION['user'])){
         ?>
        <div class="d-flex flex-row-reverse bd-highlight ">
            <div class="p-2 bd-highlight">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">
                            <strong>Sign in</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">
                            <strong>Register</strong>
                        </a>
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
                        <a
                            class="nav-link dropdown-toggle"
                            href="index.php"
                            id="navbarDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?
                      //geting user name code
                      include 'server/database.php';
                      $id = $_SESSION['id'];  
                      $query = "SELECT * FROM signup WHERE id='$id'";  
                      
                      $result = mysqli_query($connection, $query); 
                      $user = mysqli_fetch_assoc($result); 
                     
                      echo $user['name'];
                      ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="product.php">My products</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="profile.php">My profile</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="logout.php">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <?
        }
        ?>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                <li class="nav-item">
                    <a class="nav-link" href="team.php"><strong>Developers</strong></a>
                </li>

            </ul>
            <form class="d-flex justify-content-md-center">
                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search </button>
            </form>
            <!-- -->
        </div>
    </div>
</nav>