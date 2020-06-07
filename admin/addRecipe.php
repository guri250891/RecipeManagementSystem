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
                            <a href="../account/login.php">Login</a>
                            <a href="../account/sign-up.php">Sign Up</a>
							<a href="addRecipe.php">Add Recipe</a>
                            
                    </nav>
                </div>
    </div>
    
    <div class="addUserForm">
    	<h2>Welcome To Online Recipe Management System</h2>
    	<h2>Please fill the form to add a recipe</h2>
    	<div class="addUserBg">
    		
    		<form action="" method="post" id="addUser">
    				
    				<p>
    				<label for="author_name">Author Name</label>
  					<select id=auhhor_name name="author_name">
  					<option value="">Select Author</option>
  						<option value="Sanjeev Kapoor">Sanjeev Kapoor</option>
  						<option value="Tarla Dalal">Tarla Dalal</option>
  						<option value="Guy Fieri">Gui Fieri</option>
  						<option value="Gordon Ramsay">Gordon Ramsay</option>
  						<option value="Archana">Archana</option>
  						<option value="Harpal Singh Sokhi">Harpal Singh Sokhi</option>
  						<option value="Jamie Oliver">Jamie Oliver</option>
  						<option value="Bryant Terry">Bryant Terry</option>
  						<option value="Shipra Khanna">Shipra Khanna</option>
  						<option value="Padma Lakshmi">Padmalakshmi</option>
  					</select></p><br /><br />
  					<h3>OR</h3>
    				<p>    				
    				<label for="authorName">Author Name</label>
  					<input type="text" name="authorName" id="authorName" placeholder="Enter Authorname"></p><br />
  					<p><label for="recipeName">Recipe Name</label>
  					<input type="text" name="recipeName" id="recipeName" placeholder="Enter Recipe Name"></p><br />
  					<p><label for="recipeDesc">Recipe Description</label>
  					<textarea name="recipeDesc" id="addUser" rows="4" cols="40">Enter Recipe Description</textarea></p><br />
  					<p><label for="cookTime">Cook Time</label>
  					<input type="text" name="cookTime" id="cookTime" placeholder="Enter cook time"></p><br />
  					<p><label for="prepTime">Prep Time</label>
  					<input type="text" name="prepTime" id="prepTime" placeholder="Enter prep time"></p><br />
  					
    		</form>
			<input type="submit" name="submit" value="Add Recipe" id="addUser"/>
    		
    	</div>
    	
    	<?php
    	require("../Model/Recipes_Model.php");
    	if(isset($_POST['submit']))
    	{
    		extract($_REQUEST);
			if(empty($_POST['authorName']) && empty($_POST['author_name']))
			{
				print "please enter or select author name";
				
			}else if(empty($_POST['recipeName']))
			{
				print "please enter recipe Name";
			}else 	if(empty($_POST['recipeDesc']))
			{
				print "please enter recipe Description";
			}else if(empty($_POST['cookTime']))
			{
				print "please enter Cook Time";
				
			}else 	if(empty($_POST['prepTime']))
			{
				print "please enter Prep Time";
			}else 
			{
				if(!empty($_POST['author_name']))
				{
				$authorID=add_Author($author_name);

       add_Recipe($recipeName,$recipeDesc,$authorID,$prepTime,$cookTime);	
				}else{
					$authorID=add_Author($authorName);

     add_Recipe($recipeName,$recipeDesc,$authorID,$prepTime,$cookTime);	
				}
				
			}
			
			
		}
    	
    	
    	?>
    
    </div>
    <?php include "../view/footer.php"?>
    
    </body>
    </html>