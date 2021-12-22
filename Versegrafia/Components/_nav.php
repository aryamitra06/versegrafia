<?php
include '_loginModal.php';
include '_signupModal.php';
session_start();
echo
'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
echo
'<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
  <a class="navbar-brand" href="#">Versegrafia</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Topics
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Street Photography</a></li>
          <li><a class="dropdown-item" href="#">Model Photography</a></li>
          <li><a class="dropdown-item" href="#">Food Photography</a></li>
        </ul>
      </li>
    </ul>';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{

  echo
  '
  <div class="col d-flex justify-content-end">
  <p class="nav-login-id"><i class="fas fa-user-check"></i> '. $_SESSION['user_name']. '</p>
  <a href="Authentication/_handleLogout.php"><button type="button" class="btn btn-dark">Logout</button></a>
  </div>
  ';
}
else
{
echo
'<div class="col d-flex justify-content-end">
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
<button type="button" class="btn btn-light button-margin" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
</div>';
}
echo
'</div>
</div>
</nav>';
//Authentication alerts
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  include 'Alerts/_signupSuccessAlert.php';
}   

elseif(isset($_GET['signupsuccess']) && $_GET['error']=="emailAlreadyExist"){
  include 'Alerts/_emailAlreadyExistAlert.php';
}  

elseif(isset($_GET['signupsuccess']) && $_GET['error']=="passwordsDoNotMatch"){
  include 'Alerts/_passwordsDoNotMatchAlert.php';
}  

elseif(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
  include 'Alerts/_loginSuccessAlert.php';
}  

elseif(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
  include 'Alerts/_loginSuccessAlert.php';
}

elseif(isset($_GET['loginsuccess']) && $_GET['error']=="emailorpasswordsDoNotMatch"){
  include 'Alerts/_loginEmailPassDoNotMatchAlert.php';
}


?>