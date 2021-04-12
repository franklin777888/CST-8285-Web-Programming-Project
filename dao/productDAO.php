<?php
require_once('abstractDAO.php');
require_once('./model/product.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of productDAO
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
            $result = $this->mysqli->query('SELECT * FROM product
                                       WHERE LOWER(productCatalog) like LOWER("%'.$term.'%")
                                            OR LOWER(productName) like LOWER("%'.$term.'%")');

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
                    $productsSearchByTerm[] = $product;
                }
            }else{
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
        $result = $this->mysqli->query('SELECT * FROM product
                                       WHERE LOWER(productCatalog) like LOWER("%'.$category.'%")');
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
    public function getProduct(){
        $productID = $_GET["id"];
        $query = 'SELECT * FROM product WHERE productID = ?';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $productID);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $temp = $result->fetch_assoc();
            $product = new Product($temp['productID'],
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
        if(!$this->mysqli->connect_errno){
            $query = 'INSERT INTO product VALUES ("",?,?,?,?,?,?,?,?,DEFAULT)';
            $stmt = $this->mysqli->prepare($query);
            //The first parameter of bind_param takes a string
            //describing the data. In this case, we are passing 
            //three variables: an integer(employeeId), and two
            //strings (firstName and lastName).
            //
            //The string contains a one-letter datatype description
            //for each parameter. 'i' is used for integers, and 's'
            //is used for strings.
            //echo $product->getProductImage3().$product->getProductDate();
            $stmt->bind_param('sssdssss',        
                    $product->getProductName(), 
                    $product->getProductCatalog(),
                    $product->getProductPrice(), 
                    $product->getProductDescription(), 
                    $product->getProductRating(),
                    $product->getProductImage1(), 
                    $product->getProductImage2(), 
                    $product->getProductImage3());
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
}

?>