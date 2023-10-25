<?php if(isset($_POST['DockerID'])){
	$DockerID = $_POST['DockerID'];
	$DockerIP = $_POST['DockerIP'];
	$DockerUser = $_POST['DockerUser'];
	$DockerPW = $_POST['DockerPW'];
	if(isset($_POST['Active'])){
		$Active = 1;
	}else{
		$Active = 0;
	}
	
	
$Insert_query = "INSERT INTO `dockers` (`docker_label`, `active`, `docker_ip`, `docker_user`, `docker_pw`) VALUES ('$DockerID', '1', '$DockerIP', '$DockerUser', '$DockerPW');";
$Insert_result = mysqli_query($con, $Insert_query);
$Insert = 1;
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Docker  Setup</h1>
      </div>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Docker setup</li>
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
      <label for="DockerID">Docker Label</label>
      <input type="text" class="form-control" id="DockerID" name="DockerID" placeholder="Docker ID" readonly value="">
    </div>
    <div class="form-group col-md-6">
      <label for="ContainerID">Docker IP</label>
      <input type="text" class="form-control" id="DockerIP" name="DockerIP" placeholder="IP Address" readonly value="">
    </div>
    <div class="form-group col-md-6">
      <label for="ContainerName">Docker Username</label>
      <input type="text" class="form-control" id="DockerUser" name="DockerUser" placeholder="Username" value="">
    </div>
    <div class="form-group col-md-6 pb-4">
      <label for="ContainerName">Docker Password</label>
      <input type="text" class="form-control" id="DockerPW" name="DockerPW" placeholder="Password" value="">
    </div>
    
  </div>  

  <button type="submit" class="btn btn-primary">Create Docker</button>
</form>		  
<?php
} ?>
		  
		  
</div>
</main>