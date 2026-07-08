<?php
include('connect.php');

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
    $sql = "insert into products
    (
        product_name,
        product_description,
        product_mrp,
        product_sell_price,
        product_quantity,
        product_brand,
        product_category
    )
    values
    (
        '$product_name',
        '$product_description',
        '$product_mrp',
        '$product_sell_price',
        '$product_quantity',
        '$product_brand',
        '$product_category'
    )";

    mysqli_query($con,$sql);
}
?>