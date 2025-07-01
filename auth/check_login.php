<?php
if( !isset($_SESSION['email']) ){
    ?>
    <script type="text/javascript">
        alert('Anda Harus Login Terlebih Dahulu !');
        window.location.assign('index.php');
    </script><?php
    exit;
}
