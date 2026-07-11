<?php

include('connect.php');

$n1 = $_POST['name'];
$s1 = $_POST['surname'];
$m1 = $_POST['mobile_number'];
$e1 = $_POST['email'];
$p1 = $_POST['password'];

if($n1=="" || $s1=="" || $m1=="" || $e1=="" || $p1=="")
{
    echo "0";
}
else
{
    $query = "INSERT INTO signup(name,surname,mobile_number,email,password)
              VALUES('$n1','$s1','$m1','$e1','$p1')";

    mysqli_query($con,$query);

    echo "1";
}

mysqli_close($con);

?>