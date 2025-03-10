const form = document.getElementById('form');
btn = document.getElementById('btn');
errortxt = document.querySelector(".error-text");

form.onsubmit = (e) =>{
    e.preventdefault();
}

btn.onclick = ()=>{
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "./contactbackend.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                console.log(data);
                if(data == "success"){
                    alert('Form Sent');
                    window.location='./home.php';
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

