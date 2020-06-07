<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link href = "../styles/style.css" rel = "stylesheet"  type = "text/css" title = "Style" />
	<body>
	
	<div class="top">
		<h3>Online Recipe Management System</h3>
		
	</div>
	
	<div class="header">
		<div class="menu">
                    <nav class="nav-links">
                            <a href="../OnlineRecipeManagement.php" class="active">Homepage</a>
                            <a href="login.php">Login</a>
                            <a href="sign-up.php">Sign Up</a>
							<a href="../admin/addRecipe.php">Add Recipe</a>
                            
                    </nav>
                </div>
    </div>
    
    <div class="userName">
    	<h2>Welcome To Online Recipe Management System</h2>
    	<div class="signUp">
    		
    		<form action="sign-up.php" method="post" id="signUp">
    				<p>
    				<label for="username">Username</label>
  					<input type="text" name="username" id="username" placeholder="Enter Username"></p><br />
  					<p><label for="password">Password</label>
  					<input type="password" name="password" id="password" placeholder="Password"></p><br />
  					<p><label for="fName">First Name</label>
  					<input type="text" name="fName" id="fName" placeholder="Enter First Name"></p><br />
  					<p><label for="lName">Last Name</label>
  					<input type="text" name="lName" id="lName" placeholder="Enter Last Name"></p><br />
  					<p><label for="address">Address</label>
  					<input type="text" name="address" id="address" placeholder="Enter Address"></p><br />
  					
  					
    		</form>
			<input type="submit" name="submit" value="Sign Up" form="signUp" />
    		
    	</div>
    	<?php
    	require("../Model/Recipes_Model.php");
    	if(isset($_POST['submit']))
    	{
    		extract($_REQUEST);
			if(empty($_POST['username']))
			{
				print "please enter userName";
				
			}else if(empty($_POST['password']))
			{
				print "please enter password";
			}else 	if(empty($_POST['fName']))
			{
				print "please enter first Name";
			}else if(empty($_POST['lName']))
			{
				print "please enter Last Name";
				
			}else 	if(empty($_POST['address']))
			{
				print "please enter Address";
			}else 
			{
				add_User($username,$password,$fName,$lName,$address);
			}
			
			
		}
    	
    	
    	?>
    
    </div>
    <?php include "../view/footer.php"?>
    
    </body>
    </html>