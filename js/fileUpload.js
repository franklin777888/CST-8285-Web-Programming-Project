function uploadFile(fileNumber) {   
    var form = new FormData();
    var picture = document.querySelector('#productImage'+fileNumber).files[0];
    
    form.append('file', picture);

    var upload = new XMLHttpRequest();
    upload.open('POST', 'upload.php');
    upload.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            if(this.responseText == 1) {
                document.querySelector('#productImage'+fileNumber+'UpdatedMessage').innerText = "Image uploaded successfully.";        
            } else {
                document.querySelector('#productImage'+fileNumber+'Error2').innerText = "An error occoured when uploading the image";
                document.querySelector('#productImage'+fileNumber+'ErrorInput').value = "An error occoured when uploading the image";
            }
        }
    }
    upload.send(form);
}
