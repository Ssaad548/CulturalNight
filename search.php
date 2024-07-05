<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #admindelete {
            background-color: #fff;
            padding: 190px 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 360px;
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

    <section id="admindelete" class="section-bg wow fadeInUp">
        <div>
            <main>
                <div class="d-flex justify-content-center">
                    <div class="section-header">
                        <h2>Search user</h2>
                        <p>Write the username</p>
                    </div> 
                </div>
                
                <div class="d-flex justify-content-center">
                    <form method="POST">
                        <div class="col">
                            <label class="form-label"><b>Search user<b></label>
                            <input required type="text" class="form-control" name="userName">
                        </div>
                        <div class="d-flex justify-content-center d-grid gap-2 col-6 mx-auto">
                            <input type="submit" value="Search" name="searchUser">    
                        </div>
                    </form>
                </div>

                <?php
                    if (isset($_POST['searchUser'])) {
                        $con = mysqli_connect('localhost', 'root', '', 'culturenight') or die("Cannot connect to server " . mysqli_connect_error());
                        $username = isset($_POST['userName']) ? $_POST['userName'] : '';
                        $query = "SELECT * FROM user where username like '%$username%'";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result)) {
                            echo '<div class="container d-flex justify-content-center">';
                            echo "<table class='table'>
                                    <thead class='thead-dark'>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Category</th>
                                    </tr>";

                            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                                echo "<tr>";
                                $userName = $row['userName'];
                                $email = $row['email'];
                                $pwd = $row['pwd'];
                                $Category = $row['Category'];
                                echo "<td>$userName</td>";
                                echo "<td>$email</td>";
                                echo "<td>$pwd</td>";
                                echo "<td>$Category</td>";
                                echo "</tr>";
                            }

                            echo "</thead></table>";
                        } else {
                            echo"<div class='d-flex justify-content-center' style = 'color:green' >";
                            echo "No data found for $username";
                            echo"</div>";
                        }
                    }
                ?>
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
