function uploadFiles(){
    for(var i =1; i<=3; i++){
        uploadFile(i);
    }
}
function uploadFile(fileNumber) {   
    var picture = document.querySelector('#productImage'+fileNumber).files[0];
    var form = new FormData();
    
    form.append('file', picture);


    var upload = new XMLHttpRequest();
    upload.open('POST', 'upload.php');
    upload.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            if(this.responseText == 1) {
                document.querySelector('#productImage'+fileNumber+'UpdatedMessage').innerText = "Image uploaded successfully.";
                
            } else {
                document.querySelector('#productImage'+fileNumber+'Error2').innerText = "An error occoured when uploading the image";
                return;
            }
        }
    };
    upload.send(form);
}
