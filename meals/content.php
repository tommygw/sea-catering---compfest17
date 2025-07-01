<?php
include 'auth/db_connect.php';
include 'auth/login-register.php';
$query = "SELECT * FROM mealplans";
$result = mysqli_query($conn, $query);

?>
            <section class="mt-3 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center mb-4">
                            <h2>Our Meal Plans</h2>
                        </div>
                        <?php
                          $index = 1;
                          while ($row = mysqli_fetch_assoc($result)):
                          ?>
                          <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                            <a data-bs-toggle="modal" data-bs-target="#menuModal<?= $index ?>" class="text-decoration-none text-dark">
                              <div class="custom-block-wrap">
                                <img src="<?= htmlspecialchars($row['image_url']) ?>" class="img-fluid meal-image" alt="">
                                <div class="custom-block">
                                  <div class="custom-block-body">
                                    <h5 class="mb-3"><?= htmlspecialchars($row['name']) ?></h5>
                                    <p><?= htmlspecialchars($row['description']) ?></p>
                                    <div class="d-flex align-items-center my-2">
                                      <p class="mb-0"><strong>Click to More Details</strong></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                          <?php
                          $index++;
                          endwhile;
                          ?>
                    </div>
                </div>
            </section>


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
                    
                    <a href="?page=subscription&plan=Diet" class="btn btn-outline-warning">Subscribe</a>
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
                    <a href="?page=subscription&plan=Protein" class="btn btn-outline-warning">Subscribe</a>
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
                    <a href="?page=subscription&plan=Royal" class="btn btn-outline-warning">Subscribe</a>
                  </div>
                </div>
              </div>
            </div>
