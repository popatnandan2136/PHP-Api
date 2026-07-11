<?php

include('connect.php');

$product_id = $_POST["product_id"];

if($product_id=="")
{
    echo "0";
}
else
{
    $sql = "DELETE FROM products WHERE product_id='$product_id'";

    mysqli_query($con,$sql);

    echo "1";
}

mysqli_close($con);

?>