      <!-- Page Sidebar -->
      <?php 
      include 'functions.php'; 
      include 'login-script.php';
      ?>
      <div id="sidebar">

        <img src="./images/E-class.svg" class="ps-3 py-3" alt="E-class" />
        <img src="./images/ycode.png" class="w-50 d-block mx-auto mt-5" alt="" />
        <h2 class="text-center fs-3 pt-3"><?php echo $_SESSION["fname"];  ?></h2>
        <p class="text-center text-info">Admin</p>

        <div class="text-center px-4 mt-5">

          <a href="./Dashboard.php" class="d-block nav-link text-dark my-3 <?php if(basename($_SERVER['REQUEST_URI']) == 'Dashboard.php') echo 'btn btn-info'; ?>"><img class="pe-2"
              src="./images/house-door.svg" alt="house-door" />Home</a>

          <a href="./Course.php" class="d-block nav-link text-dark my-3 <?php if(basename($_SERVER['REQUEST_URI']) == 'Course.php') echo 'btn btn-info'; ?>"><img class="pe-2" src="./images/bookmark.svg"
              alt="bookmark" />Course</a>

          <a href="./Student.php" class="d-block nav-link text-dark my-3 <?php if(basename($_SERVER['REQUEST_URI']) == 'Student.php') echo 'btn btn-info'; ?>"><img class="pe-2"
              src="./images/mortarboard.svg" alt="mortarboard" />Students</a>

          <a href="./payment.php" class="d-block nav-link text-dark my-3 <?php if(basename($_SERVER['REQUEST_URI']) == 'payment.php') echo 'btn btn-info'; ?>"><img class="pe-2"
              src="./images/currency-dollar.svg" alt="currency-dollar" />Payment</a>

          <a href="#" class="d-block nav-link text-dark my-3"><img class="pe-2" src="./images/file-earmark-break.svg"
              alt="file-earmark-break" />Report</a>

          <a href="#" class="d-block nav-link text-dark my-3"><img class="pe-2" src="./images/sliders.svg"
              alt="sliders" />Settings</a>

          <a href="includes/logout.php" class="nav-link text-center mt-5 text-dark">Log out
            <img src="./images/box-arrow-right.svg" class="ps-3" alt="bi-box-arrow-right" /></a>

        </div>
      </div>