<?php
 session_start(); 
  if(!isset($_SESSION['type']))
  {
    header("Location: index.php");
    die();
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Poll Portal | Dashboard</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="dashboardstyle.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="admin">
  <header class="admin__header">
    <?php if($_SESSION['regdno']=='1501289247'){?>
    <a href="." class="logo" style="background: linear-gradient(251deg, #a815c6, #287ce6, #7e60e7, #05b94e);background-size: 800% 800%;-webkit-animation: bishnu 30s ease infinite;-moz-animation: bishnu 30s ease infinite;animation: bishnu 30s ease infinite;">
      <h1><?php echo $_SESSION['fname'];?></h1>
    </a>
    <?php }else{?>
    <a href="." class="logo">
      <h1><?php echo $_SESSION['fname'];?></h1>
    </a>
    <?php } ?>
    <div class="toolbar">
    <?php if($_SESSION['type']==1){ ?> <button class="btn btn--primary">ADMIN | CR bhai zindabad</button>  <?php }else{?>
      <button class="btn btn--primary">STUDENT</button> 
    <?php }?>
      <a href="logout.php" class="logout">
        Log Out
      </a>
    </div>
  </header>
  <nav class="admin__nav">
    <ul class="menu">
  <?php if($_SESSION['type']==1){ ?> 
      <li class="menu__item adminoption">
        <a class="menu__link" href="createPoll.php" target="display">Create Poll</a>
      </li>
      <li class="menu__item adminoption">
        <a class="menu__link" href="editPoll.php"  target="display">Edit Poll</a>
      </li>
      <li class="menu__item adminoption">
        <a class="menu__link" href="deletePoll.php" target="display">Delete Poll</a>
      </li>
      <li class="menu__item adminoption">
        <a class="menu__link" href="view.php" target="display">View Status</a>
      </li>
  <?php }?>

    <?php 
    include "dbcon.php";
    $sql="select * from poll where active=1 AND section='".$_SESSION['section']."'";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
    ?>
      <li class="menu__item">
        <a class="menu__link" href="poll.php?pollid=<?php echo $row['id'];?>&section=<?php echo $row['section']; ?>" target="display"><?php echo $row['title']; ?></a>
      </li>
    <?php 
      }mysqli_close($con);
    ?>
<!-- 
      <li class="menu__item">
        <a class="menu__link" href="#" target="display">History</a>
      </li> -->
     
    </ul>
  </nav>
  <iframe name="display" id="display">
    
  </iframe>
  <!-- <main class="admin__main">
    <h2>Dashboard</h2>
    <div class="dashboard">
      <div class="dashboard__item">
        <div class="card">
          <strong>41</strong> Foobars
        </div>
      </div>
      <div class="dashboard__item">
        <div class="card">
          <strong>81.712</strong> Doohickeys
        </div>
      </div>
      <div class="dashboard__item dashboard__item--full">
        <div class="card">
          <img src="https://imgs.xkcd.com/comics/decline.png" alt="" />
        </div>
      </div>
      <div class="dashboard__item dashboard__item--col">
        <div class="card">A</div>
      </div>
      <div class="dashboard__item dashboard__item--col">
        <div class="card">B</div>
      </div>
      <div class="dashboard__item dashboard__item--col">
        <div class="card">C</div>
      </div>
      <div class="dashboard__item dashboard__item--col">
        <div class="card">D</div>
      </div>
    </div>
   
  </main> -->
  <footer class="admin__footer">
   <!--  <ul class="ticker">
     <li class="ticker__item">BTC: +3.12%</li>
     <li class="ticker__item">ETH: +1.29%</li>
     <li class="ticker__item">XRP: -0.32%</li>
     <li class="ticker__item">BCH: -2.82%</li>
     <li class="ticker__item">EOS: +1.44%</li>
     <li class="ticker__item">CSS: +13.37%</li>
   </ul> -->
    <span>
      &copy; Adarsh/2018
    </span>
  </footer>
</div>
</body>
</html>