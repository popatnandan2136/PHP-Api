<?php
    include('connect.php');

    $$product_id = $_POST["$product_id"];
   

    if($$product_id=="")
    {
        echo '0';
    }
    else
    {
        $sql = "delete from products where product_id='$product_id'";
        mysqli_query($con,$sql);
    }
    
?>