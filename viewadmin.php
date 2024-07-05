<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #pushpage {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        #pushpage th,
        #pushpage td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #pushpage th {
            background-color: #f2f2f2;
        }

        #pushpage tr:hover {
            background-color: #f5f5f5;
        }

        /* Adjusted styles for section and h2 */
        #admin {
            position: relative;
            top: 100px; /* Remove fixed height */
        }

        #admin .section-header {
            margin-top: 0; /* Adjust margin-top */
        }
    </style>
    <meta charset="utf-8">
    <title>UICN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/logo.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
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
    <!-- Header -->
    <header id="header" style="background-color: black;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div id="logo">
                    <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="search.php">Search</a></li>
                        <li><a href="delete.php">Delete</a></li>
                        <li><a href="addcat.php">Add Category</a></li>
                        <li><a href="viewadmin.php">Database</a></li>
                        <li class="buy-tickets"><a href="logout.php">Logout</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->

    <!-- Database Section -->
<section id="admin" class="section-bg wow fadeInUp">
    <div class="container">
        <main>
            <div class="d-flex justify-content-center">
                <div class="section-header">
                    <h2>DataBase</h2>
                    <p>Registered participants details</p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <table class='table'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'culturenight') or die("Cannot connect to
                            server " . mysqli_connect_error());
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                            echo "<tr>";
                            $username = $row['userName'];
                            $password = $row['pwd'];
                            $email = $row['email'];
                            $category = $row['Category'];
                            echo "<td>$username</td>";
                            echo "<td>$email</td>";
                            echo "<td>$password</td>";
                            echo "<td>$category</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</section>




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
