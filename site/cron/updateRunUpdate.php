<?php
require_once("../db/config.php");
$serverIP = "192.168.0.111";
$serverUser = "hass";
$serverPW = "Hassan";

require "$site_path/assets/vendor/autoload.php";
use phpseclib3\Net\SSH2;

$ssh = new SSH2("$serverIP");
if (!$ssh->login("$serverUser", "$serverPW")) {
    echo " login failed ";
} // else{ //echo "<center><h3> connected... $serverUser@$serverIP </h3></center>  <br> <pre>"; }

$containers_json = $ssh->exec("sh $site_path/site/cron/updateDownloads/run.sh");

echo "<p><pre>
$containers_json
</pre></p>";

?>
