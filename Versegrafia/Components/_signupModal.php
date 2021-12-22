<?php
echo
'
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
      <form action="Authentication/_handleSignup.php" method="POST">
          <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" placeholder="Enter your name..." name="signupName">
          <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="Enter your email..." name="signupEmail">
          <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Enter your password..." name="signupPassword">
          <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Enter your password..." name="signupConfirmPassword">
          <label for="floatingPassword">Confirm Password</label>
          </div>
          <button type="submit" class="btn btn-dark mt-4 float-end login-btn">Signup</button>
          <button type="button" class="btn btn-light mt-4 float-end" data-bs-toggle="modal" data-bs-target="#loginModal">Login if existing account</button>
      </form>
  </div>
      </div>
    </div>
  </div>
</div>
'
?>