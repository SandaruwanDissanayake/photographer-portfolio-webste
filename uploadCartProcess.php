<?php

require "connection.php";
session_start();

$about = $_POST["about"];
$datetime = $_POST["datetime"];
if (!isset($_FILES["image"])) {
    echo ("Cart Image Is Requierd Pleace Select Image");
} else {
    $unicId = uniqid();

    $image = $_FILES["image"];

  



    Database::iud("INSERT INTO `post` (`about`,`datetime`,`unicId`) VALUES ('" . $about . "','" . $datetime . "','" . $unicId . "')");


    $post_rs = Database::search("SELECT * FROM `post` WHERE `unicId`='" . $unicId . "'");
    if ($post_rs->num_rows == 1) {
        $post_data = $post_rs->fetch_assoc();

        $post_id = $post_data["id"];


        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];
        // echo($file_ex);
        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Pleace select a valid image.");
        } else {
            $new_file_extention;
            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else  if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }
            // echo("$new_file_extention");
            $file_name = "resouses/cartImage/" . $post_id . "_" . $unicId . $new_file_extention;
            move_uploaded_file($image["tmp_name"], $file_name);
            // echo("success");

            Database::iud("INSERT INTO `cartimage` (`id`,`path`) VALUES ('" . $post_id . "','" . $file_name . "')");
            // echo ("sucsess");
   

           echo($post_id);
        }
    } else {
        echo ("1");
       
    }
   
}
