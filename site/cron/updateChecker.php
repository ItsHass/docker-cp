<?php 
// get latest version info from github // 
$github_version = null;
$file_get_github = @file_get_contents("https://raw.githubusercontent.com/ItsHass/docker-cp/main/site/version"); 
$github_version = trim($file_get_github);

$current_version = @file_get_contents("../version"); 

if($github_version>0 && $current_version>0){
  // if github is newer version than current installed version
	if($file_get_github>$current_version){
    // download latest zip file
    $url = "https://github.com/ItsHass/docker-cp/archive/refs/heads/main.zip";
      echo "<p> Attempting: $url </p>";
    // Use basename() function to return the base name of file
    $file_name = basename($url);
      echo "<p> Filename: $file_name </p>";
    // Use file_get_contents() function to get the file
    // from url and use file_put_contents() function to
    // save the file by using base name

    if (file_put_contents("updateDownloads/".$file_name, @file_get_contents($url)))
    	{
        echo "<p> Downloaded file </p>";
    // run ssh connection to run .sh file
        require_once("updateRunUpdate.php");
    // check versions
        
    // completed.

	}
  }
}else{
	echo "Unable to check for updates.";
}
?>
