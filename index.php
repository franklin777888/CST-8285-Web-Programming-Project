<?php
require_once('./dao/productDAO.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Palace Culture Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Using bootstrap frameworks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- navagation bar -->
    <header class="main-header header-sticky">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="menu-wrapper">
                <div class="logo">
                    <!-- logo inserted here -->
                    <a href="index.php" class="navbar-left "><img class="logo" src="images/logo.jpg"></a>
                </div>
                
                <!-- menu -->
                <div class="collapse navbar-collapse" id="micon">
                    <ul class="nav navbar-nav navbar-right boldnav">
                        <!-- home -->
                        <li>
                            <a href="index.php" id="home">Home</a>
                        </li>
                        <!-- shop-dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">Shop
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="Search.php?search=">Shop All</a>
                                </li>
                                <li>
                                    <a href="Search.php?search=Cups">Cups</a>
                                </li>
                                <li>
                                    <a href="Search.php?search=Accessories">Accessories</a>
                                </li>
                                <li>
                                    <a href="Search.php?search=Cosmetics">Cosmetics</a>
                                </li>
                            </ul>
                        </li>
                        <!-- contact us -->
                        <li>
                            <a href="ContacUs.php">Contact Us</a>
                        </li>
                        <!-- search bar -->
                        <li>
                            <form class="navbar-form navbar-right" id="search_box" action="Search.php" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search">
                                                <a href="Search.php"></a>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <!-- user button -->
                        <li>
                            <a href="signin.php">
                                <span class="glyphicon glyphicon-user"></span>
                            </a>
                        </li>
                        <!-- shopping cart button -->
                        <li>
                            <a href="">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- edit the wrapper -->
    <div class="wrapper">
        <img src="images/banner.png">
    </div>
    <br>
    <br>
    
    <!-- edit the collection list -->
    <div class="container">
        <h1 class="lg-text">CATEGORIES</h1>
        <br>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="picture-container">
                <a href="Search.php?search=Cups">
                    <img class="product-img" src="images/cup.jpg" alt="cup-1">
                </a>
            </div>
            <div class="btns-container">
                <a href="Search.php?search=Cups"><button class="btn btn-primary btn-lg btn-block shop-btn">SHOP CUPS</button></a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="picture-container">
                <a href="Search.php?search=Accessories">
                    <img class="product-img" src="images/accessoires.jpg" alt="collection2">
                </a>
            </div>
            <div class="btns-container">
                <a href="Search.php?search=Accessories"><button class="btn btn-primary btn-lg btn-block shop-btn">SHOP ACCESSORIES</button></a>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
            <div class="picture-container">
                <a href="Search.php?search=Cosmetics">
                    <img class="product-img" src="images/cosmetics.jpg" alt="cosmetics-1">
                </a>
            </div>
            <div class="btns-container">
                <a href="Search.php?search=Cosmetics"><button class="btn btn-primary btn-lg btn-block shop-btn">SHOP COSMETICS</button></a>
            </div>
        </div>
    </div>    
    <br>
    <br>
    <br>
    
    <!-- edit the slider -->
    <div class="container">
        <h1 class="lg-text">NEW ARRIVALS</h1>
        <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/lipstick04.jpg" alt="slide-1">
                </div>
          
                <div class="item">
                    <img src="images/fulushou01.jpg" alt="slide-2">
                </div>
          
                <div class="item">
                    <img src="images/cusion03.jpg" alt="cusion01">
                </div>
            </div>
        
          <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
            
    </div>
    <br>
    <br>
    <br>
    
    
    <!-- edit featured products -->
    <div class="container">
        <h1 class="lg-text">Featured Products</h1>
        <br>
        <div id="feature-product">
            <?php
                $productDAO = new productDAO();
                $products = $productDAO->getProducts();
                if($products){
                    for($x = 0; $x < 3; $x++){
                        $product = $products[$x];
                        $productDAO->showProductInSmallBlock($product);
                    }
                }
            ?>
        </div>
    </div>
    
    <!-- edit subscription-->
    <div class="container">
        <div class="newsletter">
            <div class="row">
                <div class="col-md-6">
                    <h1>Subscribe Our Newsletter</h1>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <input type="email" value="Your email here">
                        <button>Submit</button>
                    </div>
                </div>
            </div>        
        </div>
    </div>

    <!-- edit footer-->
    <footer>
        <div class="gcs-footer">
            <div class="footer-top">
                <a href="#">Twitter</a> |
                <a href="#">Facebook</a> |
                <a href="#">YouTube</a> |
                <a href="#">Instagram</a>
            </div>
            <p>Copyright &copy; Palace Culture</p>
        </div>
    </footer>
    <!-- Footer End-->
    
    <!-- using bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body></html>