<?php

if (isset($_FILES['image_upload']['name'])) {
    $filename = $_FILES['image_upload']['name'];
    $file_basename = substr($filename, 0, strripos($filename, '.'));
    $file_ext = substr($filename, strripos($filename, '.'));
    $unique_name = uniqid();
    $newfilename = $unique_name . $file_ext;
    /* Location */
    $location = "../../payment_receipt/" . $newfilename;
    $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
    /* Valid extensions */
    $valid_extensions = array("jpg", "jpeg", "png");
    $response = 0;
    /* Check file extension */
    if (in_array(strtolower($imageFileType), $valid_extensions)) {
        /* Upload file */
        if (move_uploaded_file($_FILES['image_upload']['tmp_name'], $location)) {
            $response = $location;
        }
    }
    echo $newfilename;
    exit;
}
echo 0;
?>