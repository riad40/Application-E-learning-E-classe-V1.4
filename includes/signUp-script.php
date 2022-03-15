<?php

if (isset($_POST["signup"])) {
  $name = $_POST['fname'];
  $email = $_POST['email'];
  $pwd = $_POST['password'];
  $Rpwd = $_POST['Rpassword'];

  include 'db_conn.php';
  include 'functions.php';

  if (emptyInputSignup($name, $email, $pwd, $Rpwd) === true ) {
    header("location: ../signUp.php?error=emptyInput");
    exit();
  }
  if (invalidEmail($email) === true ) {
    header("location: ../signUp.php?error=invalidEmail");
    exit();
  }
  if (passwordMatch($pwd, $Rpwd) === true ) {
    header("location: ../signUp.php?error=passwordsdontmatch");
    exit();
  }
  if (emailExist($con, $email) === true ) {
    header("location: ../signUp.php?error=emailAlreadyExist");
    exit();
  }

  createUser($con, $name, $email, $pwd);

}
