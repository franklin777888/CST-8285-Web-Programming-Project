<?php
require_once('./dao/productDAO.php');
$productDAO = new productDAO();
$productsSearchByTerm = $productDAO->getProductsByTerm();
?>

<script>
var productsSearchByTerm = <?php echo json_encode($productsSearchByTerm); ?>;
</script>

<html lang="en">
<head>
	<title>Palace Culture Store | Search</title>
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
    <?php include 'header.html';?>

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
            <select name ="sortBy" id="sortBy" onchange="sortProducts(this);">
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
			<script>displaySearchedProducts(productsSearchByTerm);</script>
        </div>
    </div>
</div>	 
<br>
<br>

<!-- footer of index page -->
    <?php include 'footer.html';?>

</body>
</html>
	
	
	