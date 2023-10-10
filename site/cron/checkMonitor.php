<?php require_once("/home/hass/web/svr01.itshass.uk/public_html/docker/site/db/db.php"); require_once("/home/hass/web/svr01.itshass.uk/public_html/docker/site/db/connection.php"); ?>
<?php 
#$docker_query = "SELECT * FROM `dockers`;";
#$docker_result = mysqli_query($con, $docker_query);
#$docker_total = mysqli_num_rows($docker_result);
#$docker_row = mysqli_fetch_assoc($docker_result);

$monitors_query = "SELECT * FROM `monitor` where active = 1 ORDER BY `monitor`.`monitor_id` DESC;";
$monitors_result = mysqli_query($con, $monitors_query);
$monitors_total = mysqli_num_rows($monitors_result);
$monitors_row = mysqli_fetch_assoc($monitors_result);

echo "Total: $monitors_total <br>";
?>
<?php
do{
    $containerID = $monitors_row['container_id'];
echo "checking : ". $containerID . "<br>";
    //get docker id > connection info
        $id = $monitors_row['docker_id'];
    $docker1_query = "SELECT * FROM `dockers` where docker_id = '$id';";
    $docker1_result = mysqli_query($con, $docker1_query);
    $docker1_total = mysqli_num_rows($docker1_result);
    $docker1_row = mysqli_fetch_assoc($docker1_result); 
        $docker_label = $docker1_row['docker_label'];

        include("/home/hass/web/svr01.itshass.uk/public_html/docker/site/cron/docker-get-container-status.php");

        $json_data = json_decode($containers_json, true);

        $containerStatus = strtolower($json_data['State']['Status']);
        $prefStatus = strtolower($monitors_row['prefStatus']);

        echo "status: " .strtolower($containerStatus). " | expecting: ". strtolower($prefStatus) ."  ";

        if($containerStatus!=$prefStatus){
			$Actions_required = "$prefStatus";
						
			include("/home/hass/web/svr01.itshass.uk/public_html/docker/site/cron/actions/$prefStatus.php");

			$Actions_JSON = json_decode($container_action_json, true);
			
        }else{
            $Actions_required = "nothing";
			$Actions_JSON = "";
        }
	
				include("/home/hass/web/svr01.itshass.uk/public_html/docker/site/cron/actions/log.php");
	
        #$dump = print_r($json_data);
        #        echo "<pre> $dump </pre>";


} while ($monitors_row = mysqli_fetch_assoc($monitors_result));
?>



Finished