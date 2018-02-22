<?php
	class client_recipe_ingredientsDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function inserir($c)
		{
			$sql = "INSERT INTO client_recipe_ingredients(ingredient_id,client_recipe_id) VALUES(?,?)";			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $c->getIngredient_id());
				$stmt->bindValue(2, $c->getRecipe_id());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao Inserir Receita para o cliente.");
				}
				
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
		
	}
?>