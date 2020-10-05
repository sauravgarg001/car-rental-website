<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.php"><img src="logo.jpeg" height="50px;" width="80px" alt="" title="licably" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="index.php">Home</a></li>
                    <?php
                    if (isset($_SESSION["email"])) {
                    ?>
                        <li><a href="trips.php">Trips</a></li>
                        <li><a href="logout-process.php">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                    <?php } ?>
                    <li><a href="about.php">about</a></li>
                    <li><a href="contact.php">Contact </a></li>
                    <li><a href="services.php">Services </a></li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
    </div>
</header><!-- #header -->