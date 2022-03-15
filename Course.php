<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Course</title>
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
        <h3>Course List</h3>
        <div>
          <img src="./images/sort.svg" class="px-2" alt="sort" />
          <button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
            ADD NEW COURSE
          </button>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new course</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST">
                <div>
                  <input class="form-control mb-3" type="hidden" id="id" name="id">
                </div>
                <div>
                  <label class="form-labe mb-2" for="course name">Course name</label>
                  <input class="form-control mb-3" type="text" id="name" name="name" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="course duration">Course duration</label>
                  <input class="form-control mb-3" type="text" id="duration" name="duration" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="assigned by">Assigned by</label>
                  <input class="form-control mb-3" type="text" id="assigned-by" name="assignedBy" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="enroll">Assigned at</label>
                  <input class="form-control mb-3" type="date" id="assigned-at" name="assignedAt" required>
                </div>
                <div>
                  <input type="submit" name="save" class="btn btn-info my-2 text-light" value="Add">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />
    <?php
        $sql = 'SELECT * FROM course'; 
        $res = mysqli_query($con, $sql);
        $courses = mysqli_fetch_all($res, MYSQLI_ASSOC);

        if (isset($_POST['save'])) {
          $namee = $_POST['name'];
          $duration = $_POST['duration'];
          $assigned_by = $_POST['assignedBy'];
          $assigned_at = $_POST['assignedAt'];

          $add = "INSERT INTO course (namee, duration, assigned_by, assigned_at) VALUES('$namee', '$duration', ' $assigned_by', ' $assigned_at')";

          $res = $con -> query($add);

          echo "
          <script>
          window.location.href = 'Course.php';
          </script>";
            
        }

?>
    <div class="mx-5 tables">
      <table class="table table-borderless table-responsive table-striped">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Duration</th>
            <th style="white-space: nowrap !important;">Assigned By</th>
            <th style="white-space: nowrap !important;">Assigned At</th>
          </tr>
        </thead>
        <?php
          foreach($courses as $course){
        ?>
        <tbody>
          <tr>
            <th></th>
            <td style="padding: 15px 5px !important; white-space: nowrap !important;"><?php echo $course['namee'] ?></td>
            <td style="padding: 15px 5px !important; white-space: nowrap !important;"><?php echo $course['duration'] ?></td>
            <td style="padding: 15px 5px !important; white-space: nowrap !important;"><?php echo $course['assigned_by'] ?></td>
            <td style="padding: 15px 5px !important; white-space: nowrap !important;"><?php echo $course['assigned_at'] ?></td>
            <?php echo '<td style="padding: 5px !important;"><a href="editc.php?id='.$course['id'].'" class="btn btn-info text-light"> Edit </a></td>'; ?>
            <?php echo '<td style="padding: 5px !important;"><a href="removec.php?id='.$course['id'].'" class="btn btn-danger text-light"> Delete </a></td>'; ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>
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