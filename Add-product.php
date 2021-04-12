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
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php include 'header.html';?>
    
    <h1>Add a New Product</h1>
    <?php
    //The abstractDAO and $productDAO will throw exceptions
    //if there is a problem with the database connection.
    //The entire web page is contained in the try block, so
    //if there is any issue, the page does not load, and instead
    //informs the user about the error.
    error_reporting(0);
    try{
        $productDAO = new productDAO();
        //Tracks errors with the form fields
        $hasError = false;
        //Array for our error messages
        $errorMessages = Array();
        //Ensure all three values are set.
        //They will only be set when the form is submitted.
        //We only want the code that adds an employee to 
        //the database to run if the form has been submitted.
        if(isset($_POST['productName']) ||
            isset($_POST['productCatalog']) || 
            isset($_POST['productPrice'])|| 
            isset($_POST['productDescription']) ||
            isset($_POST['productRating']) || 
            isset($_POST['productImage1'])|| 
            isset($_POST['productImage2']) ||
            isset($_POST['productImage3'])){
        
            //We know they are set, so let's check for values
            if($_POST['productName'] == ""){
                $errorMessages['productNameError'] = "Please enter a product name.";
                $hasError = true;
            }

            if($_POST['productCatalog'] == ""){
                $errorMessages['productCatalogError'] = "Please enter a product catalog.";
                $hasError = true;
            }
            
            //product price should be a number
            if(!is_numeric($_POST['productPrice']) || $_POST['productPrice'] == ""){
                $hasError = true;
                $errorMessages['productPriceError'] = 'Please enter a numeric product price.';
            }

            if($_POST['productDescription'] == ""){
                $errorMessages['productDescriptionError'] = "Please enter a product description.";
                $hasError = true;
            }

            if($_POST['productImage1'] == ""){
                $errorMessages['productImage1Error'] = "Please select a product image.";
                $hasError = true;
            }
            if($_POST['productImage2'] == ""){
                $errorMessages['productImage2Error'] = "Please select a product image.";
                $hasError = true;
            }
            if($_POST['productImage3'] == ""){
                $errorMessages['productImage3Error'] = "Please select a product image.";
                $hasError = true;
            }
            if($_POST['productImage1ErrorInput'] != ""){
                $hasError = true;
            }
            if($_POST['productImage2ErrorInput'] != ""){
                $hasError = true;
            }
            if($_POST['productImage3ErrorInput'] != ""){
                $hasError = true;
            }
            if(!$hasError){
                $product = new Product("",$_POST['productName'], $_POST['productCatalog'], $_POST['productPrice'],
                                        $_POST['productDescription'], $_POST['productRating'], 'images/'.$_POST['productImage1'],
                                        'images/'.$_POST['productImage2'], 'images/'.$_POST['productImage3'], date("Y-m-d"));
                $addSuccess = $productDAO->addProduct($product);

                echo '<h3>' . $addSuccess . '</h3>';
            }
            else{
                echo '<h3>Fail to add the product</h3>';
            }
        }
    }catch(Exception $e){
            //If there were any database connection/sql issues,
            //an error message will be displayed to the user.
            echo '<h3>Error on page.</h3>';
            echo '<p>' . $e->getMessage() . '</p>';            
    }
    ?>
    <div class="container">
        <h1> Add New Product </h1>
        <form class="addProduct" name="addProduct" method="post" action="Add-product.php">
            <table>
                <tr>
                    <td>Product Name:</td>
                    <td><input type="text" name="productName" id="productName">
                    <?php 
                    //If there was an error with the productName field, display the message
                    if(isset($errorMessages['productNameError'])){
                            echo '<span style=\'color:red\'>' . $errorMessages['productNameError'] . '</span>';
                          }
                    ?></td>
                </tr>
                <tr>
                    <td>Product Catalog:</td>
                    <td><input name="productCatalog" type="text" id="productCatalog">
                    <?php 
                    //If there was an error with the productCatalog field, display the message
                    if(isset($errorMessages['productCatalogError'])){
                            echo '<span style=\'color:red\'>' . $errorMessages['productCatalogError'] . '</span>';
                          }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td><input type="text" name="productPrice" id="productPrice">
                    <?php 
                    //If there was an error with the productPrice field, display the message
                    if(isset($errorMessages['productPriceError'])){
                            echo '<span style=\'color:red\'>' . $errorMessages['productPriceError'] . '</span>';
                          }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Product Description:</td>
                    <td>
                        <textarea name="productDescription" id="productDescription" rows="8" cols="50"></textarea>
                        <?php 
                        //If there was an error with the productDescription field, display the message
                        if(isset($errorMessages['productDescriptionError'])){
                                echo '<span style=\'color:red\'>' . $errorMessages['productDescriptionError'] . '</span>';
                              }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Product Rating:</td>
                    <td>
                        <select name ="productRating" id="productRating">
                        <option value ="5">5</option>
                        <option value ="4">4</option>
                        <option value ="3">3</option>
                        <option value ="2">2</option>
                        <option value ="1">1</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Product Image1</td>
                    <td>
                        <input type="file" accept="image/*" id="productImage1" name="productImage1"/>
                        <input type="hidden" id="productImage1ErrorInput" name="productImage1ErrorInput"/>
                        <?php 
                        //If there was an error with the productRating field, display the message
                        if(isset($errorMessages['productImage1Error'])){
                            echo '<span style=\'color:red\' id=\'productImage1Error\'>' . $errorMessages['productImage1Error'] . '</span>';
                        }
                        ?>
                        <span style='color:red' id='productImage1Error2' name='productImage1Error2'/>
                        <span style='color:green' id='productImage1UpdatedMessage'/>
                    </td>
                    <td>
                        <input type="button" name="uploadButton" id="uploadButton" value="Upload Pictures" onclick="uploadFile(1);">
                    </td>
                </tr>
                <tr>
                    <td>Product Image2</td>
                    <td>
                        <input type="file" accept="image/*" id="productImage2" name="productImage2"/>
                        <input type="hidden" id="productImage2ErrorInput" name="productImage2ErrorInput"/>
                        <?php 
                        //If there was an error with the productRating field, display the message
                        if(isset($errorMessages['productImage2Error'])){
                            echo '<span style=\'color:red\' id=\'productImage2Error\'>' . $errorMessages['productImage2Error'] . '</span>';
                        }
                        ?>
                        <span style='color:red' id='productImage2Error2' name='productImage2Error2'/>
                        <span style='color:green' id='productImage2UpdatedMessage'/>
                    </td>
                    <td>
                        <input type="button" name="uploadButton" id="uploadButton" value="Upload Pictures" onclick="uploadFile(2);">
                    </td>
                </tr>
                <tr>
                    <td>Product Image3</td>
                    <td>
                        <input type="file" accept="image/*" id="productImage3" name="productImage3"/>
                        <input type="hidden" id="productImage3ErrorInput" name="productImage3ErrorInput"/>
                        <?php 
                        //If there was an error with the productRating field, display the message
                        if(isset($errorMessages['productImage3Error'])){
                            echo '<span style=\'color:red\' id=\'productImage3Error\'>' . $errorMessages['productImage3Error'] . '</span>';
                        }
                        ?>
                        <span style='color:red' id='productImage3Error2' name='productImage3Error2'/>
                        <span style='color:green' id='productImage3UpdatedMessage'/>
                    </td>
                    <td>
                        <input type="button" name="uploadButton" id="uploadButton" value="Upload Pictures" onclick="uploadFile(3);">
                    </td>
                </tr>
                <tr>
                    <td class="submitButton"><input type="submit" name="btnSubmit" id="btnSubmit" value="Add Product"></td>
                    <td><input type="reset" name="btnReset" id="btnReset" value="Reset"></td>
                </tr>
            </table>
        </form>
    </div>
    <?php include 'footer.html';?>
    <!-- Footer End-->
    
    <!-- using bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="js/fileUpload.js"></script>
</body></html>