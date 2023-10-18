<?php if(isset($_POST['DockerID'])){
	$DockerID = $_POST['DockerID'];
	$ContainerID = $_POST['ContainerID'];
	$ContainerName = $_POST['ContainerName'];
	$PreferedStatus = $_POST['PreferedStatus'];
	if(isset($_POST['Active'])){
		$Active = 1;
	}else{
		$Active = 0;
	}
	
	
$Insert_query = "INSERT INTO `monitor` (`docker_id`, `container_id`, `prefStatus`, `active`, `container_name`) VALUES ('$DockerID', '$ContainerID', '$PreferedStatus', '$Active', '$ContainerName');";
$Insert_result = mysqli_query($con, $Insert_query);
$Insert = 1;
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Monitor Setup</h1>
      </div>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="./?page=monitors">Monitors</a></li>
    <li class="breadcrumb-item active" aria-current="page">Monitor setup</li>
  </ol>
</nav>

      <div class="">
<?php if(isset($Insert)){ ?>
Added.
<?	
}else{
?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="DockerID">Docker ID</label>
      <input type="text" class="form-control" id="DockerID" name="DockerID" placeholder="Docker ID" readonly value="<?php echo $_GET['docker']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="ContainerID">Container ID</label>
      <input type="text" class="form-control" id="ContainerID" name="ContainerID" placeholder="Container ID" readonly value="<?php echo $_GET['id']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="ContainerName">Container Name</label>
      <input type="text" class="form-control" id="ContainerName" name="ContainerName" placeholder="Container Name" value="<?php echo $_GET['name']; ?>">
    </div>	  
  </div>
    <div class="form-group col-md-4">
      <label for="PreferedStatus">Prefered Status</label>
      <select id="PreferedStatus" name="PreferedStatus" class="form-control">
        <option selected disabled>Choose...</option>
        <option>Running</option>
		 <option>Exited</option>
      </select>
    </div>	
  <div class="form-group p-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="Active" name="Active">
      <label class="form-check-label" for="Active">
        Active
      </label>
    </div>
  </div>			  

  <button type="submit" class="btn btn-primary">Create Monitor</button>
</form>		  
<?php
} ?>
		  
		  
      </div>
</main>