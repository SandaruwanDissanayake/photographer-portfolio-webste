<?php


require "connection.php";

$des = $_POST["des"];
$pid = $_POST["pid"];


Database::iud("UPDATE `post` SET `description`='".$des."' WHERE `id`='".$pid."'");

// Database::iud("INSERT INTO `post` (`post`,`id`) VALUE ('".."')")

echo("sucsess");

?>