
</head>
<body>
    <div class="page">
        <div class="header">
            <a href="index.php" id="logo"><img src="images/logo1.jpg" alt=""/></a>
            <ul >
                <li><a href="index.php" >Home</a></li>
                <li><a href="about.php">About</a></li> 
                <li><a href="doctor.php">Doctors</a> </li>
                <li><a href="services.php">Services</a> </li> 
                <li>
                    <?php
                    @session_start();
                    if (!isset($_SESSION['user_id'])) {
                        echo '<a href="login.php">Log In</a>';
                    } else {
                        echo '<a href="logout.php">Log Out</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
</body>