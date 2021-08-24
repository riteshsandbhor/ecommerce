id = document.getElementById('#btn');
const form = document.getElementById('verifyform');

form.onsubmit = (e) =>{
    e.preventDefault();
}

btn.onclick = ()=>{
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "./verifyEmailbackend.php", true);
    xhr.onload = ()=>{
     if(xhr.readyState == XMLHttpRequest.DONE){
         if(xhr.status == 200){
             let data = xhr.response;
             console.log(data);
            // if(data == "success"){
            //     alert('Customer Registered Successfully');
            //     window.location='./login.php';
            // }else{
            //     errortxt.textContent = data;
            //     errortxt.style.display = "block";
            // }
        }
    }
    }
    // Sending data from Ajax to php
    let formData = new FormData(form); //creating new formData
    xhr.send(formData); // sending form data to php
}
