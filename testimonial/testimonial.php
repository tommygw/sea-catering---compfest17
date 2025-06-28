<?php
include 'auth/db_connect.php';

$query = "SELECT * FROM testimonials ORDER BY rating DESC";
$result = mysqli_query($conn, $query);
?>

<section class="testimonials section-padding" id="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-4">
        <h6>Testimonials</h6>
        <h4>What They <em>Think</em></h4>
      </div>

      <div class="col-lg-12">
        <div class="owl-testimonials owl-carousel">
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="item">
            <p>“<?php echo htmlspecialchars($row['review_message']); ?>”</p>
            <div class="testimonial-rating">
              <?php
                for ($i = 0; $i < $row['rating']; $i++) {
                  echo '⭐';
                }
              ?>
            </div>
            <h5 class="name"><?php echo htmlspecialchars($row['customer_name']); ?></h5>
            <span class="role"><?php echo htmlspecialchars($row['role']); ?></span>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      
      <div class="col-lg-3 col-12 ms-auto text-end">
          <a href="#" class="custom-btn btn" data-bs-toggle="modal" data-bs-target="#addtestimony">Add Testimony</a>
      </div>

      <div class="modal fade" id="addtestimony" tabindex="-1" aria-labelledby="addtestimonylabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addtestimonylabel"><?php
                if (!isset($_SESSION['email'])) {
                  echo "You Must Login First";
                } else {
                  echo "Add Your Testimony";
                }
                ?>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="testimonial/process_testimonial.php" id="testimonialForm">
                <div class="mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" name="full_name" class="form-control" id="name" placeholder="Your name" required>
                </div>
                <div class="mb-3">
                  <label for="role" class="form-label">Occupation or Role</label>
                  <input type="text" name="role" class="form-control" id="role" placeholder="e.g., Student, Office Worker, Mom of Two">
                </div>
                <div class="mb-3">
                  <label class="form-label d-block">Rating</label>
                  <div class="rating-stars" name="rating" id="ratingStars">
                    <input type="hidden" name="rating" id="ratingValue" value="0" required>
                    <i class="fa-solid fa-star" data-value="1"></i>
                    <i class="fa-solid fa-star" data-value="2"></i>
                    <i class="fa-solid fa-star" data-value="3"></i>
                    <i class="fa-solid fa-star" data-value="4"></i>
                    <i class="fa-solid fa-star" data-value="5"></i>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Review Message</label>
                  <textarea class="form-control" name="review_message" id="message" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                  <?php
                  $btnClass = isset($_SESSION['email']) ? 'btn btn-primary' : 'btn btn-secondary disabled';
                  ?>
                  <button type="submit" name="submit_testimony" class="<?php echo $btnClass; ?>"><?php echo isset($_SESSION['email']) ? 'Send' : 'Login Required'; ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
