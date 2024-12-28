
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="index.css" />
  <title>SIRIPA</title>
</head>
<body>
  <header class="header" id="home">
    <div class="header__video">
      <video autoplay loop muted playsinline class="back-video">
        <source src="assets/1.mp4" type="video/mp4" />
      </video>
    </div>
    <nav>
      <div class="nav__bar">
        <div class="logo nav__logo">
          <a href="#">SIRIPA</a>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="#about">Discover</a></li>
          <li><a href="uplord.html">Your Pic</a></li>
        </ul>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
        <div class="nav__action__btn">
          <button class="btn btn-outline-light btn-responsive" data-bs-toggle="modal" data-bs-target="#accountModal">
            ACCOUNT
          </button>
        </div>
      </div>
    </nav>

    <!-- Login and Signup Modal -->
    <div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="accountModalLabel">Login</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Login Form -->
            <div id="loginForm">
              <form action="account_handler.php" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
              </form>
              <div class="switch-btn text-center mt-3">
                <p>Don't have an account? <a href="javascript:void(0);" id="switchToRegister">Register</a></p>
              </div>
            </div>

            <!-- Signup Form -->
            <div id="registerForm" style="display: none;">
              <form action="account_handler.php" method="POST">
                <input type="hidden" name="action" value="register">
                <div class="mb-3">
                  <label for="registerEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="registerEmail" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                  <label for="registerUsername" class="form-label">Username</label>
                  <input type="text" class="form-control" name="registerUsername" id="registerUsername" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                  <label for="registerPassword" class="form-label">Password</label>
                  <input type="password" class="form-control" name="registerPassword" id="registerPassword" placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                  <label for="confirmPassword" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
              </form>
              <div class="switch-btn text-center mt-3">
                <p>Already have an account? <a href="javascript:void(0);" id="switchToLogin">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header Content -->
    <div class="section__container header__container">
      <div class="header__content">
        <h3 class="section__subheader">A HIKING GUIDE</h3>
        <h1 class="section__header">
          Sri Lanka's sacred mountain,<br />famed for spirituality and views.
        </h1>
        <div class="scroll__btn">
          <a href="#about">
            Scroll down
            <span><i class="ri-arrow-down-line"></i></span>
          </a>
        </div>
      </div>
    </div>
  </header>

    <br /><br /><br />
    <section class="about">
      <div class="section__container about__container">
        <div class="about__image about__image-1" id="about">
          <img src="assets/1.jpg" alt="about" />
        </div>
        <div class="about__content about__content-1">
          <h3 class="section__subheader">Hatton Nallathanniya Road</h3>
          <h2 class="section__header">
            Discover <div style="color: yellow;">Hatton Nallathanniya</div>
            Road ?
          </h2>
          <p>
            Hatton Nallathanniya Road: You can start your journey from anywhere in Sri Lanka by coming to Hatton Railway Station. The total distance here is 6km. This road is very easy to travel on with handrails and lights everywhere. You can see many small shops here. Here the Kelani River flows like a cold river. This is the best route for small people and those who are stuck.
          </p>
          <div class="about__btn">
            <a href="#">
              Read more
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
        </div>
        <div class="about__image about__image-2" id="equipment">
          <img src="assets/3.png" alt="about" />
        </div>
        <div class="about__content about__content-2">
          <h3 class="section__subheader">Kuruwita Erathna Road</h3>
          <h2 class="section__header">
            Discover <div style="color: yellow;">Kuruwita Erathna</div>
            Road ?
          </h2>
          <p>
            Kuruwita Erathna Road: This is considered to be the road that he discovered to go to Siripada.. This can be reached by coming to Kuruwita town and coming <br />11-km from there. From there, you need to come back 11-km to reach Uda Maluwa. This is a very beautiful road. It also consists of "Ambalama under the Jambola trees", "Saruwath Ambalama" and so on. After that, this is a very beautiful road. This finally connects to the Ratnapura Palabaddara road.
          </p>
          <div class="about__btn">
            <a href="#">
              Read more
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
        </div>
        <div class="about__image about__image-3" id="blog">
          <img src="assets/2.jpg" alt="about" />
        </div>
        <div class="about__content about__content-3">
          <h3 class="section__subheader">Ratnapura Palabaddala Road</h3>
          <h2 class="section__header">
            Discover <div style="color: yellow;">Palabaddara</div>
            Road ?
          </h2>
          <p>
            Ratnapura Palabaddala Road: This is also known as Raja Mawatha. It is about 15km from Palabaddara to Siripa Maluwa. Here, after a very beautiful environment, you will meet Seetha Gangula in the middle of the journey. After that, you will meet "Haramiti Pana" and "Gal Vangediya".and so on.
          </p>
          <div class="about__btn">
            <a href="#">
              Read more
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
        </div>
        <div class="about__image about__image-4" id="equipment">
          <img src="assets/4.png" alt="about" />
        </div>
        <div class="about__content about__content-4">
          <h3 class="section__subheader">Deraniyagala Maliboda Road</h3>
          <h2 class="section__header">Discover <div style="color: yellow;">Deraniyagala Maliboda</div>Road</h2>
          <p>
            Deraniyagala Maliboda Road:
This passes through Deraniyagala town. If you travel on this road, 
you will have to travel about 14KM. It is through dense jungle and usually takes about 12 hours. 
Finally, it connects to the Kuruwita Road. 
Coming by this road is truly a beautiful experience. This is not suitable for groups traveling alone or with small children.
          </p>
          <div class="about__btn">
            <a href="#">
              Read more
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
        </div>
        <div class="about__image about__image-5">
          <img src="assets/5.jpg" alt="about" />
        </div>
        <div class="about__content about__content-5">
          <h3 class="section__subheader"> Sadagalatenna Road</h3>
          <h2 class="section__header">Discover <div style="color: yellow;">Sadagalatenna</div>Road</h2>
          <p>
            Sadagalatenna Road:
This is from Hatton to Nallathanniya and from there you should enter "Mare Estate" near "Mohini Ella" and continue 
for about 10km. Here you can see many waterfalls. 
This road gives a very beautiful view of the mountain peaks. 
Another special thing here is the presence of very large fruit orchards.
          </p>
          <div class="about__btn">
            <a href="#">
              Read more
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
        </div>
        <div class="about__image about__image-6">
          <img src="assets/6.jpg" alt="about" />
        </div>
        <div class="about__content about__content-6">
          <h3 class="section__subheader">Mukkuwatta Road</h3>
          <h2 class="section__header">Discover <div style="color: yellow;">Mukkuwatta</div>Road</h2>
          <p>
            Mukkuwatta Road:
            This is the most difficult and dangerous route to worship Sripada. It takes about two days to see the lotus 
            when worshiping through this. This is a 23km route through a dense jungle and it becomes very dangerous to worship during the rainy season. 
            While traveling through the dense jungle on this road, 
            among the roots of trees, vines and rocks, 
            animals like "Diviya" and "Kuru Elephant" can also be encountered, so traveling alone is very dangerous.
          </p>
          <div class="about__btn">
            <a href="#">
              Read more
              <span><i class="ri-arrow-right-line"></i></span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo footer__logo">
            <a href="#">SIRIPA</a>
          </div>
          <p>
            Get out there & discover your next slope, mountains & destination!
          </p>
        </div>
        <div class="footer__col">
          <h4>More on The Blog</h4>
          <ul class="footer__links">
            <li><a href="#">About SIRIPA</a></li>
            <li><a href="#">Know about us</a></li>
            <li><a href="#">Write For Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            
          </ul>
        </div>
        <div class="footer__col">
          <h4>More on Ours</h4>
          <ul class="footer__links">
            <li><a href="#">my Details</a></li>
            <li><a href="https://sltc.ac.lk/">SLTC Uni</a></li>
            <li><a href="#">Other</a></li>
          </ul>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2024 Web Design Mastery. All rights reserved.
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="index.js"></script>
  </body>
</html>
