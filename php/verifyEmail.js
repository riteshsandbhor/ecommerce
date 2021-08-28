id = document.getElementById('#btn');
const form = document.getElementById('verifyform');
email = document.getElementById('email').value;

form.onsubmit = (e) =>{
    e.preventDefault();
}

btn.onclick = ()=>{
    //Ajax
    btn.classList.toggle('button--loading');
    btn.disabled=true;
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "./verifyEmailbackend.php", true);
    xhr.onload = ()=>{
     if(xhr.readyState == XMLHttpRequest.DONE){
         if(xhr.status == 200){
            btn.disabled=true;
             let data = xhr.response;
             console.log(data);
            if(data == "success"){
                alert('Email is Successfully Send To '+email);
                window.location='./home.php';
            }else{
                alert('Something Went Wrong Error -> '+data);
                window.location='./home.php';
            }
        }
    }
    }

    // Sending data from Ajax to php
    let formData = new FormData(form); //creating new formData
    xhr.send(formData); // sending form data to php
}
