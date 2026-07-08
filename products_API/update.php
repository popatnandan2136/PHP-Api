<?php
include('connect.php');

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
    echo '0';
}
else
{
    $sql = "update products set
        product_name='$product_name',
        product_description='$product_description',
        product_mrp='$product_mrp',
        product_sell_price='$product_sell_price',
        product_quantity='$product_quantity',
        product_brand='$product_brand',
        product_category='$product_category'
    where product_id='$product_id'";

    mysqli_query($con,$sql);
}
?>