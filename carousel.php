<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="3" ></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="4" ></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="5" ></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="6" ></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/open.jpg">
    </div>
    <div class="carousel-item">
    <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/start.jpg">
    </div>
    <div class="carousel-item">
    <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/login.jpg">
    </div>
    <div class="carousel-item">
    <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/search.jpg">
    </div>
    <div class="carousel-item">
    <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/usiness.jpg">
    </div>
    <div class="carousel-item">
    <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/services.jpg">
</div>
    <div class="carousel-item">
    <img width="300vw" height="600vh" class="border border-4" style="border-radius:30px;" src="img/images/contact.jpg">
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="container-fluid mt-3">
  <h3>Carousel Example</h3>
  <p>The following example shows how to create a basic carousel with indicators and controls.</p>
</div>

</body>
</html>