<?php
    $successMsg = "Your're successfully logged in!";
    echo
    '
    <div class="container-fluid alert-container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-check-circle"></i></strong> '.$successMsg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    </div>
    ';
?>