<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Edit Course</title>
  <style>
    input{
      width : 500px;
    }
  </style>
</head>

<?php
    $id = $_GET['id'];
    include './includes/db_conn.php';
    $sql = "SELECT * FROM course WHERE id = $id "; 
    $resu = mysqli_query($con, $sql);
    $courses = mysqli_fetch_array($resu, MYSQLI_ASSOC);
    
    $name = $courses['namee'];
    $duration = $courses['duration'];
    $assignedBy = $courses['assigned_by'];
    $assignedAt = $courses['assigned_at'];
      
?>

<body>
  <div class="d-flex align-items-center justify-content-center vh-100">
  <form method="POST">
  <h1 class="h3 mb-3">Edit informations</h1>
    <div>
      <label class="form-labe mb-2" for="name">Course Name</label>
      <input class="form-control mb-3" type="text" id="name" name="name" value="<?php echo $name; ?>">
    </div>
    <div>
      <label class="form-labe mb-2" for="duration">Course duration</label>
      <input class="form-control mb-3" type="text" id="duration" name="duration" value="<?php echo $duration; ?>">
    </div>
    <div>
      <label class="form-labe mb-2" for="assignedBy">Assigned By</label>
      <input class="form-control mb-3" type="text" id="assignedBy" name="assignedBy" value="<?php echo $assignedBy; ?>">
    </div>
    <div>
      <label class="form-labe mb-2" for="assignedAt">Assigned At</label>
      <input class="form-control mb-3" type="date" id="assignedAt" name="assignedAt" value="<?php echo $assignedAt; ?>">
    </div>
    <input type="submit" name="update" class="btn btn-info" value="Update">
  </form>
  </div>

  <?php
          if(isset($_POST['update'])){
            $namee = $_POST['name'];
            $duration = $_POST['duration'];
            $assigned_by = $_POST['assignedBy'];
            $assigned_at = $_POST['assignedAt'];
      
            $edit = "UPDATE course SET namee = '$namee', duration = '$duration', assigned_by='$assigned_by', assigned_at='$assigned_at' WHERE id = $id";
            $res = mysqli_query($con, $edit);
            echo "
            <script>
            window.location.href = 'Course.php';
            </script>";
          }  

    ?>
 
<script src="js/bootstrap.js"></script>

</body>
</html>