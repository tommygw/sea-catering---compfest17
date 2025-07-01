<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="images/icons/logo.png">
        <title>SEA Catering</title>

        <!-- CSS FILES -->        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link href="css/style.css" rel="stylesheet">

        <link href="css/dashboard_style.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    </head>
    
    <body id="section_1">
    
    <!-- Navbar -->
    <?php 
    session_start(); 
    include 'layout/navbar.php';
    ?>
        
        <main>
        <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            switch ($page) {
                case 'meals':
                    include 'meals/content.php';
                    break;
                case 'subscription':
                    include 'subscription/subs.php';
                    break;
                case 'dashboard_admin':
                    include 'dashboard/dashboard_admin.php';
                    break;
                case 'contact_inbox':
                    include 'dashboard/contact_inbox.php';
                    break;
                case 'dashboard_user':
                    include 'dashboard/dashboard_user.php';
                    break;
                case 'home':
                default:
                    include 'home.php'; 
                    break;
            }
        ?>


<!-- Footer -->
<?php
include "layout/footer.php";
?>

        <!-- JAVASCRIPT FILES -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/counter.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="dashboard/js/dashboard.js"></script>
        <?php if ($page === 'dashboard_admin') : ?>
        <script>
        $(function () {
            let start = moment("<?= $_GET['start'] ?? date('Y-m-01') ?>");
            let end = moment("<?= $_GET['end'] ?? date('Y-m-t') ?>");

            function updateRange(start, end) {
                $('#date-range-picker span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
                $('#startDate').val(start.format('YYYY-MM-DD'));
                $('#endDate').val(end.format('YYYY-MM-DD'));
            }

            $('#date-range-picker').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, function(start, end) {
                updateRange(start, end);
            });

            $('#date-range-picker').on('apply.daterangepicker', function(ev, picker) {
                updateRange(picker.startDate, picker.endDate);
                $('#dateRangeForm').submit(); // Submit saat klik apply
            });

            // Initial update
            updateRange(start, end);
        });
        </script>
        <?php endif; ?>

    </body>
</html>