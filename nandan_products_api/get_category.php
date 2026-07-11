<?php

include('connect.php');

$sql = "SELECT * FROM product_main_category";

$row = mysqli_query($con,$sql);

$response = array();

while($data = mysqli_fetch_array($row))
{
    $value["category_id"] = $data["category_id"];
    $value["category_name"] = $data["category_name"];
    $value["category_img"] = $data["category_img"];

    array_push($response,$value);
}

echo json_encode($response);

mysqli_close($con);

?>