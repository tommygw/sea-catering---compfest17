<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>SEA Catering</title>

        <!-- CSS FILES -->        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

    </head>
    
    <body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

        <main>
          <?php
          $plan = isset($_GET['plan']) ? $_GET['plan'] : '';
          switch ($plan) {
            case '':
              include "meals_def.php";
              break;

            case 'diet':
              include "diet.php";
              break;

            case 'protein':
              include "protein.php";
              break;

            case 'royal':
              include "royal.php";
              break;

            default:
              echo "<h3>Page not Found!</h3>";
              break;
            }
          ?>

        </main>

<div class="modal fade" id="menuModal1" tabindex="-1" aria-labelledby="menuModal1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="menuModal1Label">Diet Plan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <p class="mb-2">Our top 3 meals in the <strong>Diet Plan</strong>:</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">🥗 Grilled Chicken Salad with Olive Oil Dressing</li>
          <li class="list-group-item">🍣 Baked Salmon with Asparagus</li>
          <li class="list-group-item">🍲 Lentil Soup with Whole Grain Bread</li>
        </ul>
        <br>
        <p><strong>Rp30.000/meal</strong></p>
        
        <a href="subs.php" class="btn btn-outline-warning">Subscribe</a>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="menuModal2" tabindex="-1" aria-labelledby="menuModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModal1Label">Protein Plan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-2">Our top 3 meals in the <strong>Protein Plan</strong>:</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">🥩 Grilled Beef Steak with Roasted Sweet Potatoes</li>
          <li class="list-group-item">🥘 Beef Stir-Fry with Bell Peppers and Broccoli</li>
          <li class="list-group-item">🍗 Chicken Breast with Quinoa and Green Beans</li>
        </ul>
        <br>
        <p><strong>Rp40.000/meal</strong></p>
        <a href="subs.php" class="btn btn-outline-warning">Subscribe</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="menuModal3" tabindex="-1" aria-labelledby="menuModal3Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModal1Label">Royal Plan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="mb-2">Our top 3 meals in the <strong>Royal Plan</strong>:</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">🐟 Smoked Salmon Bagel with Cream Cheese</li>
          <li class="list-group-item">🦆 Roasted Duck Breast with Mashed Pumpkin</li>
          <li class="list-group-item">🥩 Wagyu Beef Bowl with Truffle Oil</li>
        </ul>
        <br>
        <p><strong>Rp60.000/meal</strong></p>
        <a href="subs.php" class="btn btn-outline-warning">Subscribe</a>
      </div>
    </div>
  </div>
</div>

<?php
include "footer.php"
?>
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>