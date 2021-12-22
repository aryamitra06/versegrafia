<?php
    $Msg = "No search result found!";
    echo
    '
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <div class="container nosearch-container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fas fa-exclamation-triangle"></i></strong> '.$Msg.'
            <br> <br>
            <ul>
                <li> Make sure that all words are spelled correctly. </li>
                <li> Try different keywords. </li>
                <li> Try more general keywords. </li>
            </ul>    
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    </div>
    ';
?>