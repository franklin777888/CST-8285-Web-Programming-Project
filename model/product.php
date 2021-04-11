<?php
	class Product implements JsonSerializable{
		private $productID;
		private $productName;
		private $productCatalog;
		private $productPrice;
		private $productDescription;
		private $productRating;
		private $productImage1;
		private $productImage2;
		private $productImage3;
		private $productDate;
		
		function __construct($productID, $productName, $productCatalog, $productPrice, $productDescription, $productRating, $productImage1, $productImage2, $productImage3, $productDate){
			$this->setProductID($productID);
			$this->setProductName($productName);
			$this->setProductCatalog($productCatalog);
			$this->setProductPrice($productPrice);
			$this->setProductDescription($productDescription);
			$this->setproductRating($productRating);
			$this->setProductImage1($productImage1);
			$this->setProductImage2($productImage2);
			$this->setProductImage3($productImage3);
			$this->setProductDate($productDate);
		}
		
		public function getProductID(){
			return $this->productID;
		}
		
		public function setProductID($productID){
			$this->productID = $productID;
		}
		
		public function getProductName(){
			return $this->productName;
		}
		
		public function setProductName($productName){
			$this->productName = $productName;
		}
		
		public function getProductCatalog(){
			return $this->productCatalog;
		}
		
		public function setProductCatalog($productCatalog){
			$this->productCatalog = $productCatalog;
		}
		
		public function getProductPrice(){
			return $this->productPrice;
		}
		
		public function setproductPrice($productPrice){
			$this->productPrice = $productPrice;
		}
		
		public function getProductDescription(){
			return $this->productDescription;
		}
		
		public function setProductDescription($productDescription){
			$this->productDescription = $productDescription;
		}
		
		public function getProductRating(){
			return $this->productRating;
		}
		
		public function setProductRating($productRating){
			$this->productRating = $productRating;
		}
		
		public function getProductImage1(){
			return $this->productImage1;
		}
		
		public function setProductImage1($productImage1){
			$this->productImage1 = $productImage1;
		}
		
		public function getProductImage2(){
			return $this->productImage2;
		}
		
		public function setProductImage2($productImage2){
			$this->productImage2 = $productImage2;
		}
		
		public function getProductImage3(){
			return $this->productImage3;
		}
		
		public function setProductImage3($productImage3){
			$this->productImage3 = $productImage3;
		}
		
		public function getProductDate(){
			return $this->productDate;
		}
		
		public function setProductDate($productDate){
			$this->productDate = $productDate;
		}
		
		public function jsonSerialize()
		{
			return [
				'productID' => $this->productID,
				'productName' => $this->productName,
				'productCatalog' => $this->productCatalog,
				'productPrice' => $this->productPrice,
				'productDescription' => $this->productDescription,
				'productRating' => $this->productRating,
				'productImage1' => $this->productImage1,
				'productImage2' => $this->productImage2,
				'productImage3' => $this->productImage3,
				'productDate' => $this->productDate
			];
		}
			
	}
?>