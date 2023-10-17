<?php
$Insert_query = "INSERT INTO `monitor_logs` (`unixstamp`, `docker_id`, `monitor_id`, `current_status`, `pref_status`, `actions`, `json`) VALUES ('".time()."', '$id', '$mid', '$containerStatus', '$prefStatus', '$Actions_required', '$Actions_JSON');";
$Insert_result = mysqli_query($con, $Insert_query);
?>