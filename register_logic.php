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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/venobox/venobox.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <!--==========================
    Header
  ============================-->
    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div id="logo">
                    <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="buy-tickets"><a href="index.php">Home Page</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->


    <!--==========================
 register after quota is full
    ============================-->
    <section id="buy-tickets" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="section-header">
                    <h2>Register</h2>
                    <p>Join us! Register for exclusive access.</p>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <form name='register' action="" method='post'>
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input name='username' type="text" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input name='email' type="text" required></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input name='password' type="password" required></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input name='cpassword' type="password" required></td>
                        </tr>
                        <!-- Add this where you want the category dropdown list in your HTML file -->
                        <tr>
                            <td>Category</td>
                            <td>
                                <select name='category' required>
                                    <?php
      $con = mysqli_connect('localhost', 'root', '', 'culturenight') or die("Cannot connect to server " . mysqli_connect_error());

      // Fetch all categories from the database
      $sql = "SELECT * FROM category";
      $result = mysqli_query($con, $sql) or die('Cannot execute sql ' . mysqli_error($con));

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['categoryName'] . '">' . $row['categoryName'] .  '</option>';
          }
      } else {
          echo '<option value="" disabled>No categories found</option>';
      }

      mysqli_close($con);
      ?>
                                </select>
                            </td>
                        </tr>

                    </table>

                    <br>

                    <!-- Center the submit button -->
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php
        // Connect to the database
        $con = mysqli_connect('localhost', 'root', '', 'culturenight') or die("Cannot connect to server " . mysqli_connect_error());

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the form values
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $category = $_POST['category'];

            // Check if the passwords match
            if ($password !== $cpassword) {
                echo "<div class='d-flex justify-content-center' style='color:green'>";
                echo "<p>Password and Confirm Password do not match.</p>";
                echo "</div>";
            } else {
                // Check if the username already exists
                $sqlUsernameCheck = "SELECT COUNT(*) as num_users FROM user WHERE username = '$username'";
                $resultUsernameCheck = mysqli_query($con, $sqlUsernameCheck) or die('Cannot execute username check ' . mysqli_error($con));
                $rowUsernameCheck = mysqli_fetch_assoc($resultUsernameCheck);
                $numExistingUsers = $rowUsernameCheck['num_users'];

                if ($numExistingUsers > 0) {
                    echo "<div class='d-flex justify-content-center' style='color:green'>";
                    echo "<p>User with the username '$username' already exists. Please choose another username.</p>";
                    echo "</div>";
                } else {
                    // Check if the quota is full
                    $sqlQuotaCheck = "SELECT COUNT(*) as num_users FROM user WHERE category = '$category'";
                    $resultQuotaCheck = mysqli_query($con, $sqlQuotaCheck) or die('Cannot execute quota check ' . mysqli_error($con));
                    $rowQuotaCheck = mysqli_fetch_assoc($resultQuotaCheck);
                    $numUsers = $rowQuotaCheck['num_users'];

                    // Get the quota for the category
                    $sqlGetQuota = "SELECT categoryQuota FROM category WHERE categoryName = '$category'";
                    $resultGetQuota = mysqli_query($con, $sqlGetQuota) or die('Cannot execute quota retrieval ' . mysqli_error($con));
                    $rowGetQuota = mysqli_fetch_assoc($resultGetQuota);
                    $quota = $rowGetQuota['categoryQuota'];

                    // Check if the quota is full
                    if ($numUsers >= $quota) {
                        $quotaMessage = "The quota for the category '$category' is full. Please choose another category.";
                    } else {
                        // Insert the user into the database
                        $sqlInsertUser = "INSERT INTO user (username, email, pwd, category) VALUES ('$username', '$email', '$password', '$category')";
                        mysqli_query($con, $sqlInsertUser) or die('Cannot execute user insertion ' . mysqli_error($con));

                        header("Location: login.html");
                        exit(); // Ensure no further content is processed after the header redirect
                    }
                }
            }
        }

        // Rest of your HTML code...
        ?>

    <!-- Display password mismatch and username exists error messages -->
    <?php if (isset($passwordMismatch)) : ?>
    <div class="d-flex justify-content-center" style='color:green'>
        <p><?php echo $passwordMismatch; ?></p>
    </div>
    <?php endif; ?>

    <?php if (isset($usernameExists)) : ?>
    <div class="d-flex justify-content-center" style='color:green'>
        <p><?php echo $usernameExists; ?></p>
    </div>
    <?php endif; ?>

    <?php if (isset($quotaMessage)) : ?>
    <div class="d-flex justify-content-center" style='color:green'>
        <p><?php echo $quotaMessage; ?></p>
    </div>
    <?php endif; ?>







    </main>


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
                            <p style="text-align: justify;"> unique customs, traditions, languages, and perspectives
                                woven together within a community, fostering a rich and
                                vibrant social landscape. Embracing and celebrating this diversity not only
                                enhances mutual understanding but also promotes a more inclusive and harmonious society.
                            </p>
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
                                <a href="https://www.facebook.com/ISS.UNITEN" class="facebook"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/iss_uniten/" class="instagram"><i
                                        class="fa fa-instagram"></i></a>
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
                Designed by <a href="https://www.instagram.com/_moha_xd7?igsh=c2MzanJqdm4yZWRz&utm_source=qr">Mohammed
                    Hasan</a>
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