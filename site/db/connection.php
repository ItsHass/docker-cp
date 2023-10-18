<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("db.php");
?>
<?php 
$docker_query = "SELECT * FROM `dockers`;";
$docker_result = mysqli_query($con, $docker_query);
$docker_total = mysqli_num_rows($docker_result);
$docker_row = mysqli_fetch_assoc($docker_result);
#/////


?>