
    <div class="modal fade auth-modal" id="loginRegisterModal" tabindex="-1" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0">
                <ul class="nav nav-tabs w-100" id="authTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">Login</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-tab-pane" type="button" role="tab" aria-controls="register-tab-pane" aria-selected="false">Register</button>
                  </li>
                </ul>
            </div>
          <div class="modal-body">
              <div id="auth-feedback" class="d-none"></div>
              <div class="tab-content" id="authTabContent">
                <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" tabindex="0">
                    <form method="post" action="auth/auth_login.php" id="loginForm">
                        <div class="form-group"><i class="fa fa-envelope form-icon"></i><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                        <div class="form-group"><i class="fa fa-lock form-icon"></i><input type="password" name="password" class="form-control" placeholder="Password" required></div>
                        <button type="submit" class="btn btn-submit mt-4" name="login">Login</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="register-tab-pane" role="tabpanel" tabindex="0">
                     <form method="post" action="auth/auth_register.php" id="registerForm">
                        <div class="form-group"><i class="fa fa-user form-icon"></i><input type="text" name="full_name" class="form-control" placeholder="Full Name" required></div>
                        <div class="form-group"><i class="fa fa-envelope form-icon"></i><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                        <div class="form-group"><i class="fa fa-lock form-icon"></i><input type="password" name="password" class="form-control" placeholder="Password" required></div>
                        <div class="form-group"><i class="fa fa-lock form-icon"></i><input type="password" name="repassword" class="form-control" placeholder="Confirm Password" required></div>
                        <button type="submit" class="btn btn-submit mt-4" name="register">Register</button>
                    </form>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
