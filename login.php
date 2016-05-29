<?php require_once('Connections/health.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>E-health Care</title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/login.css">

    <body>

        <div class="page">
            <?php include 'include/banner.php'; ?>
            <?php include 'include/header.php'; ?>
            <body>
                <div class="container">
                    <section id="content">
                        <?php
                        if (isset($_POST['submit'])
                                && isset($_POST['username'])
                                && isset($_POST['password'])) {
                            include 'connections/health.php';
                            $UserName = $_POST['username'];
                            $password = $_POST['password'];
                            $Query = "SELECT * FROM `user` WHERE `username`='$UserName' AND `password`='$password';";
                            $result = mysql_query($Query) or die(mysql_error());
                            if (mysql_num_rows($result) == 1) {
                                $row = mysql_fetch_assoc($result);
                                @session_start();
                                $_SESSION['user_id'] = $row['user_id'];
                                $AccessLevel = $row['access_level'];
                                if ($AccessLevel == 1) {
                                    $_SESSION['MM_Username'] = $UserName;
                                    $_SESSION['MM_UserGroup'] = "";
                                    ob_clean();
                                    header("Location: index.php");
                                } else if ($AccessLevel == 2) {
                                    ob_clean();
                                    header("Location: admin/index.php");
                                }
                            } else {
                                echo "<h3>Wrong Password</h3>";
                            }
                        }
                        ?>
                        <form name="loginform" action="login.php" method="POST">
                            <h1>Login Form</h1>
                            <div>
                                <input name="username" type="text" placeholder="Username" required id="username" />
                            </div>
                            <div>
                                <input name="password" type="password" placeholder="Password" required id="password" />
                            </div>
                            <div>
                                <input type="submit" name="submit" value="Log in" />
                                <a href="register.php">Register</a>
                            </div>
                        </form><!-- form -->
                        <div class="button">
                            <a href="index.php">&copy;copy-E-health Care</a>
                        </div><!-- button -->
                    </section><!-- content -->
                </div><!-- container -->
            </body>
</html>