<?php

// connection to database

$con = mysqli_connect('localhost', 'riad', 'wxcAZIZ#@12', 'e-classes-dB');

// check connection 

if (!$con) {
  echo 'connection error : '. mysqli_connect_error();
}

?>