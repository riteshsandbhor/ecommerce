const form = document.getElementById('form');
btn = document.getElementById('btn');
errortxt = document.querySelector('.error-text');

form.onsubmit = (e)=>{
    e.preventDefault();//preventing form from submitting
}

btn.onclick = ()=>{
    //Ajax
    btn.classList.toggle('button--loading');
    btn.disabled = true;
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "./forgotPasswordBackend.php", true);
    xhr.onload = ()=>{
     if(xhr.readyState == XMLHttpRequest.DONE){
         if(xhr.status == 200){
             let data = xhr.response;
            if(data == "success"){
                alert('Email Sent!');
                window.location='./forgotpassword.php';
            }else{
                errortxt.textContent = data;
                errortxt.style.display = "block";
            }
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(form); //creating new formData
    xhr.send(formData); // sending form data to php
}
btn.disabled = false;