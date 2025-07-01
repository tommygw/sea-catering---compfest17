<?php
session_start();
include 'db_connect.php';

if (isset($_POST['register'])) {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Function to check if email already exists
    function email_check($email, $conn) {
        $email_check = mysqli_real_escape_string($conn, $email);
        $query = "SELECT * FROM users WHERE email = '$email_check'";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result);
    }

    // Check if any input is empty
    if (!empty($full_name) && !empty($email) && !empty($password) && !empty($password) && !empty($repassword)) {
        if ($password == $repassword) {
            if (email_check($email, $conn) == 0) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO users (full_name, email, password_hash) VALUES ('$full_name', '$email', '$hashed_password')";
                
                // Execute Query
                if ($conn->query($query) === TRUE) {
                    $_SESSION['email'] = $email;
                    $_SESSION['full_name'] = $full_name;
                    ?>
                    <script type="text/javascript">
                        alert('Register Success !');
                        window.location.assign('../index.php');
                    </script>
                    <?php 
                    exit();} 
                else {
                    ?>
                    <script type="text/javascript">
                        alert('Register Failed !');
                        window.location.assign('../index.php');
                    </script>
                    <?php
                    exit();
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert('Your Email was Registered !');
                    window.location.assign('meals.php');
                </script>
                <?php
                exit();
            }
        } else {
            ?>
            <script type="text/javascript">
                alert('Passwords do not match!');
                window.location.assign('../index.php');
            </script>
            <?php
        } 
    } else {
            ?>
            <script type="text/javascript">
                alert('Register Failed !');
                window.location.assign('../index.php');
            </script>
            <?php
        } 
}
?>
