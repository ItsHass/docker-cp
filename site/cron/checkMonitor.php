<?php require_once("../db/db.php"); require_once("../db/connection.php"); ?>
<?php header('Content-Type: application/json; charset=utf-8');
#$docker_query = "SELECT * FROM `dockers`;";
#$docker_result = mysqli_query($con, $docker_query);
#$docker_total = mysqli_num_rows($docker_result);
#$docker_row = mysqli_fetch_assoc($docker_result);

$monitors_query = "SELECT * FROM `monitor` where active = 1 ORDER BY `monitor`.`monitor_id` DESC;";
$monitors_result = mysqli_query($con, $monitors_query);
$monitors_total = mysqli_num_rows($monitors_result);
$monitors_row = mysqli_fetch_assoc($monitors_result);

echo "Total: $monitors_total
";
?>
<?php
do{
	$mid = $monitors_row['monitor_id'];
    $containerID = $monitors_row['container_id'];
echo "checking : ". $containerID . " >> ";
    //get docker id > connection info
        $id = $monitors_row['docker_id'];
    $docker1_query = "SELECT * FROM `dockers` where docker_id = '$id';";
    $docker1_result = mysqli_query($con, $docker1_query);
    $docker1_total = mysqli_num_rows($docker1_result);
    $docker1_row = mysqli_fetch_assoc($docker1_result); 
        $docker_label = $docker1_row['docker_label'];

        include("docker-get-container-status.php");

        $json_data = json_decode($containers_json, true);

		if(isset($json_data['State']['Status'])){
        $containerStatus = strtolower($json_data['State']['Status']);
		}else{ $containerStatus = "unknown"; }
        $prefStatus = strtolower($monitors_row['prefStatus']);

        echo "status: " .strtolower($containerStatus). " | expecting: ". strtolower($prefStatus) ."  
";

        if($containerStatus!=$prefStatus){
			$Actions_required = "$prefStatus";
						
			include("actions/$prefStatus.php");

			$Actions_JSON = json_decode($container_action_json, true);
			
        }else{
            $Actions_required = "nothing";
			$Actions_JSON = "";
        }
	
				include("actions/log.php");
	
        #$dump = print_r($json_data);
        #        echo "<pre> $dump </pre>";


} while ($monitors_row = mysqli_fetch_assoc($monitors_result));
?>
