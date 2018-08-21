<?php
	if(!isset($_POST['regdno']) && !isset($_POST['section'])){
		header('Location: index.php');
		die();
	}else if(!isset($_POST['section'])){
	$con=mysqli_connect("localhost","root","","cseb");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// ...some PHP code for database "my_db"...
	$sql="insert into usertable(fname,lname,pass,email,regdno) values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['pass']."','".$_POST['email']."','".$_POST['regdno']."')";
	if(mysqli_query($con,$sql)){

	} else {
	    echo "<script>alert('Already registered. Facing problem? I dont have time to make this site sophisticated.. ask me(Adarsh) I will reset in db! XD');</script>";
	}
	mysqli_close($con);
}else{
	$con=mysqli_connect("localhost","root","","cseb");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	// ...some PHP code for database "my_db"...
	$sql="update usertable set section='".$_POST['section']."' where fname='".$_POST['fname']."' AND email='".$_POST['email']."'";
	if(mysqli_query($con,$sql)){
		echo "<script>alert('Great! You can login now.'); window.location='index.php';</script>";
		
	} else {
	    echo "<script>alert('Something went wrong! I dont have time to make this site sophisticated.. ask me(Adarsh) I will reset in db! XD');</script>";
	}
	mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="form">
      
      
      <div class="tab-content">
        <div id="signup">   
          <h1>SECTION</h1>
          
          <form action="section.php" method="post">
          
          <div class="top-row">
           
		   <div class="field-wrap" style="width: 100%">
           
            <select name="section" >
            	<option value="A">A</option>
            	<option value="B">B</option>
            	<option value="C">C</option>
            </select>
          </div>
		</div>
		<br>
          <input type="hidden" name="email" value="<?php echo $_POST['email'];?>">

          <input type="hidden" name="fname" value="<?php echo $_POST['fname'];?>">
          <button type="submit" class="button button-block"/>Done</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="/" method="post">
          
            <div class="field-wrap">
            <label>
              Registration Number<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off" name="regdno"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="pass"/>
          </div>
          
     <!--   <p class="forgot"><a href="#">Forgot Password?</a></p>
         -->
          <button class="button button-block"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

<script>
	$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
	  var $this = $(this),
	      label = $this.prev('label');

		  if (e.type === 'keyup') {
				if ($this.val() === '') {
	          label.removeClass('active highlight');
	        } else {
	          label.addClass('active highlight');
	        }
	    } else if (e.type === 'blur') {
	    	if( $this.val() === '' ) {
	    		label.removeClass('active highlight'); 
				} else {
			    label.removeClass('highlight');   
				}   
	    } else if (e.type === 'focus') {
	      
	      if( $this.val() === '' ) {
	    		label.removeClass('highlight'); 
				} 
	      else if( $this.val() !== '' ) {
			    label.addClass('highlight');
				}
	    }

	});

	$('.tab a').on('click', function (e) {
	  
	  e.preventDefault();
	  
	  $(this).parent().addClass('active');
	  $(this).parent().siblings().removeClass('active');
	  
	  target = $(this).attr('href');

	  $('.tab-content > div').not(target).hide();
	  
	  $(target).fadeIn(600);
	  
	});
</script>
</body>
</html>