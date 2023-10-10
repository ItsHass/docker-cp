<?php 
$monitors_query = "SELECT * FROM `monitor` ORDER BY `monitor`.`monitor_id` DESC;";
$monitors_result = mysqli_query($con, $monitors_query);
$monitors_total = mysqli_num_rows($monitors_result);
$monitors_row = mysqli_fetch_assoc($monitors_result);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Monitors</h1>
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
    <li class="breadcrumb-item active" aria-current="page">Monitors</li>
  </ol>
</nav>

<div class="table-responsive small">
        <p align="left"><strong>Total</strong>: <?php echo $monitors_total; ?></p>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Docker ID</th>
              <th scope="col">Container ID</th>
              <th scope="col">Pref Status</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
			  <?php if($monitors_total>0){ do { 
                $id = $monitors_row['docker_id'];
$docker1_query = "SELECT docker_label FROM `dockers` where docker_id = '$id';";
$docker1_result = mysqli_query($con, $docker1_query);
$docker1_total = mysqli_num_rows($docker1_result);
$docker1_row = mysqli_fetch_assoc($docker1_result); 
                $docker_label = $docker1_row['docker_label'];
                ?>
            <tr>
              <td align="left"><?php echo $docker_label; ?>  </td>
              <td align="left"><?php echo $monitors_row['container_id']; ?></td>
              <td align="left"><?php echo $monitors_row['prefStatus']; ?></td>
              <td align="left"><?php $status = $monitors_row['active']; if($status == 1){ ?>
                <span type="button" class="btn btn-success btn-sm">Active</span>
                <?php }else{ ?>
                    <span type="button" class="btn btn-danger btn-sm">Disabled</span>    
                    <?php } ?></td>
              <td align="left"><span type="button" class="btn btn-primary btn-sm">Edit</span></td>
            </tr>
			  <?php } while ($monitors_row = mysqli_fetch_assoc($monitors_result)); } ?>  
          </tbody>
        </table>
      </div>

</main>
