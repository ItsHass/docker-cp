<?php
$con = mysqli_connect("localhost","hass_dockerUptime","Hassan12","hass_dockerUptime");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>