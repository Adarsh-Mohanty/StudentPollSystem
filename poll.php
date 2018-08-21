<?php
 session_start(); 
  if(!isset($_SESSION['type']))
  {
    header("Location: index.php");
    die();
  }
  if(isset($_POST['inorout'])){
    include "dbcon.php";
    $inorout=$_POST['inorout'];
    $pollid=$_POST['pollid'];
    $userid=$_POST['userid'];
    if($inorout==1){
      //in
     $sql="insert into polldata values($pollid,$userid,NOW())";
     mysqli_query($con,$sql); 
    }else if($inorout==0){
     $sql="delete from polldata where pollid=$pollid AND useridin=$userid";
     mysqli_query($con,$sql); 
    }
    mysqli_close($con);
  }
  if(isset($_GET['pollid'])){

  	include "dbcon.php";
  	$sql="select * from poll where id=".$_GET['pollid']." AND section='".$_GET['section']."'";
  	if($result=mysqli_query($con,$sql))
  		{

        $row=mysqli_fetch_assoc($result);
        $pollid=$row['id'];
        $userid=$_SESSION['id'];
        $title=$row['title'];
        $desc =$row['desc'];
        
      }else{
  			echo"<script>alert('Something went wrong');</script>";
  		}

      $sql="select * from polldata where pollid=$pollid AND useridin=$userid";
      $result=mysqli_query($con,$sql);
  	mysqli_close($con);
  }
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

<form action="" method="post">
  <h1><?php echo $title; ?></h1>
   <p><?php echo $desc; ?>
   </p>
  
  
  <input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>">

  <input type="hidden" name="pollid" value="<?php echo $pollid;?>">

 
  <?php 
  if(mysqli_num_rows($result)>0){
    ?>
  <input type="hidden" name="inorout" value="0">
  <button type="submit" class="danger" tabindex="0" style="width: 100%;">Not Done</button>
  <?php }else{ ?>
  <input type="hidden" name="inorout" value="1">
  <button type="submit"  tabindex="0" style="width: 100%;">Done</button>
  <?php } ?>
</form>

<script>

</script>

</body>
</html>