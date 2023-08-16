<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    * {
      box-sizing: border-box;
    }
    .border{ 
      border: 1px solid pink !important
    }
    body {
      font-family: Verdana, sans-serif;
      background-color: black;
    }

       .mySlides {
      display: none;
    }



    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active {
      background-color: #717171;
    }

    /* Fading animation */
    .fadeinleft {


      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fadeinleft {
      0% {
        opacity: 0;
        transform: translateY(-100px);
      }

      80% {
        transform: translateY(10px);
      }

      100% {
        opacity: 1;
        transform: translate(0);
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {
        font-size: 11px
      }
    }
  </style>
</head>

<body>


  <div class="container d-flex justify-content-center align-items-center" style="height:80vh">
  <div class="mySlides fadeinleft text-justify">
      <div class="row">
        <div class="col-lg-6">
          <div style="text-align:center">
            <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/open.jpg">
          </div>
        </div>

        <div class="col-lg-6">
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
    <div class="mySlides fadeinleft text-justify">
      <div class="row">
        <div class="col-lg-6">

          <div style="text-align:center">
            <img width="300vw" height="600vh"  class="border border-4" style="border-radius:30px;"src="img/images/start.jpg">
          </div>
        </div>
        <div class="col-lg-6">
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
    <div class="mySlides fadeinleft text-justify">
      <div class="row">
        <div class="col-lg-6">
          <div style="text-align:center">
            <img width="300vw" height="600vh"  class="border border-4" style="border-radius:30px;" src="img/images/login.jpg">
          </div>
        </div>

        <div class="col-lg-6">
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
    <div class="mySlides fadeinleft text-justify">
      <div class="row">
        <div class="col-lg-6">
          <div style="text-align:center">
            <img width="300vw" height="600vh"  class="border border-4" style="border-radius:30px;" src="img/images/search.jpg">
          </div>
        </div>

        <div class="col-lg-6">
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
    <div class="mySlides fadeinleft text-justify">
      <div class="row">
        <div class="col-lg-6">

          <div style="text-align:center">
            <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/usiness.jpg">
          </div>

        </div>

        <div class="col-lg-6">
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
    <div class="mySlides fadeinleft text-justify">
      <div class="row">
        <div class="col-lg-6">
          <div style="text-align:center">
            <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/services.jpg">
        
            </div>
        </div>

        <div class="col-lg-6">
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
    <div class="mySlides fadeinleft text-justify">
      <div class="row">
        <div class="col-lg-6">
          <div style="text-align:center">
            <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/contact.jpg">
          </div>
        </div>
      
        <div class="col-lg-6">
        
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
  </div>
  
  <br>

  <div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>

  <script>

    let slideIndex = 0;

    showSlides();

    function showSlides() {
    
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      
      for (i = 0; i < slides.length; i++) {
        
        slides[i].style.display = "none";
      }
     
      slideIndex++;
      if (slideIndex > slides.length) {
        slideIndex = 1
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
   
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
   
    }
    
  </script>
 
</body>

</html>