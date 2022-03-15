<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.css">
  <title>Edit</title>
  <style>
    input{
      width : 500px;
    }
  </style>
</head>

<?php
    $id = $_GET['id'];
    include './includes/db_conn.php';     
    $sql = "SELECT * FROM studentsinfo WHERE id = $id "; 
    $resu = mysqli_query($con, $sql);
    $students = mysqli_fetch_array($resu, MYSQLI_ASSOC);
    
    $name = $students['namee'];
    $email = $students['email'];
    $phone = $students['phone_number'];
    $enroll = $students['enroll_number'];
    $date = $students['date_of_admession'];
      
?>

<body>
  <div class="d-flex align-items-center justify-content-center vh-100">
  <form method="POST">
  <h1 class="h3 mb-3">Edit informations</h1>
    <div>
      <label class="form-labe mb-2" for="name">Name</label>
      <input class="form-control mb-3" type="text" id="name" name="name" value="<?php echo $name; ?>">
    </div>
    <div>
      <label class="form-labe mb-2" for="email">Email</label>
      <input class="form-control mb-3" type="email" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div>
      <label class="form-labe mb-2" for="phone">Phone Number</label>
      <input class="form-control mb-3" type="number" id="phone" name="phone" value="<?php echo $phone; ?>">
    </div>
    <div>
      <label class="form-labe mb-2" for="enroll">Enroll Number</label>
      <input class="form-control mb-3" type="number" id="enroll" name="enroll" value="<?php echo $enroll; ?>">
    </div>
    <div>
      <label class="form-labe mb-2" for="date">Date Of Admession</label>
      <input class="form-control mb-3" type="date" id="date" name="date" value="<?php echo $date; ?>">
    </div>
    <input type="submit" name="save" class="btn btn-info" value="Update">
  </form>
  </div>

  <?php
          if(isset($_POST['save'])){
            $namee = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone'];
            $enroll_number = $_POST['enroll'];
            $date_of_admession = $_POST['date']; 
      
            $edit = "UPDATE studentsinfo SET namee = '$namee', email = '$email', phone_number='$phone_number', enroll_number='$enroll_number', date_of_admession='$date_of_admession' WHERE id = $id";
            $res = mysqli_query($con, $edit);
            echo "
            <script>
            window.location.href = 'Student.php';
            </script>";
          }  

    ?>
    <script src="js/bootstrap.js"></script>

</body>
</html>