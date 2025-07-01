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
                            <a class="nav-link scroll-link" href="index.php?page=home#section_2">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=meals">Meal Plans</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=subscription">Subscription</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="index.php?page=home#section_3">Contact</a>
                        </li>
                        
                        <?php
                            if (isset($_SESSION['email'])) {
                        ?>
                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle btn custom-btn custom-border-btn" href="#" id="userDropdown" data-bs-toggle="dropdown">
                                <?php echo htmlspecialchars($_SESSION['full_name']); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                    include 'auth/db_connect.php';
                                    $email = $_SESSION['email'];
                                    $query = "SELECT role FROM users WHERE email = '$email'";
                                    $result = mysqli_query($conn, $query);
                                    $user = mysqli_fetch_assoc($result);

                                    if ($user['role'] === 'admin') {
                                        echo '<li><a class="dropdown-item" href="?page=dashboard_admin">Dashboard</a></li>';
                                    } else {
                                        echo '<li><a class="dropdown-item" href="?page=dashboard_user">Dashboard</a></li>';
                                    }
                                ?>
                                <li><a class="dropdown-item" href="auth/logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <?php
                        } else{?>
                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="index.php"data-bs-toggle="modal" data-bs-target="#loginRegisterModal">Login</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>