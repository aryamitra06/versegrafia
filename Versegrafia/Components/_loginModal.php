<?php
echo
'
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form action="Authentication/_handleLogin.php" method="POST">
                <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Enter your email..." name="loginEmail">
                <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Enter your password..." name="loginPassword">
                <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" class="btn btn-dark mt-4 float-end login-btn">Login</button>
                <button type="button" class="btn btn-light mt-4 float-end" data-bs-toggle="modal" data-bs-target="#signupModal" >Create New Account</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
'
?>