<?php

    if (isset($_POST["signin"])) {
      $email = $_POST['email'];
      $pwd = $_POST['password'];

      include 'db_conn.php';
      include 'functions.php';

      if (emptyInputLogin($email, $pwd) === true ) {
        header("location: ../index.php?error=emptyInput");
        exit();
      }
            
      loginUser($con, $email, $pwd);

    }