<?php

include('connect.php');

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

$sql = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
$result = mysqli_query($con,$sql);

$num = mysqli_num_rows($result);

if($num>0)
{
    $fetch = mysqli_fetch_assoc($result);

    echo json_encode([
        "code"=>200,
        "customer_id"=>$fetch["customer_id"],
        "name"=>$fetch["name"],
        "surname"=>$fetch["surname"],
        "mobile_number"=>$fetch["mobile_number"],
        "email"=>$fetch["email"]
    ]);
}
else
{
    echo json_encode([
        "code"=>404
    ]);
}

mysqli_close($con);

?>