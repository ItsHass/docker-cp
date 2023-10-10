<?php 
$logs_query = "SELECT * FROM `monitor_logs` ORDER BY `monitor_logs`.`log_id` DESC LIMIT 50;";
$logs_result = mysqli_query($con, $logs_query);
$logs_total = mysqli_num_rows($logs_result);
$logs_row = mysqli_fetch_assoc($logs_result);

$lastactions_query = "SELECT log_id FROM `monitor_logs`;";
$lastactions_result = mysqli_query($con, $lastactions_query);
$logs_total_ = mysqli_num_rows($lastactions_result);

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Logs</h1>
      </div>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Logs</li>
  </ol>
</nav>      

      <div class="table-responsive small">
        <p align="left"><?php echo "Most recent $logs_total of $logs_total_"; ?><br>
		  <strong>Timezone</strong>: <?php echo date_default_timezone_get(); ?></p>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th nowrap="nowrap" scope="col">Date</th>
              <th nowrap="nowrap" scope="col">Docker ID</th>
              <th nowrap="nowrap" scope="col">Current Status</th>
              <th nowrap="nowrap" scope="col">Pref Status</th>
              <th nowrap="nowrap" scope="col">Actions</th>
              <th nowrap="nowrap" scope="col">JSON</th>
            </tr>
          </thead>
          <tbody>
			  <?php do { ?>
            <tr>
              <td align="left" nowrap="nowrap"><?php echo date("Y-m-d H:i:s",$logs_row['unixstamp']); ?></td>
              <td align="left"><?php echo $logs_row['docker_id']; ?></td>
              <td align="left"><?php echo $logs_row['current_status']; ?></td>
              <td align="left"><?php echo $logs_row['pref_status']; ?></td>
              <td align="left"><?php if($logs_row['actions']=='nothing'){ ?> 
<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#0fb314}</style><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z"/></svg>
				  <?php }else{ ?>
<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#cc2828}</style><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
				  <?php  } ?>
			  </td>
              <td align="left"><?php echo $logs_row['json']; ?></td>
            </tr>
			  <?php } while ($logs_row = mysqli_fetch_assoc($logs_result)); ?>  
          </tbody>
        </table>
      </div>


      </div>
    </main>