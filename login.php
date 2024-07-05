<html>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "culturenight";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) 
    die("Connection failed: " . mysqli_connect_error());
    

    $username1 = $_POST["username"];
    $password1 = $_POST["password"];
    
    // Check in the 'user' table
    $sql_user = "SELECT * FROM user WHERE userName = '$username1'";
    $result_user = mysqli_query($conn, $sql_user) or die('Cannot execute sql '.mysqli_error($conn));

    if(mysqli_num_rows($result_user) > 0) {
        $row_user = mysqli_fetch_array($result_user, MYSQLI_BOTH);

        if($password1 == $row_user["pwd"]) {
            session_start();
            $_SESSION['username'] = $username1;
            header("location: userProfileUpdate.php");
        } else {
            echo "Password wrong, please try again!";
        }
    } else {
        // Check in the 'admin' table if not found in 'user' table
        $sql_admin = "SELECT * FROM admin WHERE adminName = '$username1'";
        $result_admin = mysqli_query($conn, $sql_admin) or die('Cannot execute sql '.mysqli_error($conn));

        if(mysqli_num_rows($result_admin) > 0) {
            $row_admin = mysqli_fetch_array($result_admin, MYSQLI_BOTH);

            if ($password1 == $row_admin["pwd"]) {
                if ($row_admin["adminName"] == "admin") {
                    header("location:viewadmin.php");
                }
            } else {
                echo "Password wrong, please try again!";
            }
        } else {
            echo "Username does not exist";
        }
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</body>

</html>