<?php

session_start();
if (isset($_SESSION['user_name'])) {
    echo "Halo, " . $_SESSION['user_name'];
}


?>