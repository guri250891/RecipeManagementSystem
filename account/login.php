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
    
    <div class="login">
    	<h2>Welcome To Online Recipe Management System</h2>
    	<div class="loginBg">
    		
    		<form action="login.php" method="post">
    				<label for="login">Login</label>
  					<input type="text" name="login" id="login" placeholder="ENTER USERNAME"><br /><br />
  					<label for="password">Password</label>
  					<input type="password" name="password" id="password" placeholder="Password"><br /><br />
  					<input type="submit" name="submit" value="Login" /><br /><br />
  					<a href="sign-up.html">New user click to sign up</a>
    		</form>
    		
    	</div>
    	<?php
    require("../Model/Recipes_Model.php");
    	extract($_REQUEST);
    	
    	if(isset($_POST['submit']))
    	{
			
			if(empty($_POST['login']))
			{
				
				print "<p>Plese enter userName</p>";
			}
			else if(empty($_POST['password']))
			{
				print "<p>Plese enter Password</p>";
				
			}
			else{
				
				$user_query="SELECT SignUp.userName,SignUp.Password
					   FROM  SignUp
					   WHERE SignUp.userName='$login' ";
					   
					   //AND SignUp.Password=SHA1('$password')
					   
					   $user_result=$dbConn->prepare($user_query);
					   
					   $user_result->execute();
					   
					   $user_data=$user_result->fetchAll(PDO::FETCH_ASSOC);
					   
					  if($user_data!=null)
					  {
					  	foreach($user_data as $user_info)
					  	{
							if($user_info['userName']==$login && $user_info['Password']==SHA1($password))
							{
								print "<a href='../admin/addRecipe.php' id='addRecipePage'>Click here to add a recipe</a>'";
							}
							else{
								
								print "Try Again, Wrong id or Password ";
							}
						}
					  }
					   
					
					   
					   
					   
				
	}
		}
    	
    	
    	?>
    
    </div>
	
	<?php include "../view/footer.php"?>
    
    
    </body>
    </html>