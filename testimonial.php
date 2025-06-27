<section class="testimonials section-padding" id="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center mb-4">
        <h6>Testimonials</h6>
        <h4>What They <em>Think</em></h4>
      </div>

      <div class="col-lg-12">
        <div class="owl-testimonials owl-carousel">
          <div class="item">
            <p>“SEA Catering really helped me stay consistent with my diet. The meals are tasty and perfectly portioned.”</p>
            <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
            <h5 class="name">Anisa R.</h5>
            <span class="role">Busy Professional</span>
          </div>
          <div class="item">
            <p>“I love how I can choose meals that suit my goals. Healthy eating has never been this easy!”</p>
            <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
            <h5 class="name">Kevin P.</h5>
            <span class="role">Fitness Enthusiast</span>
          </div>
          <div class="item">
            <p>“Reliable delivery, excellent service, and delicious food. Totally worth it!”</p>
            <div class="testimonial-rating">⭐⭐⭐⭐</div>
            <h5 class="name">Laras M.</h5>
            <span class="role">Mom of Two</span>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-12 ms-auto text-end">
          <a href="#" class="custom-btn btn" data-bs-toggle="modal" data-bs-target="#addtestimony">Add Testimony</a>
      </div>

      <div class="modal fade" id="addtestimony" tabindex="-1" aria-labelledby="addtestimonylabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="addtestimonylabel">Add Your Testimony</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="name" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Your name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="example@mail.com" required>
                </div>
                <div class="mb-3">
                  <label for="role" class="form-label">Occupation or Role</label>
                  <input type="text" class="form-control" id="role" placeholder="e.g., Student, Office Worker, Mom of Two">
                </div>
                <div class="mb-3">
                  <label class="form-label d-block">Rating</label>
                  <div class="rating-stars" id="ratingStars">
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
                  <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
              </form>
            </div>
            if login
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
