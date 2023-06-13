<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h1 class="logo"> 
                    <a href="index.php"> 
                        <img src="images/logo.png" alt=""/> 
                    </a> 
                </h1>
            </div>
            <div class="col-md-10">
                <section class="header-top hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-9"> 
                            <p><strong>Welcome to Event Mitra</strong></p>
                        </div>
                        <div class="col-md-3">
                            <nav class="social-icons float-right"> 
                                <a href="#"><i class="fa fa-facebook fa-lg"></i></a> 
                                <a href="#"><i class="fa fa-twitter fa-lg"></i></a> 
                                <a href="#"><i class="fa fa-github fa-lg"></i></a> 
                            </nav>
                        </div>
                    </div>
                </section>
                <section class="header-bottom">
                    <button class="mmenu-toggle"><i class="fa fa-bars fa-lg"></i></button>
                    <nav class="main-menu">
                        <ul class="sf-menu" id="main-menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <?php if(!$_SESSION['userid']) { ?> 
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                            <li><a href="login.php">Post Event</a></li>
                            <li><a href="events.php" class="">View Events</a></li>
                            <li><a href="admin">Admin Login</a></li>
                            <?php }else{ ?>
                            <li>
                                <a href="dashboard.php" class="">Dashboard</a>
                                <ul class="dropdown">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="logout.php" class="">Logout</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="post_event.php" class="">Post Event</a>
                                <ul class="dropdown">
                                    <li><a href="post_event.php">Post Event</a></li>
                                    <li><a href="posted_events.php" class="">Posted Events</a></li>
                                </ul>
                            </li>
                            <li><a href="events.php" class="">View Events</a></li>
                            <?php } ?>
                            <li><a href="contactus.php">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
    </div>
    
    <nav class="mobile-menu">
        <div class="container">
            <div class="row"></div>
        </div>
    </nav>
</header>
<!-- End Header -->