<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
		.imageContainer {width: 100%;margin: 0 auto;display: inline-block;text-align: center;}
		.left {width: 50%; float: left;}
		.right {text-align: left;}
			img{width: 300px; height: 300px;}
			.recipeDetails {width: 100%;display: inline-block;padding: 40px;box-sizing: border-box;}
			p.recipeDesc {background: #cccccc6e;padding: 20px 50px;font-size: 18px;width: 55%;float: left;    margin: 0;}
			ul.recipeShort {width: 30%;display: inline-block;float: left;box-sizing: border-box;list-style: none; background: #ff000059;    padding: 33px 20px;margin: 0 0 0 30px;}
			.recipeShort h5 {width: 50%;display: inline-block;margin: 5px auto;}
			ul.ingredients {display: inline-block;width: 48%;float: left; box-sizing: border-box;background: red;list-style: circle;padding: 30px 0 40px 35px;margin: 30px 0;}
			.ingredients li {width: 45%;float: left;    margin: 0px 10px;}
			ul.steps {display: inline-block;float: left;width: 45%;margin: 30px 0 0 40px;background: skyblue;padding: 40px 50px;box-sizing: border-box;}
			.ingredients li h5 {margin: 10px 0px 0 0;}
		</style>
	</head>
	<body>
	
	
	<?php
	//connection 
	
	require("Model/Recipes_Model.php");
	$Selected_Recipe=1;

				
				   
				   
try{
	
	
	$Author_Data=get_Author($Selected_Recipe);
	$Recipe_Data=get_Recipe($Selected_Recipe);
	$Step_Data=get_Steps($Selected_Recipe);
	$Ingredient_Data=get_Ingredients($Selected_Recipe);

	
	?>
		
		<div class="imageContainer">
		<div class="left"><img src='images/<?php 
		foreach($Author_Data as $author )
		{
			print $author['AuthorImage'];}
		?>.jpg' alt='product image'  height="200" width="78"/></div>
		
		<div class="right"><img src='images/<?php 
	foreach($Recipe_Data as $recipe )
		{
			print $recipe['RecipeImage'];
		}
		?>.jpg'/></div>
		</div>
		
		<div class="recipeDetails">
		<h1><?php
		foreach($Recipe_Data as $recipe )
		{
			print $recipe['RecipeName'];
		}
		?></h1>
		<p class="recipeDesc">
		<?php
		foreach($Recipe_Data as $recipe )
		{
			print $recipe['RecipeDesc'];
		}
		?>
		</p>
		
		<ul class="recipeShort">
		<?php
		
			print"<li><h5>Author Name:</h5><h5>";
			
		foreach($Author_Data as $author )
		{
			print $author['AuthorName'];
		}
			foreach($Recipe_Data as $recipe )
		{
			print "</h5></li><li><h5>Prep Time:</h5><h5>";
			print $recipe['PrepTime'];
		
			print "</h5></li><li><h5>Cook Time:</h5><h5>";
			print $recipe['CookTime']."</h5></li>";
		}
		?>
		</ul>
		
		<ul class="ingredients">
		<?php
		foreach($Ingredient_Data as $Ingredient)
		{
			print"<li><h5>".$Ingredient['IngredientName']." ".$Ingredient['IngredientAmt']." ".$Ingredient['AmtUnits']."</h5></li>";
		}
		?>
	
			
	
		</ul>
		<ul class="steps">
		<?php
		foreach($Step_Data as $step)
		{
		print"<li>Step ".$step['StepNumber']."</li>";
		print"<li>".$step['StepDesc']."</li>";
		
}
 $x="insert into Author";
}
catch(PDOException $e)
{
	print $e->getMessage();
}
		?>
			
		</ul>
		</div>
		
		<?php include "view/footer.php"?>
	</body>
</html>