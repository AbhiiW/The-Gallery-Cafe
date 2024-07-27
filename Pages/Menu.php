<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Gallery Cafe | Menu</title>
</head>
<body>


   <!-- Header -->
   <header class="p-3 text-bg-brown header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="../assets/Photo/logonew.png" class="navlogo" alt="">
                </a>
                <h1>The Gallery Cafe</h1>
            </div>
            <div class="d-flex align-items-center ms-auto">
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" id="search" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
                </form>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </div>
    </div>
</header>
<hr class="featurette-divider">
<div class="submenudirect-wrapper">
    <div class="container submenudirect">
        <header class="d-flex justify-content-py-5">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/Pages/Menu.html" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="/Pages/booking.html" class="nav-link">Bookings</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="/Pages/about.html" class="nav-link">About Us</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Terms of Use</a></li>
            </ul>
        </header>
    </div>
</div>
  
   <!-- Hero Section -->
 
   <div class="drawer container drawersize"></div>
   <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img src="/assets/Photo/333.png" class="d-block w-100" alt="">
       </div>
       <div class="carousel-item">
         <img src="/assets/Photo/22.jpg" class="d-block w-100" alt="">
       </div>
       <div class="carousel-item">
         <img src="/asswts/Photo/22.jpg" class="d-block w-100" alt="">
       </div>
     </div>
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Next</span>
     </button>
   </div>
 </div>

 

<!-- Php Menu -->



<section id="menu" class="menu section">
  <div class="container">
      <div class="section-title">
          <h2>Our Menu</h2>
      </div>

      <div class="row">
          <?php
          include '../assets/php/dbconnection.php';

          $sql = "SELECT * FROM menu_items";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo '<div class="col-lg-4 menu-item">
                          <a href="../assets/Photo/menuitems/' . $row["photo"] . '" class="glightbox">
                              <img src="../assets/Photo/menuitems/' . $row["photo"] . '" class="menu-img img-fluid" alt="">
                          </a>
                          <h4>' . htmlspecialchars($row["name"]) . '</h4>
                          <p class="ingredients">' . htmlspecialchars($row["description"]) . '</p>
                          <p class="price">' . htmlspecialchars($row["price"]) . ' LKR</p>
                        </div>';
              }
          } else {
              echo "No menu items available.";
          }

          $conn->close();
          ?>
      </div>
  </div>
</section>













        <!-- Footer -->
<footer id="footer" class="footer dark-background">
  <div class="container">
    <div class="row gy-3">
      <div class="col-lg-3 col-md-6 d-flex align-items-start">
        <i class="bi bi-geo-alt icon me-3"></i>
        <div class="address">
          <h4>Address</h4>
          <p>St Peters Street<br>Colombo 04</p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-start">
        <i class="bi bi-telephone icon me-3"></i>
        <div>
          <h4>Contact</h4>
          <p><strong>Phone:</strong> <span>+94112587968</span><br>
             <strong>Email:</strong> <span>thegallerycafe@gmail.com</span>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-start">
        <i class="bi bi-clock icon me-3"></i>
        <div>
          <h4>Opening Hours</h4>
          <p><strong>Mon-Sat:</strong> <span>09.00 AM - 11.00 PM</span><br>
             <strong>Sunday:</strong> <span>Closed</span>
          </p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <h4>Follow Us</h4>
        <div class="social-links d-flex">
          <a href="#" class="twitter"><i class="bi bi-twitter me-2"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook me-2"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram me-2"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin me-2"></i></a>
        </div>
      </div>
    </div>
  </div>
  <hr class="featurette-divider">
  <div class="container text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">The Gallery Cafe</strong> <span>All Rights Reserved</span></p>
    <div class="credits">
      Designed by <a href="">Abhiman Wijesekara</a>
    </div>
  </div>
</footer>

    
   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </body>
 </html>
 
 <!-- <li><a href="#reservation">RESERVATIONS</a></li> -->