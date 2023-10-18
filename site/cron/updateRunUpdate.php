<?php
$serverIP = "192.168.0.111";
$serverUser = "hass";
$serverPW = "Hassan";

require '/home/hass/web/svr01.itshass.uk/public_html/docker/assets/vendor/autoload.php';
use phpseclib3\Net\SSH2;

$ssh = new SSH2("$serverIP");
if (!$ssh->login("$serverUser", "$serverPW")) {
    echo " login failed ";
} // else{ //echo "<center><h3> connected... $serverUser@$serverIP </h3></center>  <br> <pre>"; }

$containers_json = $ssh->exec("sh /home/hass/web/svr01.itshass.uk/public_html/docker/site/cron/updateDownloads/run.sh");

echo "<p><pre>
$containers_json
</pre></p>";

?>
