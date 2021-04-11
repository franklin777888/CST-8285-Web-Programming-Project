
window.onload=function(){
    if(product!=""){
        //function to display title, price, quantity and total price
        document.querySelector('#title').innerHTML = product.productName;
        document.querySelector('#price').innerHTML = product.productPrice;
        document.getElementById("sub").setAttribute("disabled", "disabled");
        document.getElementById("plus").addEventListener("click", plus);
        document.getElementById("sub").addEventListener("click", subs);
        //function to display rating stars
        var rateStars = "";
        for(let i=0;i<product.productRating;i++){
            rateStars +="<span class =\"fa fa-star checked\"></span>";
        }
        
        document.querySelector('#rating').innerHTML = rateStars;

        //function to display product descriptions and images
        document.querySelector('#descriptions').innerHTML = product.productDescription;
        document.querySelector('#image1').src = product.productImage1;
        document.querySelector('#image2').src = product.productImage2;
        document.querySelector('#image3').src = product.productImage3;
        document.querySelector('#image4').src = product.productImage1;
        document.querySelector('#image5').src = product.productImage2;
        document.querySelector('#image6').src = product.productImage3;
    }
    
    var dotsImages=document.getElementsByClassName("dots")[0].children;
    var imgs = document.getElementsByClassName("imgs")[0].children;
    for (let i = 0; i < dotsImages.length; i++) {
          dotsImages[i].onclick = function () {
              for (let j = 0; j < dotsImages.length; j++) {
                  imgs[j].style.display = 'none';
                  dotsImages[j].className = "quiet";
              }
              dotsImages[i].className="active";
              imgs[i].style.display = 'block';
          }
    }

}

//function to display the total price
var totalPrice = 0;
var valueCount = 0;
//function to calculate the total price
function priceTotal() {
    var unitPrice = document.querySelector('#price').innerHTML;
    var count = document.getElementsByClassName("inputNum")[0].value;
    totalPrice = Number(count) * unitPrice;
    document.getElementById("tPrice").value = totalPrice.toFixed(2);
}
//function for plus button
function plus() {
    valueCount++;
    document.getElementById("textNum").value = valueCount;
    if (valueCount >= 1) {
        document.getElementById("sub").removeAttribute("disabled")
        document.getElementById("plus").classList.remove("disabled")
    }
    priceTotal();
}
// function for subs button
function subs() {
    valueCount--;
    document.getElementById("textNum").value = valueCount;
    if (valueCount == 0) {
        document.getElementById("sub").setAttribute("disabled", "disabled")
    }
    priceTotal();
}


 


 