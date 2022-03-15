<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css">
  <title>Dashboard</title>
  <style>
  body {
    overflow-x: hidden;
  }
  </style>
</head>

<body>

  <div class="d-flex" id="page">

    <?php
      include './includes/sidebar.php';
    ?>

    <!-- Page Content --> 
    <div id="content" class="container-fluid">

      <?php 
        include './includes/navbar.php';
        include './includes/db_conn.php';
        if (!isset($_SESSION['id'])) {
          header("location: index.php");
          exit();
        }
        // else {
        //   if(!isset($_COOKIE['lifetime'])) {
        //     header("location: index.php");
        //     exit();
        //   }
        // }
        include './includes/time-logout.php';
        ?>

      <div class="row px-3">
        <div class="col my-3">
          <ul class="card1 rounded p-3" style="min-width: 255px; list-style: none;">
            <li><img src="./images/graduation.svg" alt="graduation" /></li>
            <li class="py-2">Students</li>
            <li class="text-end fw-bold fs-2 pt-3">
              <?php  
                $sql = 'SELECT * FROM studentsinfo'; 
                $res = mysqli_query($con, $sql);
                $blocks = mysqli_num_rows($res);
                echo $blocks;  
                ?></li>
          </ul>
        </div>
        <div class="col my-3">
          <ul class="card2 rounded p-3" style="min-width: 255px; list-style: none;">
            <li><img src="./images/save.svg" alt="save" /></li>
            <li class="py-2">Course</li>
            <li class="text-end fw-bold fs-2 pt-3">
              <?php 
                $sql = 'SELECT * FROM course'; 
                $res = mysqli_query($con, $sql);
                $blocks = mysqli_num_rows($res);
                echo $blocks;  
                ?></li>
          </ul>
        </div>
        <div class="col my-3">
          <ul class="card3 rounded p-3" style="min-width: 255px; list-style: none;">
            <li><img src="./images/dollar.svg" alt="dollar" /></li>
            <li class="py-2">Payments</li>
            <li class="text-end fw-bold fs-2 pt-3">
              <span class="fs-4 px-2">DHS</span>
              <?php
                $sql = 'SELECT SUM(balance_amount) FROM payments_details'; 
                $res = mysqli_query($con, $sql);
                $col = mysqli_fetch_assoc($res);
                echo $col['SUM(balance_amount)'];
              ?>
            </li>
          </ul>
        </div>
        <div class="col my-3">
          <ul class="card4 rounded p-3" style="min-width: 255px; list-style: none;">
            <li><img src="./images/users.svg" alt="users" /></li>
            <li class="py-2">Users</li>
            <li class="text-end fw-bold fs-2 pt-3">
              <?php 
                $sql = 'SELECT * FROM comptes'; 
                $res = mysqli_query($con, $sql);
                $blocks = mysqli_num_rows($res);
                echo $blocks;  
                ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <script src="./js/bootstrap.js"></script>

  <script>
  var element = document.getElementById("page");
  var toggleButton = document.getElementById("menu-toggle");

  toggleButton.onclick = function() {
    element.classList.toggle("toggled");
  };
  </script>

</body>

</html>