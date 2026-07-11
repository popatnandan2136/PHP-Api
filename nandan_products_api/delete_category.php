<?php

include('connect.php');

$category_id = $_POST["category_id"];

if($category_id=="")
{
    echo "0";
}
else
{
    $sql = "DELETE FROM product_main_category WHERE category_id='$category_id'";

    mysqli_query($con,$sql);

    echo "1";
}

mysqli_close($con);

?>