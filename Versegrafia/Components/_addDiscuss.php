<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  echo
  '
  <div class="modal fade" id="addDiscussModal" tabindex="-1" aria-labelledby="addDiscussModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDiscussModalLabel">Write your Discuss</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="container">
        <form action="'. $_SERVER["REQUEST_URI"] . '" method="POST">
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Type your discuss..." name= "discuss_content">
            <label for="floatingInput">What\'s your view?</label>
            </div>
            <button type="submit" class="btn btn-dark mt-4 float-end login-btn">Post</button>
            <button type="button" class="btn btn-light mt-4 float-end login-btn" data-bs-dismiss="modal">Back to Discussion</button>         
        </form>
    </div>
        </div>
      </div>
    </div>
  </div>';
}
?>