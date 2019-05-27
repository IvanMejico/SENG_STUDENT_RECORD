<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["btn-login"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $queryString = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $query = mysqli_query($con, $queryString);
            

            if(mysqli_num_rows($query) == 1) {
                $_SESSION['userLoggedIn'] = $username;
                echo "logged out";
                header("Location: admin_page.php");
            }
        }
    }
?>