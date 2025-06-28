<?php

session_start();

include 'db_connect.php';

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $login = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $check = mysqli_num_rows($login);

    if ($check > 0) {
        $data = mysqli_fetch_assoc($login);
        if (password_verify($password, $data['password_hash'])) {

            if ($data['role'] == "user") {
                
                $_SESSION['email'] = $email;
                $_SESSION['full_name'] = $data['full_name'];
                header("location: ../index.php");

            } else if ($data['role'] == "admin") {
                
                $_SESSION['email'] = $email;
                $_SESSION['full_name'] = $data['full_name'];
                header("location: ../index.php");

            } else {
                ?>
                <script type="text/javascript">
                    alert('email or password invalid !');
                    window.location.assign('../index.php');
                </script>
                <?php
            }
        
    } else {
        ?>
        <script type="text/javascript">
            alert('email or password invalid !');
            window.location.assign('../index.php');
        </script>
        <?php
    }}
} else{
   ?>
        <script type="text/javascript">
            alert('email or password invalid !');
            window.location.assign('../index.php');
        </script>
        <?php
    }
?>

