<?php include('includes/config.php')?>
<?php include('includes/handlers/login-handler.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/css-reset.css">
    <link rel="stylesheet" href="assets/css/global-styles.css">
    <link rel="stylesheet" href="assets/css/admin-login.css">
</head>
<body>
    <div class="container">
        <div class="admin-login-container vertical-center">
            <div class="div-login-header">
                <div>
                    <div class="login-icon">
                        <h2>Administrator Login</h2>
                    </div>
                </div>
            </div>
            <div class="div-login-body">
                <div>
                    <!-- I'll probably use ajax here for input validation-->
                    <span class="login-form-message">Incorrect username or password.</span>
                    <form action="" class="admin-login-form" method="POST">    
                        <p class="login-formgroup">
                            <label for="">Username:</label><br>
                            <input type="text" class="field admin-login-field" name="username">
                        </p>
                        <p class="formgroup">
                            <label for="">Password:</label><br>
                            <input type="password" class="field admin-login-field" name="password" >
                        </p>
                        <p class="formgroup">
                        <button type="submit" class="btn btn-login" name="btn-login">Log in</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>