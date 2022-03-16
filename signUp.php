<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/bootstrapSign-In.css" />
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <title>Sign Up</title>
  <style>
  body {
    background: linear-gradient(69.66deg, #00c1fe 19.39%, #faffc1 96.69%);
    overflow-x: hidden;
  }

  .wrapper {
    height: 100vh;
  }

  ::placeholder {
    font-size: smaller;
  }

  .error {
    font-size: 17px;
    margin-top: 6px;
  }

  </style>
</head>

<body>
  <div class="wrapper d-flex justify-content-center align-items-center">
    <div class="bg-light w-100 mx-3 rounded p-5" style="max-width: 475px">
      <img src="./images/E-class.svg" alt="E-class" />

      <h1 class="text-center fs-2 fw-bolder pt-5">SIGN UP</h1>

      <p class="text-center text-secondary fw-lighter">
        Enter your credentials to create your account
      </p>
      <form action="includes/signUp-script.php" method="POST" class="mt-5" id="upForm">
      <div id="error"></div>
        <label for="upName" class="mb-2 fw-bold text-secondary">Full Name</label>
        <input type="text" class="form-control py-2" name="fname" id="upName" placeholder="Enter your full name" />

        <label for="upEmail" class="mb-2 fw-bold mt-3 text-secondary">Email</label>
        <input type="email" class="form-control py-2" name="email" id="upEmail" placeholder="Enter your email" />

        <label for="upPwd" class="mb-2 fw-bold mt-3 text-secondary">Password</label>
        <input type="password" class="form-control py-2" name="password" id="upPwd" placeholder="Enter your password" />

        <label for="upRpwd" class="mb-2 fw-bold mt-3 text-secondary">Repeat Your Password</label>
        <input type="password" class="form-control py-2" name="Rpassword" id="upRpwd" placeholder="Repeat your password" />

        <button type="submit" name="signup" id="signup" class="btn fw-500 text-light btn-info w-100 my-4">
          SIGN UP
        </button>
      </form>
      <p class="text-center fw-500">
        You already have an account
        <a href="index.php" class="fw-bold text-info">Sign In</a>
      </p>
      <?php
          if (isset($_GET["error"])) {

            if ($_GET["error"] == "emptyinputs") {
              echo '<div class="alert alert-danger text-center">Fill all the fields</div>';
            }
            else if ($_GET["error"] == "invalidemail") {
              echo '<div class="alert alert-danger text-center">Invalid email format</div>';
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
              echo '<div class="alert alert-danger text-center">Passwords dosent match</div>';
            }
            else if ($_GET["error"] == "emailAlreadyExist") {
              echo '<div class="alert alert-danger text-center">This email is already exist</div>';
            }
          }
      ?>
    </div>
  </div>
  <script src="js/bootstrap.js"></script>
  <script src="js/upValid.js"></script>
</body>

</html>