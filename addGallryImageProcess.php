<?php
require "connection.php";


$pid = $_POST["pid"];




$gallryImage_rs = Database::search("SELECT * FROM `gallry` WHERE `post_id`='" . $pid . "'");
$gallryImage_num = $gallryImage_rs->num_rows;
if ($gallryImage_num == 0) {
echo("1");

    $lengthGallry = sizeof($_FILES);
    echo("2");

    if (!$lengthGallry == 0) {


        $allowded_img_extention = array("image/jpeg", "image/jpeg", "image/png", "image/svg+xml");
        if ($lengthGallry <= 20 && $lengthGallry > 0) {

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
