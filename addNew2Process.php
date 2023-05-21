<?php


require "connection.php";

$des = $_POST["des"];
$pid = $_POST["pid"];
// echo($pid);




$coverImage_rs = Database::search("SELECT * FROM `coverimage` WHERE `id`='" . $pid . "'");
$coverImage_num = $coverImage_rs->num_rows;

if ($coverImage_num == 0) {
    $length = count($_FILES);

    if ($length <= 23 && $length > 0) {
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

                    $file_name = "resources/coverImage/" . $pid . "_" . $x . "_" . uniqid() . $new_image_extension;
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


$gallryImage_rs = Database::search("SELECT * FROM `gallry` WHERE `post_id`='" . $pid . "'");
$gallryImage_num = $gallryImage_rs->num_rows;
if ($gallryImage_num == 0) {


    $lengthGallry = sizeof($_FILES);

    if (!$lengthGallry == 0) {
        $allowded_img_extention = array("image/jpeg", "image/jpeg", "image/png", "image/svg+xml");
        if ($lengthGallry <= 23 && $lengthGallry > 0) {

            for ($y = 0; $y < $lengthGallry; $y++) {
                if (isset($_FILES["gallaryImage" . $y])) {
                    $img_file_Gallry = $_FILES["gallaryImage" . $y];
                    $file_type_Gallry = $img_file_Gallry["type"];


                    if (in_array($file_type_Gallry, $allowded_img_extention)) {
                        $new_Gllary_extention;

                        if ($file_type_Gallry == "image/jpg") {
                            $new_Gllary_extention = ".jpg";
                        } else if ($file_type_Gallry == "image/jpeg") {
                            $new_Gllary_extention = ".jpeg";
                        } else if ($file_type_Gallry == "image/png") {
                            $new_Gllary_extention = ".ppg";
                        } else if ($file_type_Gallry == "image/svg+xml") {
                            $new_Gllary_extention = ".svg";
                        }

                        $file_gallry_name = "resouses//gallaryImage//" . $pid . "_" . $y . "_" . uniqid() . $new_Gllary_extention;
                        move_uploaded_file($img_file_Gallry["tmp_name"], $file_gallry_name);





                        Database::iud("INSERT INTO `gallry` (`path`,`post_id`) VALUES ('" . $file_gallry_name . "','" . $pid . "')");
                    } else {
                        echo ("Gallry Image File type not allowed!");
                    }
                }
            }
        }
        echo ("Gallry Image Success");
    }
} else {
    echo ("sorry alredy You are upload gallry image. now you can edit option");
}
