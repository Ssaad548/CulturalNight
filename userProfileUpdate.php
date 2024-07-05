<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>UICN</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <style>
    #updateecho{
    position: absolute;
    top: 650px;
    left: 832px ;
    color: green;




    }
  </style>
</head>
<body>
    <!--==========================
    Header
  ============================-->
  <header id="header">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <div id="logo">
        <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="buy-tickets"><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
   </div>
  </header><!-- #header -->

  

    <?php
        $con = mysqli_connect('localhost','root','','culturenight') or die ("Cannot connect to
        server ". mysqli_connect_error());

            // Fetch user information from the database
            session_start();
            $username = $_SESSION['username']; // You can get the username from the session or other means
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve form values
                $email = $_POST['email'];
                $password = $_POST['password'];
                $category = $_POST['category'];
                $query = "UPDATE user SET email = '$email', pwd = '$password', Category = '$category' WHERE userName = '$username'";
                $result = mysqli_query($con, $query);

                if ($result) {
                  echo "<div id= 'updateecho' >";
                  echo "<p>User information updated successfully.<p>";
                  echo "</div>";  
                } else {
                    echo "Error updating user information: " . mysqli_error($con);
                }
            
            }else{
                $query = "SELECT * FROM user WHERE userName = '$username'";
                $result = mysqli_query($con, $query);
        
                // Check if the query was successful
                if ($result) {
                // Fetch user data
                $userData = mysqli_fetch_assoc($result);
        
                // Extract user data
                $username = $userData["userName"];
                $password = $userData["pwd"];
                $email = $userData['email'];
                $category = $userData['Category'];
                }
            }  

        echo'<section class="section-bg wow fadeInUp">
        <div id ="pushpage">
        <div class="container">
          <div class="d-flex justify-content-center">
            <div class="section-header">
              <h2>User Information</h2>
              <p>Press confirm once done editing.</p>
              </div>
          </div>
        
          <div class="d-flex justify-content-center">
            <form name="updateProfile" action="userProfileUpdate.php" method="post">
              <table>
                <div class="error"></div>
                <tr>
                  <td>Username</td>
                  <td><input name="username" type="text" value="'.$username.'" readonly></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input name="email" type="text" value="'.$email.'"></td>
                </tr>
                <tr>
                <td>Password</td>
                  <td><input name="password" type="password" value="'.$password.'" ></td>
                </tr>
                <tr>
                  <td>Category</td>
                  <td>
                    <select name="category">
                      <option value="Zone A" ' . ($category == 'Zone A' ? 'selected' : '') . '>Zone A</option>
                      <option value="Zone B" ' . ($category == 'Zone B' ? 'selected' : '') . '>Zone B</option>
                      </select>
                  </td>
                </tr>
              </table>
              
              <br>
        
              <!-- Center the submit button -->
              <div class="d-flex justify-content-center">
                <input type="submit" value="Confirm">
              </div>
            </form>
          </div>
        </div>
        </div>
        </section>';            
            
        ?>


    <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          
          <div class="d-flex flex-row justify-content-between">
            
                      <div class="col-lg-3 col-md-6 footer-info">
                        <img src="img/logo.png" alt="TheEvenet">
                        <p style="text-align: justify;"> unique customs, traditions, languages, and perspectives woven together within a community, fostering a rich and
                           vibrant social landscape. Embracing and celebrating this diversity not only
                           enhances mutual understanding but also promotes a more inclusive and harmonious society.</p>
                      </div>
            
                      <div class="col-lg-3 col-md-6 footer-contact ">
                        <h4>Contact Us</h4>
                        <p>
                          Putrajaya Campus <br>
                          43000 Kajang, Selangor<br>
                          MALAYSIA. <br>
                          <strong>Phone:</strong> +603-8921 2020<br>
                          <strong>Email:</strong> info@issuniten.org<br>
                        </p>
            
                        <div class="social-links">
                          <a href="https://www.facebook.com/ISS.UNITEN" class="facebook"><i class="fa fa-facebook"></i></a>
                          <a href="https://www.instagram.com/iss_uniten/" class="instagram"><i class="fa fa-instagram"></i></a>
                        </div>
            
                      </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>ISS UNITEN</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
        Designed by <a href="https://www.instagram.com/_moha_xd7?igsh=c2MzanJqdm4yZWRz&utm_source=qr">Mohammed Hasan</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <script src="js/index.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>    
</body>
</html>