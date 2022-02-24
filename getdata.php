<?php
$url = 'northstar.tf';
$json = file_get_contents("https://".$url."/client/servers");
echo $json;
?>
