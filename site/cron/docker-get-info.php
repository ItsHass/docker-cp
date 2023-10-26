<?php
$serverIP = $dockerInfo_row['docker_ip'];
$serverUser = $dockerInfo_row['docker_user'];
$serverPW = $dockerInfo_row['docker_pw'];

require '../assets/vendor/autoload.php';
use phpseclib3\Net\SSH2;

try{

$ssh = new SSH2("$serverIP");
if (!$ssh->login("$serverUser", "$serverPW")) {
    echo " login failed "; exit;
} // else{ //echo "<center><h3> connected... $serverUser@$serverIP </h3></center>  <br> <pre>"; }

$containers_json = $ssh->exec('curl -s --unix-socket /var/run/docker.sock http://localhost/v1.40/containers/json?all=true');

}

//catch exception
catch(Exception $e) {
  $errors = 1;
  echo 'Message: ' .$e->getMessage();
}

?>
