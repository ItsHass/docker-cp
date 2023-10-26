<?php
$serverIP = $docker1_row['docker_ip'];
$serverUser = $docker1_row['docker_user'];
$serverPW = $docker1_row['docker_pw'];

require '../../assets/vendor/autoload.php';
use phpseclib3\Net\SSH2;

try{

$ssh = new SSH2("$serverIP");
if (!$ssh->login("$serverUser", "$serverPW")) {
    echo " login failed ";
} // else{ //echo "<center><h3> connected... $serverUser@$serverIP </h3></center>  <br> <pre>"; }

#echo "logging into $serverIP, checking $containerID <br>";
#$containers_json = $ssh->exec("curl -s --unix-socket /var/run/docker.sock http://localhost/v1.40/containers/json?all=true");

$containers_json = $ssh->exec("curl -s --unix-socket /var/run/docker.sock http://localhost/v1.40/containers/$containerID/json");

} // try
    
//catch exception
catch(Exception $e) {
  $errors = 1;
  echo 'Message: ' .$e->getMessage();
}

?>
