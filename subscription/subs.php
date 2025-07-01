<?php
$prices = [
    'Diet' => 30000,
    'Protein' => 40000,
    'Royal' => 60000,
];

$allowed_plans = array_keys($prices);
$name_plan_initial = (isset($_GET['plan']) && in_array($_GET['plan'], $allowed_plans)) ? $_GET['plan'] : 'Diet';
$price_initial = $prices[$name_plan_initial];
?>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                <div>
                    <h4>Subscribe to <span id="detail-plan-title"><?php echo $name_plan_initial; ?></span> Plan</h4>
                    <div class="d-flex align-items-baseline gap-2">
                        <h2 class="mb-0 me-1" id="detail-weekly-price">Rp<?php echo number_format($price_initial, 0, ',', '.'); ?></h2>
                        <small class="text-muted">/week</small>
                    </div>

                    <button id="toggle-detail" class="btn btn-link text-decoration-none ps-0">
                        <span id="toggle-icon">▼</span> Show Plan Detail
                    </button>

                    <div id="plan-detail" style="display: none">
                        <ul class="list-unstyled">
                            <li>
                                <h6>Plan:</h6>
                                <div class="d-flex justify-content-between mb-3">
                                    <div><b id="detail-plan-name">Protein Plan</b></div>
                                    <div class="text-muted" style="font-size: 90%;" id="detail-price-per-meal">Rp30.000 per meal</div>
                                </div>
                            </li>
                            <li>
                                <h6>Meal Types:</h6>
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <ul class="list-unstyled ps-0 mb-0" id="detail-meal-list">
                                            <li><b>-</b></li>
                                        </ul>
                                    </div>
                                    <div class="text-muted" style="font-size: 90%;"><span id="detail-meal-count">0</span> meal types</div>
                                </div>
                            </li>
                            <li>
                                <h6>Delivery Days:</h6>
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <ul class="list-unstyled ps-0 mb-0" id="detail-day-list">
                                            <li><b>-</b></li>
                                        </ul>
                                    </div>
                                    <div class="text-muted" style="font-size: 90%;"><span id="detail-day-count">0</span> days</div>
                                </div>
                            </li>
                            <li class="border-top pt-2">
                                <h6>Total Price (per week):</h6>
                                <div id="detail-total-price-calculation">Rp0</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12 mx-auto">
                <form class="custom-form contact-form" action="subscription/submit_subscriptions.php" method="post" role="form">
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
                            <option value="" disabled>-- Choose a Plan --</option>
                            <option value="Diet" <?php echo ($name_plan_initial == 'Diet') ? 'selected' : ''; ?>>Diet Plan – Rp30.000 per meal</option>
                            <option value="Protein" <?php echo ($name_plan_initial == 'Protein') ? 'selected' : ''; ?>>Protein Plan – Rp40.000 per meal</option>
                            <option value="Royal" <?php echo ($name_plan_initial == 'Royal') ? 'selected' : ''; ?>>Royal Plan – Rp60.000 per meal</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Meal Type *</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input meal-checkbox" type="checkbox" name="meal_type[]" id="breakfast" value="Breakfast">
                            <label class="form-check-label" for="breakfast">Breakfast</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input meal-checkbox" type="checkbox" name="meal_type[]" id="lunch" value="Lunch">
                            <label class="form-check-label" for="lunch">Lunch</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input meal-checkbox" type="checkbox" name="meal_type[]" id="dinner" value="Dinner">
                            <label class="form-check-label" for="dinner">Dinner</label>
                        </div>
                        <small class="form-text text-muted">Select at least one.</small>
                    </div>

                    <div class="mb-3">
                        <label>Delivery Days *</label><br>
                        <div class="row">
                            <?php $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']; ?>
                            <?php foreach ($days as $day): ?>
                            <div class="col-6 col-md-4">
                                <input class="form-check-input day-checkbox" type="checkbox" name="delivery_days[]" id="<?php echo strtolower($day); ?>" value="<?php echo $day; ?>">
                                <label for="<?php echo strtolower($day); ?>"><?php echo $day; ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                         <small class="form-text text-muted">Select at least one.</small>
                    </div>

                    <div class="mb-3">
                        <label for="allergies">Allergies / Dietary Restrictions</label>
                        <textarea name="allergies" id="allergies" rows="3" class="form-control" placeholder="e.g., peanuts, gluten, dairy..."></textarea>
                    </div>

                    <button type="submit" name="submit_subscriptions" class="form-control btn btn-primary">Send Subscription</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {

      const planSelect = document.getElementById('plan');
      const mealCheckboxes = document.querySelectorAll('.meal-checkbox');
      const dayCheckboxes = document.querySelectorAll('.day-checkbox');
      const detailPlanName = document.getElementById('detail-plan-name');
      const detailPlanTitle = document.getElementById('detail-plan-title');
      const detailWeeklyPrice = document.getElementById('detail-weekly-price'); 
      const detailPricePerMeal = document.getElementById('detail-price-per-meal');
      const detailMealList = document.getElementById('detail-meal-list');
      const detailMealCount = document.getElementById('detail-meal-count');
      const detailDayList = document.getElementById('detail-day-list');
      const detailDayCount = document.getElementById('detail-day-count');
      const detailTotalPrice = document.getElementById('detail-total-price-calculation');
      
      const toggleButton = document.getElementById('toggle-detail');
      const planDetailDiv = document.getElementById('plan-detail');
      const toggleIcon = document.getElementById('toggle-icon');

      toggleButton.addEventListener('click', function() {
          const isHidden = planDetailDiv.style.display === 'none';
          planDetailDiv.style.display = isHidden ? 'block' : 'none';
          toggleIcon.textContent = isHidden ? '▲' : '▼';
          this.childNodes[this.childNodes.length - 1].nodeValue = isHidden ? ' Hide Plan Detail' : ' Show Plan Detail';
      });

      const prices = {
          'Diet': 30000,
          'Protein': 40000,
          'Royal': 60000
      };

      function updatePlanDetails() {
          const selectedPlan = planSelect.value;
          const pricePerMeal = prices[selectedPlan] || 0;

          const selectedMeals = Array.from(mealCheckboxes)
              .filter(cb => cb.checked)
              .map(cb => cb.value);

          const selectedDays = Array.from(dayCheckboxes)
              .filter(cb => cb.checked)
              .map(cb => cb.value);

          const mealCount = selectedMeals.length;
          const dayCount = selectedDays.length;
          const weeklyTotal = pricePerMeal * mealCount * dayCount;
          
          const formatToIDR = (number) => new Intl.NumberFormat('id-ID', {
              style: 'currency',
              currency: 'IDR',
              minimumFractionDigits: 0
          }).format(number);
          
          detailPlanTitle.textContent = selectedPlan ? `${selectedPlan}` : '...';
          detailWeeklyPrice.textContent = formatToIDR(weeklyTotal);

          detailPlanName.textContent = selectedPlan ? `${selectedPlan} Plan` : '...';
          detailPricePerMeal.textContent = `${formatToIDR(pricePerMeal)} per meal`;
          
          detailMealList.innerHTML = selectedMeals.length > 0 ? selectedMeals.map(meal => `<li><b>${meal}</b></li>`).join('') : '<li><b>-</b></li>';
          detailMealCount.textContent = mealCount;

          detailDayList.innerHTML = selectedDays.length > 0 ? selectedDays.map(day => `<li><b>${day}</b></li>`).join('') : '<li><b>-</b></li>';
          detailDayCount.textContent = dayCount;
          
          let calculationText = `${formatToIDR(pricePerMeal)} x ${mealCount} meals x ${dayCount} days = <b>${formatToIDR(weeklyTotal)}</b>`;
          if (mealCount === 0 || dayCount === 0 || !selectedPlan) {
              calculationText = "Please select a plan, meal type, and delivery days.";
          }
          detailTotalPrice.innerHTML = calculationText;
      }
      planSelect.addEventListener('change', updatePlanDetails);
      mealCheckboxes.forEach(cb => cb.addEventListener('change', updatePlanDetails));
      dayCheckboxes.forEach(cb => cb.addEventListener('change', updatePlanDetails));

      updatePlanDetails();
  });
</script>