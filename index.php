<?php
  session_start();
  if (isset($_SESSION['id'])) {
    header('location: Dashboard.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bootstrapSign-In.css" />
    <link rel="stylesheet" href="./css/bootstrap.css" />
    <title>Sign In</title>
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
    </style>
</head>

<body>
    <div class="wrapper d-flex justify-content-center align-items-center">
        <div class="bg-light w-100 mx-3 rounded p-5" style="max-width: 475px">
            <img src="./images/E-class.svg" alt="E-class" />

            <h1 class="text-center fs-2 fw-bolder pt-5">SIGN IN</h1>

            <p class="text-center text-secondary fw-lighter">
                Enter your credentials to access your account
            </p>
            <form action="includes/login-script.php" method="POST" class="mt-5">
                <label class="mb-2 fw-bold text-secondary">Email</label>
                <input type="email" class="form-control py-2" name="email" placeholder="Enter your email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email']; }  ?>"/>

                <label class="mb-2 fw-bold mt-3 text-secondary">Password</label>
                <input type="password" class="form-control py-2" name="password" placeholder="Enter your password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password']; }  ?>"/>

                <div class="form-check mt-3">
                    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" <?php if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){?> checked <?php }?>>
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>

                <button type="submit" name="signin" class="btn fw-500 text-light btn-info w-100 my-4">
                    SIGN IN
                </button>

            </form>
            <p class="text-center fw-500">
                Forgot your password?
                <a href="#" class="fw-bold text-info">Reset Password</a>
            </p>
            <?php
                if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyInput") {
                    echo '<div class="alert alert-danger text-center">Please fill all fileds</div>';
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo '<div class="alert alert-danger text-center">incorrect login informations</div>';
                }
                }
            ?>
        </div>
    </div>
    <script src="./js/bootstrap.js"></script>
</body>

</html>