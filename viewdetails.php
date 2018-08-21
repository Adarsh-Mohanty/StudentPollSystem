<?php
 session_start(); 
  if(!isset($_SESSION['type']) || $_SESSION['type']!='1')
  {
    header("Location: index.php");
    die();
  }
 
  	include "dbcon.php";
    $pollid=$_GET['id'];
    $title=$_GET['title'];
  	$sql="select A.*,B.fname,B.lname,B.regdno,B.email from polldata A left join usertable B on A.useridin=B.id where A.pollid=$pollid";
    //$sql1="select id,fname,lname,regdno,email from usertable where not exists (select useridin from polldata,usertable where polldata.useridin=usertable.id) AND section='".$_SESSION['section']."' ";
    $sql1="select * from usertable where id not in (select useridin from polldata where pollid='".$_GET['id']."') and section='".$_SESSION['section']."'";
  	$result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql1);
  	mysqli_close($con);
  
?>


<!DOCTYPE html>
<html>
<head>
	<title></title><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="pollstyle.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="view">
  <h1 style="text-align: center;"><?php echo $title; ?></h1>
<div class="container">
  <h3 style="text-align: center;">Registered(<?php echo mysqli_num_rows($result);?>)</h3>
<table>
  <thead>
<tr>
  <th>Sl no</th>
  <th>Name</th>
  <th>Regd No</th>
    <th>Email</th>
    <th>Time</th>
</tr>
<thead>
  <tbody>
<?php  $cnt=1; while($row=mysqli_fetch_assoc($result)){?>
<tr>
  
   <td><?php echo $cnt++."</td><td>".$row['fname']." ".$row['lname']."</td><td> ".$row['regdno']."</td><td> ".$row['email']; ?></td><td><?php echo $row['date'];?></td>
</tr>
<?php }?>
  
 </tbody>
</table><br>

  <h3 style="text-align: center;">Not-Registered(<?php echo mysqli_num_rows($result1);?>)</h3>
  <table>
  <thead>
<tr>
  <th>Sl no</th>
  <th>Name</th>
  <th>Regd No</th>
    <th>Email</th>
</tr>
<thead>
  <tbody>
<?php $cnt=1;  while($row=mysqli_fetch_assoc($result1)){?>
<tr>
  
   <td><?php echo $cnt++."</td><td>".$row['fname']." ".$row['lname']."</td><td> ".$row['regdno']."</td><td> ".$row['email']; ?></td>
</tr>
<?php }?>
  
 </tbody>
</table>
<?php //} ?>
  </div>


<script>

</script>

</body>
</html>