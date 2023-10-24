<?php $dockerID= $_GET['id'];
if(isset($_POST['DockerID'])){
	$DockerID = $_POST['DockerID'];
	$DockerIP = $_POST['DockerIP'];
	$DockerUser = $_POST['DockerUser'];
	$DockerPW = $_POST['DockerPW'];
	if(isset($_POST['Active'])){
		$Active = 1;
	}else{
		$Active = 0;
	}
	$Insert_query = "UPDATE `dockers` SET `docker_label` = '$DockerID', `docker_ip` = '$DockerIP', `docker_user` = '$DockerUser', `docker_pw` = '$DockerPW' WHERE `dockers`.`docker_id` = $dockerID;";
	$Insert_result = mysqli_query($con, $Insert_query);

		$Insert = 1;
}else{

	
$monitorInfo_query = "SELECT * FROM `dockers` where docker_id = '$dockerID';";
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
    <li class="breadcrumb-item active" aria-current="page">Docker edit</li>
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
      <label for="DockerID">Docker Label</label>
      <input type="text" class="form-control" id="DockerID" name="DockerID" placeholder="Docker ID" value="<?php echo $monitorInfo_row['docker_label']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="ContainerID">Docker IP</label>
      <input type="text" class="form-control" id="DockerIP" name="DockerIP" placeholder="IP Address" value="<?php echo $monitorInfo_row['docker_ip']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="ContainerName">Docker Username</label>
      <input type="text" class="form-control" id="DockerUser" name="DockerUser" placeholder="Username" value="<?php echo $monitorInfo_row['docker_user']; ?>">
    </div>
    <div class="form-group col-md-6 pb-4">
      <label for="ContainerName">Docker Password</label>
      <input type="text" class="form-control" id="DockerPW" name="DockerPW" placeholder="Password" value="<?php echo $monitorInfo_row['docker_pw']; ?>">
    </div>
  </div>			  

  <button type="submit" class="btn btn-primary">Update Docker</button>
<a href="./?page=docker_delete&id=<?php echo $_GET['id']; ?>"><span type="button" class="btn btn-danger">Delete Monitor</span></a>	
</form>		  
<?php
} ?>
		  
		  
      </div>
</main>