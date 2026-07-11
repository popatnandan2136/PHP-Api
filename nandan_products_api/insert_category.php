<?php

include('connect.php');

$upload_path = "images/";
$upload_url = "http://".$_SERVER['SERVER_NAME']."/API/".$upload_path;

$category_name = $_POST["category_name"];

$fileinfo = pathinfo($_FILES["category_img"]["name"]);
$extension = $fileinfo["extension"];

$filename = "category_".rand(1000,9999).".".$extension;

$file_path = $upload_path.$filename;
$file_url = $upload_url.$filename;

move_uploaded_file($_FILES["category_img"]["tmp_name"],$file_path);

$sql = "INSERT INTO product_main_category(category_name,category_img)
VALUES('$category_name','$file_url')";

mysqli_query($con,$sql);

echo "1";

mysqli_close($con);

?>