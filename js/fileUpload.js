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
				document.querySelector('#productImage'+fileNumber+'Error').innerText = '';
                document.querySelector('#productImage'+fileNumber+'ErrorInput').value = '';
            } else {
                document.querySelector('#productImage'+fileNumber+'Error').innerText = this.responseText;
                document.querySelector('#productImage'+fileNumber+'ErrorInput').value = this.responseText;
				document.querySelector('#productImage'+fileNumber+'UpdatedMessage').innerText='';
            }
        }
    }
    upload.send(form);
}
