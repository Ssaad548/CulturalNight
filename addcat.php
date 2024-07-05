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
                        <h2>Add Category</h2>
                        <p>Set the new category</p>
                    </div> 
                </div>
                <div class="d-flex justify-content-center"">
                    <form method="post" action="">
                        <div class="mb-3 row">
                            <label class="form-label">Category name</label>
                            <input required type="text" class="form-control" name="categoryName">
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label">Set Quota</label>
                            <input minlength="8" required type="number" value="10" class="form-control" name="categoryQuota">
                        </div>
                        <div class="d-flex justify-content-center d-grid gap-2 col-6 mx-auto">
                            <input type="submit" value="ADD" name="Addcat">    
                        </div>
                    </form>
                </div>

                <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Addcat'])) {
    $con = mysqli_connect('localhost', 'root', '', 'culturenight') or die("Cannot connect to server " . mysqli_connect_error());

    // Sanitize input to prevent SQL injection
    $categoryName = mysqli_real_escape_string($con, $_POST['categoryName']);
    $categoryQuota = mysqli_real_escape_string($con, $_POST['categoryQuota']);

    $sql = "INSERT INTO category (categoryName, categoryQuota) VALUES ('$categoryName','$categoryQuota')";
    $result = mysqli_query($con, $sql) or die('Cannot execute sql ' . mysqli_error($con));
    echo '<div class="d-flex justify-content-center" style="color: green">';
    if ($result) {
        
        echo "$categoryName has been added successfully";
    } else {
        echo "Error in inserting new category";
    }
    echo '</div>';
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
