btn = document.getElementById('payBtn');
btnCod = document.getElementById('payBtnCod');
amount = document.getElementById('amount').value;
const form = document.getElementById('paymentform');
form.onsubmit = (e)=>{
    e.preventDefault();//preventing form from submitting
}

var options = {
    "key": "rzp_live_n2vNENbR845hk3", // Enter the Key ID generated from the Dashboard
    // "key": "rzp_test_vBY5UEWW8EUUGX", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Shetkari To Grahak",
    "description": "Payment",
    "image": "../images/Logo.png",
    "handler": function (response){
        dbhandler(response);
    }
    
};

var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
    alert(response.error.description);
});
btn.onclick = function(){
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "./outofstock.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;

                if(data == "outofstock"){
                    alert('Some items are out of stock.');
                    window.location='./cart.php';
                }else if(data == "success"){
                    rzp1.open();
                }else{
                    alert("Error -> "+data);
                    window.location='./cart.php';
                }
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(form); //creating new formData
    xhr.send(formData); // sending form data to php
}

btnCod.onclick = function(){
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "./placingOrderBackend.php?payment_method=cod&payment_id=COD", true);
    xhr.onload = ()=>{
    if(xhr.readyState == XMLHttpRequest.DONE){
        if(xhr.status == 200){
            let data = xhr.response;
            if(data == "outofstock"){
                alert('Some items are out of stock.');
                window.location='./cart.php';
            }else if(data == "success"){
                alert('Your Order is Placed');
                window.location='./orders.php';
            }else{
                alert(data);
                window.location='./cart.php';
            }
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(form); //creating new formData
    xhr.send(formData); // sending form data to php
}

function dbhandler(res){
    if(res.razorpay_payment_id != null){
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "./placingOrderBackend.php?payment_method=online&payment_id="+res.razorpay_payment_id, true);
        xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "outofstock"){
                    alert('Some items are out of stock.');
                    window.location='./cart.php';
                }else if(data == "success"){
                    alert('Your Order is Placed');
                    window.location='./orders.php';
                }else{
                    alert(data);
                    window.location='./cart.php';
                }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        xhr.send(formData); // sending form data to php
    }else{
        alert("Payment Not Successfull");
        window.location='./cart.php';
    }
}

