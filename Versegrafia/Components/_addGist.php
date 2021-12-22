<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
echo
'
<div class="modal fade" id="addGistModal" tabindex="-1" aria-labelledby="addGistModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addGistModalLabel">Add New Gist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
      <form action="'. $_SERVER["REQUEST_URI"] . '" method="POST">
          <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" placeholder="Enter gist title..." name= "gist_title">
          <label for="floatingInput">Title</label>
          </div>
          <div class="form-floating mb-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="gist_desc"></textarea>
          <label for="floatingTextarea2">Description</label>
          </div>
          <button type="submit" class="btn btn-dark mt-4 float-end login-btn">Post</button>
          <button type="button" class="btn btn-light mt-4 float-end login-btn" data-bs-dismiss="modal">Back to Gists</button>         
      </form>
  </div>
      </div>
    </div>
  </div>
</div>';
}
?>