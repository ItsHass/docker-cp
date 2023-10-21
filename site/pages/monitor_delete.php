<?php $monitorID = $_GET['id'];
if(isset($_GET['confirm'])){
	# DELETE FROM `hass_dockerUptime`.`monitor` WHERE  `monitor_id`=10;
	$D_query = "DELETE FROM `monitor` WHERE  `monitor_id`=$monitorID;";
	$D_result = mysqli_query($con, $D_query);
	$deleted=1;
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Monitor Delete</h1>
<div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">....</button>
            <a href="./?page=logs"><span type="button" class="btn btn-sm btn-outline-secondary">Logs</span></a>
          </div>
	    </div>		  
      </div>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="./?page=monitors">Monitors</a></li>
          <li class="breadcrumb-item active" aria-current="page">Monitor delete</li>
        </ol>
      </nav>
<?php if(isset($_GET['confirm'])){ ?>
		<div class="table-responsive small">
    <p align="left"><strong>DELETED !</strong></p>
    <p align="left">
<a href="./?page=monitors"><span type="button" class="btn btn-success">Back </span></a>	
		  </p>
      </div>
<?php }else{	?>
	
      <div class="table-responsive small">
    <p align="left"><strong>Are you sure?</strong></p>
    <p align="left">
<a href="./?page=monitors"><span type="button" class="btn btn-success">Back </span></a>	
<a href="./?page=monitor_delete&id=<?php echo $_GET['id']; ?>&confirm"><span type="button" class="btn btn-danger">DELETE !</span></a>			
		  </p>
      </div>

<?php  } ?>
</main>
