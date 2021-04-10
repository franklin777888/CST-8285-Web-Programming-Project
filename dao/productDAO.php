<?php
require_once('abstractDAO.php');
require_once('./model/product.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productDAO
 *
 * @author Matt
 */
class productDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    
    /*
     * Returns an array of <code>products</code> objects. If no product exist, returns false.
     */
    public function getProducts(){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM product');
        $products = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $product = new Product($row['productID'],
                                        $row['productName'],
                                        $row['productCatalog'],
                                        $row['productPrice'],
                                        $row['productDescription'],
                                        $row['productRating'],
                                        $row['productImage1'],
                                        $row['productImage2'],
                                        $row['productImage3'],
                                        $row['productDate']);
                $products[] = $product;
            }
            $result->free();
            return $products;
        }
        $result->free();
        return false;
    }
    
    
    /*
     * Returns an array of <code>products</code> objects. If no product exist, returns false.
     */
    public function getProductsByTerm(){
        $term = $_GET["search"];
        $productsSearchByTerm = array();
        if($term!=""){
            $productsSearchByCategory = $this->getProductsByCategory($term);
            array_push($productsSearchByTerm,$productsSearchByCategory);
            $productsSearchByName = $this->getProductsByName($term);
            array_push($productsSearchByTerm,$productsSearchByName);
            
            if(count($productsSearchByTerm)==0){
                echo "<h2> No result found. </h2>";
                $productsSearchByTerm = $this->getProducts();
            }
        }
        else {
            $productsSearchByTerm = $this->getProducts();
        }

        return $productsSearchByTerm;
    }
    
        /*
     * Returns an array of <code>products</code> objects. If no product exist, returns false.
     */
    public function getProductsByCategory($category){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM product WHERE productCatalog = '.$category);
        $products = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $product = new Product($row['productID'],
                                        $row['productName'],
                                        $row['productCatalog'],
                                        $row['productPrice'],
                                        $row['productDescription'],
                                        $row['productRating'],
                                        $row['productImage1'],
                                        $row['productImage2'],
                                        $row['productImage3'],
                                        $row['productDate']);
                $products[] = $product;
            }
            $result->free();
            return $products;
        }
        $result->free();
        return false;
    }
    
        /*
     * Returns an array of <code>products</code> objects. If no product exist, returns false.
     */
    public function getProductsByName($name){
        //The query method returns a mysqli_result object
        $result = $this->mysqli->query('SELECT * FROM product WHERE productName = '.$name);
        $products = Array();
        
        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
                //Create a new employee object, and add it to the array.
                $product = new Product($row['productID'],
                                        $row['productName'],
                                        $row['productCatalog'],
                                        $row['productPrice'],
                                        $row['productDescription'],
                                        $row['productRating'],
                                        $row['productImage1'],
                                        $row['productImage2'],
                                        $row['productImage3'],
                                        $row['productDate']);
                $products[] = $product;
            }
            $result->free();
            return $products;
        }
        $result->free();
        return false;
    }
    
    /*
     * Returns a specific product by search its productID. If no product exist, returns false.
     */
    public function getProduct($product){
        $query = 'SELECT * FROM product WHERE productID = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $productID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $employee = new Product($temp['productID'],
                                    $temp['productName'],
                                    $temp['productCatalog'],
                                    $temp['productPrice'],
                                    $temp['productDescription'],
                                    $temp['productRating'],
                                    $temp['productImage1'],
                                    $temp['productImage2'],
                                    $temp['productImage3'],
                                    $temp['productDate']);
            $result->free();
            return $product;
        }
        $result->free();
        return false;
    }

    public function addProduct($product){
        if(!is_numeric($product->getProductID())){
            return 'ProductId must be a number.';
        }
        if(!$this->mysqli->connect_errno){
            $query = 'INSERT INTO product VALUES (?,?,?,?,?,?,?,?,?,?)';
            $stmt = $this->mysqli->prepare($query);
            //The first parameter of bind_param takes a string
            //describing the data. In this case, we are passing 
            //three variables: an integer(employeeId), and two
            //strings (firstName and lastName).
            //
            //The string contains a one-letter datatype description
            //for each parameter. 'i' is used for integers, and 's'
            //is used for strings.
            $date = date("Y-m-d");
            $stmt->bind_param('ssdssssss', 
                    $product->getProductName(), 
                    $product->getProductCatalog(),
                    $product->getProductPrice(), 
                    $product->getProductDescription(), 
                    $product->getProductRating(),
                    $product->getProductImage1(), 
                    $product->getProductImage2(), 
                    $product->getProductImage3(),
                    $date);
            //Execute the statement
            $stmt->execute();
            //If there are errors, they will be in the error property of the
            //mysqli_stmt object.
            if($stmt->error){
                return $stmt->error;
            } else {
                return $product->getProductName() . ' ' . $product->getProductCatalog() . ' added successfully!';
            }
        } else {
            return 'Could not connect to Database.';
        }
    }
    
    public function deleteProduct($productID){
        if(!$this->mysqli->connect_errno){
            $query = 'DELETE FROM product WHERE productID = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('i', $productID);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    
    public function editProduct($productID, $productName, $productCatalog, $productPrice, $productDescription, $productRating, $productImage1, $productImage2, $productImage3, $productDate){
        if(!$this->mysqli->connect_errno){
            $query = 'UPDATE product SET productName = ?, productCatalog = ?, productPrice = ?, productDescription = ?, productRating = ?, productImage1 = ?, productImage2 = ?, productImage3 = ?, productDate = ? WHERE employeeId = ?';
            $stmt = $this->mysqli->prepare($query);
            $stmt->bind_param('ssi', $firstName, $lastName, $employeeId);
            
            $stmt->bind_param('ssdssssssi', $productName, $productCatalog, $productPrice, $productDescription, $productRating, $productImage1, $productImage2, $productImage3, $productDate, $productID);
            $stmt->execute();
            if($stmt->error){
                return false;
            } else {
                return $stmt->affected_rows;
            }
        } else {
            return false;
        }
    }
    
    public function showProductInSmallBlock($product){
        echo "<div class=\"product\">";
        echo "<a href=\"Product-detail.php\?id=". $product->getProductId() ."\">
            <img class=\"img\" src=\"" . $product->getProductImage1() ."\" alt=\"lipstick03\"> </a>" . "<br>";
        echo "<p class=\"productPrice\">$" . $product->getProductPrice() . "</p>";
        
        $rateStars = "";
        for($i=0;$i<$product->getProductRating();$i++){
            $rateStars .="<span class =\"fa fa-star checked\"></span>";
        }
        $rateLine = "<p>" . $rateStars . "</p>";
        $nameLine = "<h4>" . "<a class=\"productName\" href=\"Product-detail.php\?name=". $product->getProductName() . "\">" . $product->getProductName() . "</a>" . " </h4>";
        $divEnd = "</div> ";
        echo $rateLine . $nameLine . $divEnd;
    }
}

?>