<?php
	class client_recipes
	{
		private $id;
		private $recipe_id;
		private $client_id;
		private $created_at;
		
		function __construct($id,$recipe_id,$client_id,$created_at)
		{
			$this->id = $id;
			$this->recipe_id = $recipe_id;
			$this->client_id = $client_id;
			$this->created_at = $created_at;
		}
		function getId()
		{
			return $this->id;
		}
		function getRecipe_id()
		{
			return $this->recipe_id;
		}
		function getClient_id()
		{
			return $this->client_id;
		}
		function getCreated_at()
		{
			return $this->created_at;
		}
	}
?>