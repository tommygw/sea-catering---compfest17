<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>

        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" class="logo img-fluid" alt="Sea Catering">
                    <span>
                        SEA CATERING
                        <small>Healthy Meals, Anytime, Anywhere</small>
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php if($current_page == 'index.php') echo 'active'; ?>" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="index.php#section_2">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if($current_page == 'meals.php') echo 'active'; ?>" href="meals.php">Meal Plans</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php if($current_page == 'subs.php') echo 'active'; ?>" href="subs.php">Subscription</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="index.php#section_3">Contact</a>
                        </li>
                        
                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="index.php"data-bs-toggle="modal" data-bs-target="#loginRegisterModal">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>