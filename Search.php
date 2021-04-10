<?php
require_once('./dao/productDAO.php');
?>

<html lang="en">
<head>
	<title>Palace Culture Store</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Using bootstrap frameworks -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/search.js"></script>
	<link rel="stylesheet" href="css/style.css">
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

<!-- edit the filter -->

<div class = "filters">
    <div class ="container">
        <div class ="filterbar"> 
            <div class = "pricef">
               <!-- <label for="price">Price</label> -->
                <label>Price</label>
                <input type="number" id="low-p" min="0" max="999"/> -
                <input type="number" id="high-p" min="0" max="999"/>
				<button onclick="filter('price')">Filter</button>
            </div>
            <div class = "ratingf">
                <label>Rating</label>
                <input type="number" id="low-r" min="0" max="5"/> -
                <input type="number" id="high-r" min="0" max="5"/>
				<button onclick ="filter('rating')">Filter</button>
            </div>
			
            <select name ="sortBy" id="sortBy" onchange="sortProducts(this)">
				<option value ="Defult">Sort By</option>
                <option value ="priceHighToLow">Price from highest to lowest</option>
                <option value ="priceLowToHigh">Price from lowest to hightest</option>
                <option value ="ratingHighToLow">Ratings from hightes to lowest</option>
                <option value ="ratingLowToHigh">Ratings from lowest to highest</option>
            </select>
        </div>   
    </div>   
</div>

<!-- edit the collection list -->
<div class="search">
    <div class="container">
        <div id = "product-list">
            <?php
                $productDAO = new productDAO();
                $productsSearchByTerm = $productDAO->getProductsByTerm();
                if($productsSearchByTerm){
                    foreach ($productsSearchByTerm as $product){
						$productDAO->showProductInSmallBlock($product);
					}  
                }
            ?>
        </div>
    </div>
</div>	 
<br>
<br>

<!-- footer of index page -->
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

</body>
</html>
	
	
	