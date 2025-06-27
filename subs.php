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
            <section class="mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                            <div>
                                <h4>Subscribe to Diet Plan</h4>
                                <div class="d-flex align-items-baseline gap-2">
                                    <h2 class=mb-0 me-1>Rp30.0000</h2>
                                    <small class=text-muted>/week</small>
                                </div>

                                <button id="toggle-detail" class="btn btn-link text-decoration-none">
                                  <span id="toggle-icon">▼</span> Show Plan Detail
                                </button>
                                <div id="plan-detail" style="display: none">
                                  <ul class="list-unstyled">
                                    <li>
                                        <h6>Plan:</h6>
                                        <div class="d-flex justify-content-between mb-3">
                                        <div><b>Protein Plan</b></div>
                                        <div class="text-muted" style="font-size: 90%;">Rp30.000 per meal</div>
                                        </div>
                                    </li>
                                    <li>
                                        <h6>Meal Types:</h6>
                                        <div class="d-flex justify-content-between mb-3">
                                        <div><b>Breakfast + Dinner</b></div>
                                        <div class="text-muted" style="font-size: 90%;">2 meal types</div>
                                        </div>
                                    </li>
                                    <li>
                                        <h6>Delivery Days:</h6>
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <ul>
                                                    <li><b>Monday</b></li>
                                                    <li><b>Monday</b></li>
                                                    <li><b>Monday</b></li>
                                                    <li><b>Monday</b></li>
                                                    <li><b>Monday</b></li>
                                                    <li><b>Monday</b></li>
                                                    <li><b>Monday</b></li>
                                                    <li><b>Monday</b></li>
                                                </ul>
                                            </div>
                                        <div class="text-muted" style="font-size: 90%;">7 days</div>
                                    </li>
                                    <li>
                                        <h6>Total Price:</h6>
                                        <div>Rp40.000 x 2 x 5 x 4,3 = Rp1.720.000</div>
                                    </li>
                                  </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 mx-auto">
                            <form class="custom-form contact-form" action="#" method="post" role="form">
                            <h2>Form Subscription</h2>

                            <div class="mb-3">
                              <label for="fullname">Full Name *</label>
                              <input type="text" name="fullname" id="fullname" class="form-control" required>
                            </div>

                            <div class="mb-3">
                              <label for="tel">Active Phone Number *</label>
                              <input type="tel" name="tel" id="tel" class="form-control" pattern="[0-9]{10,13}" required placeholder="e.g., 081234567890">
                              <small class="form-text text-muted">10–13 digits (numbers only)</small>
                            </div>

                            <div class="mb-3">
                              <label for="plan">Plan Selection *</label>
                              <select name="plan" id="plan" class="form-control" required>
                                <option value="" disabled selected>-- Choose a Plan --</option>
                                <option value="diet">Diet Plan – Rp30.000,00 per meal</option>
                                <option value="protein">Protein Plan – Rp40.000,00 per meal</option>
                                <option value="royal">Royal Plan – Rp60.000,00 per meal</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label>Meal Type *</label><br>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="meal_type[]" id="breakfast" value="Breakfast" required>
                                <label class="form-check-label" for="breakfast">Breakfast</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="meal_type[]" id="lunch" value="Lunch">
                                <label class="form-check-label" for="lunch">Lunch</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="meal_type[]" id="dinner" value="Dinner">
                                <label class="form-check-label" for="dinner">Dinner</label>
                              </div>
                              <small class="form-text text-muted">Select at least one.</small>
                            </div>

                            <div class="mb-3">
                              <label>Delivery Days *</label><br>
                              <div class="row">
                                <div class="col-6 col-md-4">
                                  <input type="checkbox" name="delivery_days[]" id="monday" value="Monday">
                                  <label for="monday">Monday</label>
                                </div>
                                <div class="col-6 col-md-4">
                                  <input type="checkbox" name="delivery_days[]" id="tuesday" value="Tuesday">
                                  <label for="tuesday">Tuesday</label>
                                </div>
                                <div class="col-6 col-md-4">
                                  <input type="checkbox" name="delivery_days[]" id="wednesday" value="Wednesday">
                                  <label for="wednesday">Wednesday</label>
                                </div>
                                <div class="col-6 col-md-4">
                                  <input type="checkbox" name="delivery_days[]" id="thursday" value="Thursday">
                                  <label for="thursday">Thursday</label>
                                </div>
                                <div class="col-6 col-md-4">
                                  <input type="checkbox" name="delivery_days[]" id="friday" value="Friday">
                                  <label for="friday">Friday</label>
                                </div>
                                <div class="col-6 col-md-4">
                                  <input type="checkbox" name="delivery_days[]" id="saturday" value="Saturday">
                                  <label for="saturday">Saturday</label>
                                </div>
                                <div class="col-6 col-md-4">
                                  <input type="checkbox" name="delivery_days[]" id="sunday" value="Sunday">
                                  <label for="sunday">Sunday</label>
                                </div>
                              </div>
                            </div>

                            <div class="mb-3">
                              <label for="allergies">Allergies / Dietary Restrictions</label>
                              <textarea name="allergies" id="allergies" rows="3" class="form-control" placeholder="e.g., peanuts, gluten, dairy..."></textarea>
                            </div>

                            <button type="submit" class="form-control btn btn-primary">Send Subscription</button>
                          </form>

                        </div>

                    </div>
                </div>
            </section>
        </main>

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