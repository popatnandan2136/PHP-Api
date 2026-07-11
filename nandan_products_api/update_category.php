<?php

include('connect.php');

$upload_path = "images/";
$upload_url = "http://".$_SERVER['SERVER_NAME']."/nandan_product/".$upload_path;

$category_id = $_POST["category_id"];
$category_name = $_POST["category_name"];

if($category_id=="" || $category_name=="")
{
    echo "0";
}
else
{
    if(isset($_FILES["category_img"]) && $_FILES["category_img"]["name"]!="")
    {
        $fileinfo = pathinfo($_FILES["category_img"]["name"]);
        $extension = $fileinfo["extension"];

        $filename = "category_".rand(1000,9999).".".$extension;

        $file_path = $upload_path.$filename;
        $file_url = $upload_url.$filename;

        move_uploaded_file($_FILES["category_img"]["tmp_name"],$file_path);

        $sql = "UPDATE product_main_category SET
                category_name='$category_name',
                category_img='$file_url'
                WHERE category_id='$category_id'";
    }
    else
    {
        $sql = "UPDATE product_main_category SET
                category_name='$category_name'
                WHERE category_id='$category_id'";
    }

    mysqli_query($con,$sql);

    echo "1";
}

mysqli_close($con);

?>