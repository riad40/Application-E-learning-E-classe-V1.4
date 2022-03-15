<?php

      include './includes/db_conn.php';
      $id = $_GET['id'];
      $remove = "DELETE FROM course WHERE id = $id";
      $res = mysqli_query($con, $remove);
      echo "
        <script>
          window.location.href = 'Course.php';
        </script>";

?>