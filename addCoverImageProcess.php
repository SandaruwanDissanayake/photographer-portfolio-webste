<?php

require "connection.php";
$pid = $_POST["pid"];

$coverImage_rs = Database::search("SELECT * FROM `coverimage` WHERE `id`='" . $pid . "'");
$coverImage_num = $coverImage_rs->num_rows;

if ($coverImage_num == 0) {
    $length = count($_FILES);

    if ($length <= 3 && $length > 0) {
        $allowed_img_extension = array("image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["coverImage" . $x])) {
                $img_file = $_FILES["coverImage" . $x];
                $file_type = $img_file["type"];
                


                if (in_array($file_type, $allowed_img_extension)) {
                    $new_image_extension = "";

                    if ($file_type == "image/jpg") {
                        $new_image_extension = ".jpg";
                    } else if ($file_type == "image/jpeg") {
                        $new_image_extension = ".jpeg";
                    } else if ($file_type == "image/png") {
                        $new_image_extension = ".png";
                    } else if ($file_type == "image/svg+xml") {
                        $new_image_extension = ".svg";
                    }

                    $file_name = "resouses/coverImage/" . $pid . "_" . $x . "_" . uniqid() . $new_image_extension;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

               
                    Database::iud("INSERT INTO `coverimage` (`path`,`id`) VALUES ('" . $file_name . "','" . $pid . "')");
               
                } else {
                    echo ("File type not allowed!");
                }
            }
        }
    } else {
        echo ("Maximum 3 cover images can be uploaded!");
    }
} else {
    echo ("Sorry, cover image is already uploaded. You can now edit the option.");
}
