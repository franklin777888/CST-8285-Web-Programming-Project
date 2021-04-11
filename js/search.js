// display feature products in the index page
// select products from first 3 items in the array
function displayFeatureProducts(products){
    for(let i=0; i<3; i++){
        document.write(productDetails(products[i]));
    }
}

// display certain products in the search page
function displaySearchedProducts(products){
    for(let product of products){
        document.write(productDetails(product));
    }
}

// function to sort products
function sortProducts(arg) {
    if (arg.value == 'priceHighToLow') {
        productsSearchByTerm.sort(function(a,b){
            return b.productPrice - a.productPrice;
        });
    }else if (arg.value == 'priceLowToHigh') {
        productsSearchByTerm.sort(function(a,b){
            return a.productPrice - b.productPrice;
        });
    }else if (arg.value == 'ratingHighToLow') {
        productsSearchByTerm.sort(function(a,b){
            return b.productRating - a.productRating;
        });
    }else if (arg.value == 'ratingLowToHigh') {
        productsSearchByTerm.sort(function(a,b){
            return a.productRating - b.productRating;
        });
    }
    var SortedHTML="";
    for(let product of productsSearchByTerm){
        SortedHTML+=productDetails(product);
    } 
    document.getElementById("product-list").innerHTML=SortedHTML;
    
}
    
// function to filter products
function filter(field) {
    let filteredResult= [];
    if (field == 'price') {
        let low = +document.querySelector('#low-p').value || 0;
        let high = +document.querySelector('#high-p').value || 9999999;
        document.querySelector('#low-r').value ='';
        document.querySelector('#high-r').value = '';
        for(let product of productsSearchByTerm){
            if((product.productPrice+0) >= low && (product.productPrice+0)<= high){
                filteredResult.push(product);
            }
        } 
    } else if (field == 'rating') {
        let low = document.querySelector('#low-r').value || 0;
        let high = document.querySelector('#high-r').value || 5;

        document.querySelector('#low-p').value = '';
        document.querySelector('#high-p').value = '';
        
        for(let product of productsSearchByTerm){
            if(product.productRating >= low && product.productRating<= high){
                filteredResult.push(product);
            }
        } 
    }
    SortedHTML="";
    for(let product of filteredResult){
    SortedHTML+=productDetails(product);
    } 
    document.getElementById("product-list").innerHTML=SortedHTML;
}


function productDetails(product){
    var divStart = "<div class=\"product\">";
    var imageLine = "<a href=\"Product-detail.php\?id="+ product.productID +"\"><img class=\"img\" src=\"" + product.productImage1 +"\" alt=\"lipstick03\"> </a>" + "<br>";
    var priceLine = "<p class=\"productPrice\">$" + product.productPrice + "</p>";
    
    var rateStars = "";
    for(var i=0;i<product.productRating;i++){
        rateStars +="<span class =\"fa fa-star checked\"></span>";
    }
    var rateLine = "<p>" + rateStars + "</p>";
    var nameLine = "<h4>" + "<a class=\"productName\" href=\"Product-detail.php\?name="+ product.productName + "\">" + product.productName + "</a>" + " </h4>";
    var divEnd = "</div> ";
    return (divStart + imageLine + priceLine + rateLine + nameLine + divEnd);
}