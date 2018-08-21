<?php
 session_start(); 
  if(!isset($_SESSION['type']) || $_SESSION['type']!='1')
  {
    header("Location: index.php");
    die();
  }
  if(isset($_POST['id'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    include"dbcon.php";
    $sql1="update `poll` set active=0 WHERE id=$id";
     
    if(mysqli_query($con,$sql1)){
      echo "<script>alert('Deleted.'); </script>";
    }else{

      echo "<script>alert('Problem while deleting.'); </script>";
    }
    mysqli_close($con);
  }

  	include "dbcon.php";
  	$sql="select * from poll where active=1 and section='".$_SESSION['section']."'";
    $result=mysqli_query($con,$sql);
  
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="pollstyle.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

  <?php while($row=mysqli_fetch_assoc($result)){?>
  <form action="" method="post">

  <div class="row">
    <input style="width: 50%;" type="text" name="title" id="fancy-text" autocomplete="off" readonly value="<?php echo $row['title'];?>"/>
    <label for="fancy-text">Title</label>

   <button type="submit" class="danger" tabindex="0">Delete</button>
  </div>
   
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">

   </form>
  <?php } mysqli_close($con);?>
 
 
  
 


<script>

</script>

</body>
</html>