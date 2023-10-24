<?php 
// get latest version info from github // 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("../db/config.php");

if(!isset($git_version)){ $git_version = "main"; };

echo "<p>Starting Script...</p>"; 

$github_version = null;
$file_get_github = @file_get_contents("https://raw.githubusercontent.com/ItsHass/docker-cp/$git_version/site/version"); 
$github_version = trim($file_get_github);

$current_version = @file_get_contents("../version"); 
$current_version = trim($current_version);

echo "<p> Current Version : $current_version</p>";
echo "<p> Github Version : $github_version</p>";

if($github_version>0 && $current_version>0){
  // if github is newer version than current installed version
	if($github_version>$current_version){
    // download latest zip file
    $url = "https://github.com/ItsHass/docker-cp/archive/refs/heads/$git_version.zip";
      echo "<p> Attempting: $url </p>";
    // Use basename() function to return the base name of file
    //$file_name = basename($url);
		$file_name = "$git_version.zip";
      echo "<p> Filename: $file_name </p>";
    // Use file_get_contents() function to get the file
    // from url and use file_put_contents() function to
    // save the file by using base name

		// check run.sh exists
$runsh = "updateDownloads/run.sh";
$runsh_url = "https://raw.githubusercontent.com/ItsHass/docker-cp/$git_version/site/cron/updateDownloads/run.sh";
if (file_exists($runsh)) {
    // file exists... do nothing
} else {
    // download from git.
	    if (file_put_contents("updateDownloads/run.sh", @file_get_contents($runsh_url)))
    	{
        echo "<p> Downloaded run.sh file </p>";
    // check versions
        
    // completed.

	}
}

		
    if (file_put_contents("updateDownloads/".$file_name, @file_get_contents($url)))
    	{
        echo "<p> Downloaded file </p>";
    // run ssh connection to run .sh file
        require_once("updateRunUpdate.php");
    // check versions
        
    // completed.

	}
  }else{
		if($github_version==$current_version){
			echo "<p> All up-to-date </p>";
		}
	}
}else{
	echo "Unable to check for updates.";
}
?>
