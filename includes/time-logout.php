
<?php 
    if(time() - $_SESSION['login_time'] > 3600) { 
        session_destroy();
        header('Location:  index.php'); 
        exit;
    } 
    else {
        $_SESSION['login_time'] = time(); 
    }