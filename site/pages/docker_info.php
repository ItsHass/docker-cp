<?php 
$dockerID = $_GET['id'];

$dockerInfo_query = "SELECT * FROM `dockers` where docker_id = '$dockerID';";
$dockerInfo_result = mysqli_query($con, $dockerInfo_query);
$dockerInfo_total = mysqli_num_rows($dockerInfo_result);
$dockerInfo_row = mysqli_fetch_assoc($dockerInfo_result);
?>
<?php require_once("cron/docker-get-info.php");
if(!isset($errors)){
$json_data = json_decode($containers_json, true);
}else{ echo "Connection Error"; exit; }
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Docker Information</li>
  </ol>
</nav>

      <div class="table-responsive small">
        <p><?php echo $dockerInfo_row['docker_label']; ?></p>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th nowrap="nowrap" scope="col">Container</th>
              <th nowrap="nowrap" scope="col">Image</th>
              <th nowrap="nowrap" scope="col">State</th>
              <th nowrap="nowrap" scope="col">Status</th>
              <th nowrap="nowrap" scope="col">Created On</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
<?php 

$doCountMax = count($json_data);
$doCount = 0;
##
$total_running = 0;
$total_notRunning = 0;

do{
    $Name = $json_data[$doCount]['Names'][0];
    $State = $json_data[$doCount]['State'];
    $Status = $json_data[$doCount]['Status'];
	$Image = $json_data[$doCount]['Image'];
	$Created =  $json_data[$doCount]['Created'];
	$Id = $json_data[$doCount]['Id'];

if($State=='running'){ $total_running = $total_running+1; }else{ $total_notRunning=$total_notRunning+1; };

$doCount = $doCount+1;

?>
            <tr>
              <td width="1" align="left" nowrap="nowrap"><?php echo $Name; ?></td>
              <td width="1" align="left" nowrap="nowrap"><?php echo $Image; ?></td>
              <td width="1" align="left" nowrap="nowrap"><?php echo $State; ?></td>
              <td width="1" align="left" nowrap="nowrap"><?php echo $Status; ?></td>
              <td width="1" align="left" nowrap="nowrap"><?php echo date("M j G:i:s T Y",$Created); ?></td>
              <td width="1" align="left" nowrap="nowrap"><a class="btn btn-primary btn-sm" href="./?page=monitor_setup&name=<?php echo $Name; ?>&docker=<?php echo $_GET['id']; ?>&id=<?php echo str_replace("/","",$Name); ?>">Setup Monitor</a></td>
            </tr>
<?php  } while($doCount<$doCountMax); ?>
		  </tbody>
        </table>
<?php echo "<p>  Total Running: $total_running | Not Running: $total_notRunning  </p>"; ?>		  
      </div>

      </div>
    </main>