<?php
include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'dbconn.php';
session_start();
if(isset($_COOKIE['user'])){
  $cookie = $_COOKIE['user'];
  $sqln = mysqli_query($con, "SELECT * FROM customer WHERE cookie = '{$cookie}'");
  if(mysqli_num_rows($sqln) > 0){
    $rown = mysqli_fetch_assoc($sqln);
    if($cookie == $rown['cookie']){
      $id = $rown['c_id'];
      $_SESSION['Custid'] = $id;
      $_SESSION['logintype'] = "1";
    }
  }
}
if (isset($_SESSION['Custid'])) {
  $id=$_SESSION['Custid'];
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <link rel="icon" href="../images/circle.png">
  <link rel="manifest" href="webmanifest.json">
  <style>
    .d-block{
      height: 450px;
      width: auto;
    }
    .carousel-item-next, .carousel-item-prev, .carousel-item.active {
      display: flex !important; 
      justify-content: center !important; 
    }
    .carousel-control-next-icon, .carousel-control-prev-icon{
      filter: invert(100%);
    }
  </style>
</head>
<body>

  <?php
    include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'header.php';
   ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img class="d-block " src="../images/banner1.jpeg" alt="First slide">
    </div>
    <div class="carousel-item" >
      <img class="d-block " src="../images/banner2.jpeg" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

      <div class="pag">
     <p class="pagehead"> <?php echo lang('products')?></p>
     </div>
   <div style="margin:auto;width:70%;">
   <div class="row">
   <div class="col" style="margin: auto;">
  <p class="languages"><a href="?lang=english">English</a> | <a href="?lang=marathi">मराठी</a> | <a href="?lang=hindi">हिन्दी</a></p>
</div>

<div class="col">

  <div class="cont text-center">
    <select class="form-control sort customselect classic" name="sortby" onChange="ruralSelected()" id="sort">
      <option value="" selected disabled>Sort</option>
      <option value="1">Alphabetical: A-Z</option>
      <option value="2">Alphabetical: Z-A</option>
      <option value="3">Price: Low to High</option>
      <option value="4">Price: High to Low</option>
    </select>
  </div>
</div>

<div class="col">
  <div class="cont text-center">
    <select class="form-control category customselect classic" name="category" onChange="ruralSelected()" id="category">
      <option value="0" selected><?php echo lang('all')?></option>
      <?php
        $query=mysqli_query($con,"SELECT * FROM category");
        $rowcount=mysqli_num_rows($query);
        for($i=1;$i<=$rowcount;$i++)
        {
          $row=mysqli_fetch_array($query);
        ?>
      <option value="<?php echo $row["id"] ?>" ><?php echo lang($row["name"]) ?></option>
      <?php
        }
      ?>
    </select>
    <!-- <select class="form-control category customselect classic" name="category" onChange="ruralSelected()" id="category">
      <option value=""  disabled>Category</option>
      <option value="1" selected>Vegetables</option>
      <option value="2">Fruits</option>
      <option value="3">Medicines</option>
    </select>  -->
  </div>
</div>
  </div>
  </div>

   <div id='rural_urban_layer' ></div>
   <script src="index.js" type="module"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">



// document.getElementById('my_selection').onchange = function() {
//     window.location.href = this.children[this.selectedIndex].getAttribute('href');
// }



function ruralSelected(){
    var sort = document.getElementById("sort");
    var category = document.getElementById("category");
    var c_id = category.options[category.selectedIndex].value;
    var s_id = sort.options[sort.selectedIndex].value;
     $.ajax({
         url : "card.php?s_id="+s_id+"&c_id="+c_id,
         cache : false,
         complete : function($response, $status){
            //  console.log($response.responseText);
             if ($status != "error" && $status != "timeout") {
                 $('#rural_urban_layer').html($response.responseText);
             }
         },
         error : function ($responseObj){
             alert("Something went wrong while processing your request.\n\nError => "
                 + $responseObj.responseText);
         }
     });
    }

// window.onload = function ruralSelected(){
//     var e = document.getElementById("sort");
//     var d_id = e.options[e.selectedIndex].value;
//      $.ajax({
//          url : "card.php?s_id="+d_id,
//          cache : false,
//          complete : function($response, $status){
//              console.log($response.responseText);
//              if ($status != "error" && $status != "timeout") {
//                  $('#rural_urban_layer').html($response.responseText);
//              }
//          },
//          error : function ($responseObj){
//              alert("Something went wrong while processing your request.\n\nError => "
//                  + $responseObj.responseText);
//          }
//      });
//     }

function addToCart(form, e){
  console.log("hello");
  e.preventDefault();
}

function cart(btn){
  col = btn.parentNode;
  row = col.parentElement;
  form = row.parentElement;

  form.onsubmit = (e)=>{
    e.preventDefault();
  }

  let xhr = new XMLHttpRequest(); //creating XML object
  xhr.open("POST", "./addToCartBackend.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == XMLHttpRequest.DONE){
        if(xhr.status == 200){
            let data = xhr.response;
          if(data == "success"){
              alert("Product Added");
          }
          else if(data == "session_error"){
             alert("Please Login First");

          }
          else{
            // alert(data);
            alert('Something Went Wrong: '+data);
          }
      }
    }
  }
  // Sending data from Ajax to php
  let formData = new FormData(form); //creating new formData
  xhr.send(formData); // sending form data to php
}


$(document).ready(function(){
  ruralSelected();
    var $btns = $('.btn').click(function() {
        if (this.id == 'all') {
          $('#parent > div').fadeIn(450);
        } else {
          var $el = $('.' + this.id).fadeIn(450);
          $('#parent > div').not($el).hide();
        }
        $btns.removeClass('active');
        $(this).addClass('active');
      })

    var $search = $("#search").on('input',function(){
        $btns.removeClass('active');
        var matcher = new RegExp($(this).val(), 'gi');
        $('.box').show().not(function(){
            return matcher.test($(this).find('.name, .sku').text())
        }).hide();
    })

})
</script>
</body>
</html>
