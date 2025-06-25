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
            <section class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center mb-4">
                            <h2>Our Meal Plans</h2>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <a data-bs-toggle="modal" data-bs-target="#menuModal1" class="text-decoration-none text-dark">
                                <div class="custom-block-wrap">
                                    <img src="images/plans/plan1.jpg" class="img-fluid" alt="">

                                    <div class="custom-block">
                                        <div class="custom-block-body">
                                            <h5 class="mb-3">Diet Plan</h5>

                                            <p>Low Calorie, High Fiber, Portion Controlled</p>

                                            <div class="d-flex align-items-center my-2">
                                                <p class="mb-0">
                                                    <strong>Click to More Details</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <a data-bs-toggle="modal" data-bs-target="#menuModal2" class="text-decoration-none text-dark">
                                <div class="custom-block-wrap">
                                    <img src="images/plans/plan1.jpg" class="img-fluid" alt="">

                                    <div class="custom-block">
                                        <div class="custom-block-body">
                                            <h5 class="mb-3">Protein Plan</h5>

                                            <p>An ideal choice for those focusing on muscle building, recovery, and energy</p>

                                            <div class="d-flex align-items-center my-2">
                                                <p class="mb-0">
                                                    <strong>Click to More Details</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <a data-bs-toggle="modal" data-bs-target="#menuModal3" class="text-decoration-none text-dark">
                                <div class="custom-block-wrap">
                                    <img src="images/plans/plan1.jpg" class="img-fluid" alt="">

                                    <div class="custom-block">
                                        <div class="custom-block-body">
                                            <h5 class="mb-3">Royal Plan</h5>

                                            <p>Balanced meals with a premium feel — delicious, nourishing, and a joy to eat</p>

                                            <div class="d-flex align-items-center my-2">
                                                <p class="mb-0">
                                                    <strong>Click to More Details</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

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
        
        <a href="index.php" class="btn btn-outline-warning">Subscribe</a>
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
        <a href="index.php" class="btn btn-outline-warning">Subscribe</a>
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
        <a href="index.php" class="btn btn-outline-warning">Subscribe</a>
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