<?php

require "connection.php";

$id=$_GET["id"];

$g_img_rs=Database::search("SELECT * FROM `gallry` WHERE `id`='".$id."'");
$img_data=$g_img_rs->fetch_assoc();

$path=$img_data["path"];

echo($path);
?>