<?php $monitorID = $_GET['id'];
if(isset($_POST['ContainerName'])){
	//$DockerID = $_POST['DockerID'];
	//$ContainerID = $_POST['ContainerID'];
	$ContainerName = $_POST['ContainerName'];
	$PreferedStatus = $_POST['PreferedStatus'];
	if(isset($_POST['Active'])){
		$Active = 1;
	}else{
		$Active = 0;
	}
		
	$Insert_query = "UPDATE `hass_dockerUptime`.`monitor` SET `container_name`='$ContainerName', `prefStatus`='$PreferedStatus',`active`=$Active WHERE  `monitor_id`=$monitorID;";
	$Insert_result = mysqli_query($con, $Insert_query);

		$Insert = 1;
}else{

	
$monitorInfo_query = "SELECT * FROM `monitor` where monitor_id = '$monitorID';";
$monitorInfo_result = mysqli_query($con, $monitorInfo_query);
$monitorInfo_total = mysqli_num_rows($monitorInfo_result);
$monitorInfo_row = mysqli_fetch_assoc($monitorInfo_result);

}

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Monitor Edit</h1>
      </div>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="./?page=monitors">Monitors</a></li>
    <li class="breadcrumb-item active" aria-current="page">Monitor edit</li>
  </ol>
</nav>

      <div class="">
<?php if(isset($Insert)){ ?>
Updated.
<?	
}else{
?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="DockerID"><strong>Docker ID:</strong> </label>
      <?php echo $monitorInfo_row['docker_id']; ?>
    </div>
    <div class="form-group col-md-6">
      <label for="ContainerID"><strong>Container ID: </strong></label>
	 <?php echo $monitorInfo_row['container_id']; ?>
	</div>
    <div class="form-group col-md-6">
      <label for="ContainerName">Container Name</label>
      <input type="text" class="form-control" id="ContainerName" name="ContainerName" placeholder="Container Name" value="<?php echo $monitorInfo_row['container_name']; ?>">
    </div>	  
  </div>
    <div class="form-group col-md-4">
      <label for="PreferedStatus">Prefered Status</label>
      <select id="PreferedStatus" name="PreferedStatus" class="form-control">
        <option <?php if($monitorInfo_row['prefStatus']=='Running'){ echo "selected"; }?>>Running</option>
		 <option <?php if($monitorInfo_row['prefStatus']=='Exited'){ echo "selected"; }?>>Exited</option>
      </select>
    </div>	
  <div class="form-group p-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="Active" name="Active" <?php if($monitorInfo_row['active']==1){ echo "checked"; }?>>
      <label class="form-check-label" for="Active">
        Active
      </label>
    </div>
  </div>			  

  <button type="submit" class="btn btn-primary">Update Monitor</button>
<a href="./?page=monitor_delete&id=<?php echo $_GET['id']; ?>"><span type="button" class="btn btn-danger">Delete Monitor</span></a>	
</form>		  
<?php
} ?>
		  
		  
      </div>
</main>