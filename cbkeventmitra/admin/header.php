<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h1 class="logo"> 
                    <a href="index.php"> 
                        <img src="../images/logo.png" alt=""/> 
                    </a> 
                </h1>
            </div>
            <div class="col-md-10">
                <section class="header-top hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-9"> 
                            <p><strong>Welcome to Event Mitra Admin Panel</strong></p>
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
                            <?php if($_SESSION['auserid']) { ?> 
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="users.php">Users</a></li>
                            <li><a href="events.php">Events</a></li>
                            <li><a href="logout.php">Logout</a></li>
                            <?php }else{ ?>
                            <li><a href="../index.php">Back to Portal</a></li>
                            <?php } ?>
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