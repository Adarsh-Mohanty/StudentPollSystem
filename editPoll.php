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
    $desc=$_POST['desc'];
    include"dbcon.php";
    $sql1="UPDATE `poll` SET `title`='$title',`desc`='$desc',`updatedby`='".$_SESSION['id']."',`date`=NOW() WHERE id=$id";
     
    if(mysqli_query($con,$sql1)){
      echo "<script>alert('Updated.'); </script>";
    }else{

      echo "<script>alert('Problem while updating.'); </script>";
    }
    mysqli_close($con);
  }

  	include "dbcon.php";
  	$sql="select * from poll where active=1 AND section='".$_SESSION['section']."'";
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
    <input type="text" name="title" id="fancy-text" autocomplete="off" value="<?php echo $row['title'];?>"/>
    <label for="fancy-text">Title</label>
  </div>
   <div class="row">
    <textarea name="desc" id="fancy-textarea"><?php echo $row['desc'];?></textarea>
    <label for="fancy-textarea">Description</label>
  </div>
    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
   <button type="submit" tabindex="0">Update</button>

   </form>
  <?php } mysqli_close($con);?>
 
 
  
 


<script>

</script>

</body>
</html>