<?php
	class client_recipe_ingredients
	{
		private $ingredient_id;
		private $client_recipe_id;
		
		function __construct($ingredient_id,$client_recipe_id)
		{
			$this->ingredient_id = $ingredient_id;
			$this->client_recipe_id = $client_recipe_id;
		}
		function getIngredient_id()
		{
			return $this->ingredient_id;
		}
		function getRecipe_id()
		{
			return $this->client_recipe_id;
		}
	}
?>