<?php
require_once('./dao/productDAO.php');
$productDAO = new productDAO();
$product = $productDAO->getProduct();
?>
<script>
var product = <?php echo json_encode($product); ?>;
product = JSON.parse(product);
</script>

<html lang="en">
    <head>
        <title>Palace Culture Store | Product Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet"  href="css/product.css">
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/productDetailPage.js"></script>
    </head>
<body>
    <?php include 'header.html';?>
    <!-- edit the main part -->
    <div class="product">
        <div class="container" id="mainPart">
            <!-- picture display -->
            <div class="pictures">
                <div id="wrapper">
                    <div class="content">
                        <ul class="imgs">
                            <li class="img" id = "displayImage1" style="display: none;"><img id="image1" alt="Bracelet" width="600" height="600"></li>
                            <li class="img" id = "displayImage2" style="display: none;"><img id="image2" alt="Bracelet" width="600" height="600"></li>
                            <li class="img" id = "displayImage3" style="display: block;"><img id="image3" alt="Bracelet" width="600" height="600"></li>
                        </ul>
                    </div>
                    <ul class="dots">
                        <li class="quiet"><img class="dot_img" id="image4" alt="Bracelet" width="200" height="200"></li>
                        <li class="quiet"><img class="dot_img" id="image5" alt="Bracelet" width="200" height="200"></li>
                        <li class="active"><img class="dot_img" id="image6" alt="Bracelet" width="200" height="200"></li>
                    </ul>
                </div>
            </div>
            <!-- description part -->
            <div class="description">
                <h1 id="title"></h1>
                <h2>$ <span id="price"></span></h2>
                <div id="rating" class="rating">
                </div>
                <p class="calPrice">Total Price: </p>
                <h3>$<input type="text" id="tPrice" value="0"></h3>
                <div class="quantity-button">
                    <input type="button" id="sub" value="-" onclick="subs">
                    <input type="text" class="inputNum" id="textNum" value="0">
                    <input type="button" id="plus" value="+" onclick="plus">
                    <input type="button" id="button" value='Add to Cart' />
                </div>　
                <p id="descriptions"></p>                        
            </div>
        </div>
    </div>     
    <!-- footer bar -->
    <?php include 'footer.html';?>
    
</body>
</html>
