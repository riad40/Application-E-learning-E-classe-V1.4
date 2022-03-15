<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="./css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css" />
  <title>Payment</title>
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

        <h3>Payment Details</h3>

        <div>
          <img src="./images/sort.svg" class="px-2" alt="sort" />
          <button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
            ADD NEW PAYMENT
          </button>
        </div>
      </div>

      <!-- Modal -->

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new payment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST">
                <div>
                  <label class="form-labe mb-2" for="name">Name</label>
                  <input class="form-control mb-3" type="text" id="name" name="name" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="pyament">Pyament Schedule</label>
                  <input class="form-control mb-3" type="text" id="pyament" name="pyament" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="bil number">Bill Number</label>
                  <input class="form-control mb-3" type="number" id="bill" name="bill" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="amount paid">Amount Paid</label>
                  <input class="form-control mb-3" type="number" id="amountp" name="amountp" required>
                </div>
                <div>
                  <label class="form-labe mb-2" for="date">Balance amount</label>
                  <input class="form-control mb-3" type="number" id="bamount" name="bamount">
                </div>
                <div>
                  <label class="form-labe mb-2" for="date">Dtae</label>
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
            $sql = 'SELECT * FROM payments_details'; 
            $res = mysqli_query($con, $sql);
            $persons = mysqli_fetch_all($res, MYSQLI_ASSOC);

            if (isset($_POST['save'])) {
              $namee = $_POST['name'];
              $payment_schedule = $_POST['pyament'];
              $bill_number = $_POST['bill'];
              $amount_paid = $_POST['amountp'];
              $balance_amount = $_POST['bamount'];
              $datee = $_POST['date']; 
    
              $add = "INSERT INTO payments_details VALUES(NULL, '$namee', '$payment_schedule', '$bill_number', '$amount_paid', '$balance_amount', '$datee')";
    
              $res = mysqli_query($con, $add);
    
              echo "
              <script>
              window.location.href = 'payment.php';
              </script>";
                
            }
            ?>
      <div class="tables">
        <table class="table table-responsive table-borderless">
          <thead class="text-secondary fw-lighter">
            <tr>
              <th></th>
              <th>Name</th>
              <th style="white-space: nowrap !important;">Payment Schedule</th>
              <th style="white-space: nowrap !important;">Bill Number</th>
              <th style="white-space: nowrap !important;">Amount Paid</th>
              <th style="white-space: nowrap !important;">Balance amount</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($persons as $person){ ?>
            <tr class="my-table1 mx-4">
              <th></th>
              <th class="py-3 fw-normal" style="white-space: nowrap !important;"><?php echo $person['namee']; ?></th>
              <td class="p-3" style="white-space: nowrap !important;"><?php echo $person['payment_schedule']; ?></td>
              <td class="py-3" style="white-space: nowrap !important;"><?php echo $person['bill_number']; ?></td>
              <td class="py-3" style="white-space: nowrap !important;"><?php echo 'DHS'. $person['amount_paid']; ?></td>
              <td class="py-3" style="white-space: nowrap !important;"><?php echo 'DHS'. $person['balance_amount']; ?></td>
              <td class="py-3" style="white-space: nowrap !important;"><?php echo $person['datee']; ?></td>
              <td class="py-3"><img src="./images/eye.svg" alt="eye" /></td>
            </tr>
            <?php } ?>
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