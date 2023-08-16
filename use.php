<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
   
	  <link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js" integrity="sha512-NdZyIQYjul6RuB0vCoq9ec+xqTO2riVTZAZf9YM3BHkkcJxFTq7z9FAK3PXP+XYs5zQRuOycmL5GdwD85t2T+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" rel="stylesheet" />


 


</head>

   
<body>
          
          <div class="blog-slider bgcolor">
            <div class="blog-slider__wrp swiper-wrapper">
         
              <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="img/images/open.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <p class="blog-slider__code display-8"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                </div>
              </div>
             
			  <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="img/images/start.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <p class="blog-slider__code display-8">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                </div>
              </div>
			  <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="img/images/login.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <p class="blog-slider__code display-8">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                </div>
              </div>
			  <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="img/images/search.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <p class="blog-slider__code display-8"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                </div>
              </div>
			  <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="img/images/usiness.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <p class="blog-slider__code display-8"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                </div>
              </div>
			  <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="img/images/services.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <p class="blog-slider__code display-8">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                </div>
              </div>
			  <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                  <img src="img/images/contact.jpg" alt="">
                </div>
                <div class="blog-slider__content">
                  <p class="blog-slider__code display-8">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.  </p>
                </div>
              </div>
            <div class="blog-slider__pagination"></div>
          </div>
          </div>
          <script>
             var swiper = new Swiper('.blog-slider', {
                spaceBetween: 30,
                effect: 'fade',
                loop: true,
                mousewheel: {
                  invert: false,
                },
                // autoHeight: true,
                pagination: {
                  el: '.blog-slider__pagination',
                  clickable: true,
                }
              });
         </script>
</body>
</html>
