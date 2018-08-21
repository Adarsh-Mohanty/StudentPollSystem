<?php
session_start();
if(!isset($_POST['regdno']) || !isset($_POST['pass'])){
	header("Location: index.php");
	die();
}
include "dbcon.php";

$regdno=$_POST['regdno'];
$pass=$_POST['pass'];
$sql="select * from usertable where regdno='$regdno' AND pass='$pass' LIMIT 1";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $row=mysqli_fetch_assoc($result);
    $_SESSION['id']=$row["id"];
    $_SESSION['regdno']=$regdno;
    $_SESSION['type']=$row["type"];
    $_SESSION['fname']=$row["fname"];
    $_SESSION['lname']=$row["lname"];
    $_SESSION['section']=$row["section"];
    mysqli_close($con);
    header("Location: dashboard.php");
    die();

} else {
    echo "<script>alert('Wrong login credentials.'); window.location='index.php';</script>";
}

?>