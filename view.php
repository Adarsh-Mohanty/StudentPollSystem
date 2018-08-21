<?php
 session_start(); 
  if(!isset($_SESSION['type']) || $_SESSION['type']!='1')
  {
    header("Location: index.php");
    die();
  }
 
  	include "dbcon.php";
  	$sql="select poll.id,poll.title,poll.section,count(polldata.pollid) as c from polldata right join poll on poll.id=polldata.pollid where section='".$_SESSION['section']."' group by polldata.pollid ";
  	$result=mysqli_query($con,$sql);
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
<div class="container">
<table>
  <thead>
<tr>
  <th>Poll</th>
  <th>Section</th>
    <th>Registered</th>
    <th></th>
</tr>
<thead>
  <tbody>
<?php while($row=mysqli_fetch_assoc($result)){?>
<tr>
  
   <td><?php echo $row['title']."</td><td> ".$row['section']."</td><td> ".$row['c']; ?></td><td><a style="text-decoration: none;" href="viewdetails.php?id=<?php echo $row['id']."&title=".$row['title']; ?>" ><i class="fas fa-arrow-alt-circle-right"></i></a></td>
</tr>
<?php }?>
  
 </tbody>
</table>
 
  </div>
 


<script>

</script>

</body>
</html>