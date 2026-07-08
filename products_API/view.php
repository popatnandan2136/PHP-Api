<?php
include('connect.php');

$sql = "select * from products";

$row = mysqli_query($con,$sql);

$response = array();

while($data = mysqli_fetch_array($row))
{
    $value["product_id"] = $data["product_id"];
    $value["product_name"] = $data["product_name"];
    $value["product_description"] = $data["product_description"];
    $value["product_mrp"] = $data["product_mrp"];
    $value["product_sell_price"] = $data["product_sell_price"];
    $value["product_quantity"] = $data["product_quantity"];
    $value["product_brand"] = $data["product_brand"];
    $value["product_category"] = $data["product_category"];

    array_push($response,$value);
}

echo json_encode($response);

?>