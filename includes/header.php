<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEng Student Records</title>
    <link rel="stylesheet" href="assets/css/css-reset.css">
    <link rel="stylesheet" href="assets/css/global-styles.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/admin-page.css">
    <link rel="stylesheet" href="assets/css/main-page.css">
</head>
<body>
    <div class="page-header">
        <div class="inner-header">
            <div class="header-left">
                <?php if ($_SERVER['PHP_SELF'] == '/CRUDPROJECT_SENG/index.php') {
                    // echo "<div class='button-container'><a href='admin_login.php'><img src='assets/images/admin-with-cogwheels.svg' alt=''></a></div>";
                    echo "<div class='button-container'><a href='admin_page.php'><img src='assets/images/admin-with-cogwheels.svg' alt=''></a></div>";
                } else {
                    echo "<div class='button-container'><a href='index.php'><img src='assets/images/logout.svg' alt=''></a></div>";
                }
                ?>
                <div class="title-container"><span><u>MSC School of Engineering</u><br><i>STUDENT RECORD</i></span></div>
            </div>
            <?php
                // Check the name of the current page. 
                // If the current page is index, render 
                // search box, else do nothing
                if ($_SERVER['PHP_SELF'] == '/CRUDPROJECT_SENG/index.php') {
                    echo " <div class='header-right'>
                            <form action='index.php' method='GET'>
                                <input type='text' name='search' placeholder='Search Records'>
                                <button>Search</button>
                            </form>
                            </div>";
                }
            ?>
        </div>
    </div>

    <!-- CONTENT GOES HERE -->