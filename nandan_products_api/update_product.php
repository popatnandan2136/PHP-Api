<?php

include('connect.php');

$upload_path = "images/";
$upload_url = "http://".$_SERVER['SERVER_NAME']."/API/".$upload_path;

$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_description = $_POST["product_description"];
$product_mrp = $_POST["product_mrp"];
$product_sell_price = $_POST["product_sell_price"];
$product_quantity = $_POST["product_quantity"];
$product_brand = $_POST["product_brand"];
$product_category = $_POST["product_category"];

if(
$product_name=="" ||
$product_description=="" ||
$product_mrp=="" ||
$product_sell_price=="" ||
$product_quantity=="" ||
$product_brand=="" ||
$product_category==""
)
{
    echo "0";
}
else
{
    if(isset($_FILES["product_image"]) && $_FILES["product_image"]["name"]!="")
    {
        $fileinfo = pathinfo($_FILES["product_image"]["name"]);
        $extension = $fileinfo["extension"];

        $filename = "product_".rand(1000,9999).".".$extension;

        $file_path = $upload_path.$filename;
        $file_url = $upload_url.$filename;

        move_uploaded_file($_FILES["product_image"]["tmp_name"],$file_path);

        $sql = "UPDATE products SET
        product_name='$product_name',
        product_description='$product_description',
        product_mrp='$product_mrp',
        product_sell_price='$product_sell_price',
        product_quantity='$product_quantity',
        product_brand='$product_brand',
        product_category='$product_category',
        product_image='$file_url'
        WHERE product_id='$product_id'";
    }
    else
    {
        $sql = "UPDATE products SET
        product_name='$product_name',
        product_description='$product_description',
        product_mrp='$product_mrp',
        product_sell_price='$product_sell_price',
        product_quantity='$product_quantity',
        product_brand='$product_brand',
        product_category='$product_category'
        WHERE product_id='$product_id'";
    }

    mysqli_query($con,$sql);

    echo "1";
}

mysqli_close($con);

?>