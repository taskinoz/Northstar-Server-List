<?php
$url = 'tf.excord.de';
$json = file_get_contents("https://".$url."/client/servers");
echo $json;
?>
