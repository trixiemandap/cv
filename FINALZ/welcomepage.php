<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boss Liam | Welcome Page</title>
  <link rel="icon" href="img/BLISSS.png">

  <link rel="stylesheet" href="./assets/css/welcome.css">
</head>
<body>
  <section class="main">
    <header>
      <a href="#"><img src="img/BLIS.png" class="logo"></a>
      <div class="toggle"></div>
      <ul class="navigation">
        <li><a href="homepage.php">Products</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
    </header>
    <div class="content">
      <div class="text">
        <h2>Boss Liam's<br>iPhone<span>Store.</span></h2>
        <p>Welcome to Boss Liam's iPhone Store, your ultimate destination for all things iPhone! Immerse yourself in a world of cutting-edge technology, sleek designs, and unparalleled functionality. With a passion for innovation and a commitment to customer satisfaction.</p>
        <button onclick="redirectToStore()">Buy Now?</button>
      </div>
      <div class="slider">
        <div class="slides active">
          <img src="img/5.png">
        </div>
        <div class="slides">
          <img src="img/2.png">
        </div>
        <div class="slides">
          <img src="img/3.png">
        </div>
        <div class="slides">
          <img src="img/7.png">
        </div>
      </div>
    </div>

    <div class="footer">
      <ul class="sci">
        <li><a href="https://www.facebook.com/PowerMacCenter"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a href="https://twitter.com/PowerMacCenter"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="https://www.instagram.com/powermaccenter/"><ion-icon name="logo-instagram"></ion-icon></a></li>
      </ul>
      <div class="prevNext">
        <p>Plus Ultra !!!</p>
        <span class="prev"><ion-icon name="chevron-back-outline"></ion-icon></span>
        <span class="next"><ion-icon name="chevron-forward-outline"></ion-icon></span>
      </div>
    </div>
  </section>

  <script>
    function redirectToStore() {
        // Replace 'your_store_url' with the actual URL of your store
        window.location.href = 'register.php';
    }
  </script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script>
    //toggle 
    const menutoggle = document.querySelector('.toggle');
    const navigation = document.querySelector('.navigation');
    menutoggle.onclick = function(){
      menutoggle.classList.toggle('active')
      navigation.classList.toggle('active')
    }

    //slider
    const slides = document.querySelectorAll('.slides');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');

    i = 0;
    
    function ActiveSlide(n){
      for(slide of slides)
      slide.classList.remove('active');
      slides[n].classList.add('active');
    }

    // function for next btn
    next.addEventListener('click', function(){
      if(i == slides.length - 1){
        i = 0;
        ActiveSlide(i);
      }
      else 
      {
        i++;
        ActiveSlide(i);
      }
    })

     // function for prev btn
     prev.addEventListener('click', function(){
      if(i == 0){
        i = slides.length - 1;
        ActiveSlide(i);
      }
      else 
      {
        i--;
        ActiveSlide(i);
      }
    })
  </script>
</body>
</html>