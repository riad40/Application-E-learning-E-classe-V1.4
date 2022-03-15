<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Student</title>
  <style>
  body {
    background: #f8f8f8;
  }
  </style>
</head>

<body>

  <div class="d-flex" id="page">

    <?php
      include './includes/sidebar.php'
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
      include './includes/time-logout.php';

      ?>

      <div class="mx-4 py-3 d-flex align-items-center justify-content-between my-nav">
        <h3>Students List</h3>
          <div>
          <img src="./images/sort.svg" class="px-2" alt="sort" />
          <button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
            ADD NEW STUDENTS
          </button>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new student</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST">
              <div>
                  <input class="form-control mb-3" type="hidden" id="id" name="id">
                </div>
                <div>
                  <input class="form-control mb-3" type="hidden" id="image" name="image">
                </div>
                <div>
                  <label class="form-labe mb-2" for="name">Name</label>
                  <input class="form-control mb-3" type="text" id="name" name="name" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="email">Email</label>
                  <input class="form-control mb-3" type="email" id="email" name="email" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="phone">Phone Number</label>
                  <input class="form-control mb-3" type="number" id="phone" name="phone" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="enroll">Enroll Number</label>
                  <input class="form-control mb-3" type="number" id="enroll" name="enroll" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="date">Date Of Admession</label>
                  <input class="form-control mb-3" type="date" id="date" name="date">
                </div>
                <input type="submit" name="save" class="btn btn-info my-2 text-light" value="Add">
              </form>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <?php

        $sql = 'SELECT * FROM studentsinfo'; 
        $res = mysqli_query($con, $sql);
        $students = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if (isset($_POST['save'])) {
          $namee = $_POST['name'];
          $email = $_POST['email'];
          $phone_number = $_POST['phone'];
          $enroll_number = $_POST['enroll'];
          $date_of_admession = $_POST['date']; 

          $add = "INSERT INTO studentsinfo (namee, email, phone_number, studentsinfo.enroll_number,date_of_admession) VALUES('$namee', '$email', '$phone_number', '$enroll_number', '$date_of_admession')";

          $res = mysqli_query($con, $add);

          echo "
          <script>
          window.location.href = 'Student.php';
          </script>";
            
        }
        
      ?>
      <div class="tables">
        <table class="table table-responsive table-borderless">
          <thead class="text-secondary fw-lighter">
            <tr>
              <th></th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th style="white-space: nowrap !important;">Enroll Number</th>
              <th style="white-space: nowrap !important;">Date Of Admission</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach($students as $student){
          ?>
            <tr class="my-table">
              <th>
                <img src="./images/pexels-photo-2379004 1.png" class="ps-3" alt="pexels-photo-2379004" />
              </th>
              <td class="pt-4"><?php  echo $student['namee'];  ?></td>
              <td class="pt-4"><?php  echo $student['email'];  ?></td>
              <td class="pt-4"><?php  echo $student['phone_number'];  ?></td>
              <td class="pt-4"><?php  echo $student['enroll_number'];  ?></td>
              <td class="pt-4" style="white-space: nowrap !important;"><?php  echo $student['date_of_admession'];  ?>
              </td>
              <?php echo '<td class="pt-4"><a href="edit.php?id='.$student['id'].'"><img src="./images/pen.svg" alt="pen" /></a></td>' ?>
              <?php echo '<td class="pt-4"><a href="remove.php?id='.$student['id'].'"><img src="./images/trash.svg" alt="trash" /></a></td>' ?>
            </tr>
          <?php }  ?>
          </tbody>
        </table>
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