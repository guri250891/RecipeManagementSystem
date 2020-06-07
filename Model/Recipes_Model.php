<?php


require "dbConn.php";
	
		extract($_REQUEST);		   
		   
		/*$Author_Data=get_Author(1)	;	
		print"<pre>";
		print_r($Author_Data);  
			print"<pre>";*/

function get_Author($Selected_Recipe)
{
	global $dbConn;
	$Author_query="SELECT A.AuthorName,A.AuthorImage
				   FROM AUTHOR A,RECIPE R
    			   WHERE A.AuthorID=R.AuthorID and R.RecipeID='$Selected_Recipe'";
	try{
		
		$Author_result=$dbConn->prepare($Author_query);
	$Author_result->execute();
	$Author_Data=$Author_result->fetchAll(PDO::FETCH_ASSOC);
	$Author_result->closeCursor();
	
	return $Author_Data;
		
	}catch(PDOException $e)
	{
		print $e->getMessage();
	}
}
function get_Recipe($Selected_Recipe)
{
	global $dbConn;
	
		
	$Recipe_query="SELECT R.RecipeName,R.RecipeDesc,R.PrepTime,R.CookTime,R.RecipeImage
				   FROM AUTHOR A,RECIPE R 
				   WHERE A.AuthorID=R.AuthorID and R.RecipeID='$Selected_Recipe'";
	
	try{
			$Recipe_result=$dbConn->prepare($Recipe_query);
	$Recipe_result->execute();
	$Recipe_Data=$Recipe_result->FETCHALL(PDO::FETCH_ASSOC);
	$Recipe_result->closeCursor();
	
	return $Recipe_Data;
		
	}catch(PDOException $e)
	{
		print $e->getMessage();
	}
	
}
function get_Steps($Selected_Recipe)
{
	global $dbConn;
	$Step_query="SELECT S.StepNumber,S.StepDesc
				   FROM STEP S,RECIPE R 
				   WHERE S.RecipeID=R.RecipeID and R.RecipeID='$Selected_Recipe'";

try{

	
	$Step_result=$dbConn->prepare($Step_query);
	$Step_result->execute();
	$Step_Data=$Step_result->FETCHALL(PDO::FETCH_ASSOC);
	$Step_result->closeCursor();
	
	return $Step_Data;
				   
		
		
	}catch(PDOException $e)
	{
		print $e->getMessage();
	}	
}
function get_Ingredients($Selected_Recipe)
{
	global $dbConn;
		
		 $Ingredient_query="SELECT I.IngredientName,RI.IngredientAmt,RI.AmtUnits
				   FROM INGREDIENT I,RECIPE R,RECIPE_INGREDIENT RI
				   WHERE RI.RecipeID=R.RecipeID and I.IngredientID=RI.IngredientID and RI.RecipeID='$Selected_Recipe'";
				   
				   
				   try{
				   		
	
	$Ingredient_result=$dbConn->prepare($Ingredient_query);
	$Ingredient_result->execute();
	$Ingredient_Data=$Ingredient_result->FETCHALL(PDO::FETCH_ASSOC);
	$Ingredient_result->closeCursor();
	
	return $Ingredient_Data;
				   	
				   	
				   	
	}catch(PDOException $e)
	{
		print $e->getMessage();
	}
}
function add_Author($Entered_Author)
{
	global $dbConn;
	$inserted_Author="INSERT INTO AUTHOR(AuthorID,AuthorName) VALUES (default,:Entered_Author)";
	try{
		$insert_Auth=$dbConn->prepare($inserted_Author);
		
		$insert_Auth->bindValue(':Entered_Author',$Entered_Author);
		 $insert_Auth->execute();
		$insert_Auth->closeCursor();
		
		  $Auth_Id=$dbConn->lastInsertId();
		
		return $Auth_Id;
			print "Inserted Author with $Auth_Id successfully into the Author table";
		
	}catch(PDOException $e)
	{
		print $e->getMessage();
	}
	
}


function add_Recipe($recipeName,$recipeDesc,$authorID,$prepTime,$cookTime)
{
	global $dbConn;
	$inserted_Recipe="INSERT INTO RECIPE(RecipeID,RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES(default,:recipeName,:recipeDesc,:authorID,:prepTime,:cookTime)";
	try{
		$insert_Recipe=$dbConn->prepare($inserted_Recipe);
		
		$insert_Recipe->bindValue(':recipeName',$recipeName);
		$insert_Recipe->bindValue(':recipeDesc',$recipeDesc);
		$insert_Recipe->bindValue(':authorID',$authorID);
		$insert_Recipe->bindValue(':prepTime',$prepTime);
		$insert_Recipe->bindValue(':cookTime',$cookTime);
		
		$insert_Recipe->execute();
		$insert_Recipe->closeCursor();
		$Recipe_Id=$dbConn->lastInsertId();
		
		return $Recipe_Id;
			print "Inserted Recipe with $Recipe_Id successfully into the Recipe table";
		
	}catch(PDOException $e)
	{
		print $e->getMessage();
	}
	
}

function add_User($uName,$password,$fname,$lname,$address)
{
	global $dbConn;
	$user_query="INSERT INTO SignUp(userName,Password,firstName,lastName,Address) VALUES (:uName,SHA1(:password),:fname,:lname,:address)";
	
	try{
		$insert_User=$dbConn->prepare($user_query);
		
		$insert_User->bindValue(':uName',$uName);
		$insert_User->bindValue(':password',$password);
		$insert_User->bindValue(':fname',$fname);
		$insert_User->bindValue(':lname',$lname);
		$insert_User->bindValue(':address',$address);
		
		$insert_User->execute();
		$insert_User->closeCursor();
		
		print "User added successfully";
		/*$inserted_User=$insert_User->fetchAll(PDO::FETCH_ASSOC);
		return $inserted_User;*/
			
		
	}catch(PDOException $e)
	{
		print $e->getMessage();
		print "Please enter different userName";
	}
}


function get_User($Uid)
{
	global $dbConn;
	$user_query="SELECT SignUp.userName,SignUp.Password
					   FROM  SignUp
					   WHERE SignUp.userName='$Uid' ";
					try{
						$user_result=$dbConn->prepare($user_query);
					   
					   $user_result->execute();
					   
					   $user_data=$user_result->fetchAll(PDO::FETCH_ASSOC);
					   return $user_data;
					} catch(PDOException $e)
					{
						print $e->getMessage();
						print "Error Occured";
					}  
					   //AND SignUp.Password=SHA1('$password')
					   
					   
}
/*
print $authorID=add_Author("Gurinder Saini");

$Selected_Recipe=add_Recipe("Meat Balls teasting","fried and curry meat balls",$authorID,"20-25 minutes","20-25 minutes");

$auhtor=get_Author($Selected_Recipe);

$recipe=get_Recipe($Selected_Recipe);

print"<pre>";
print_r($auhtor);
print"</pre>";
print "<hr>";*/



?>