<?php
	class complementosDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		function buscarTodos()
		{
			$sql = "SELECT * FROM ingredients";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos as complementos");
				}
				else
				{
					$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}
		}
		function buscarIngredientes($i)
		{
			$sql = "SELECT i.name, i.photo, i.preparation_time, i.id FROM complements c INNER JOIN ingredients i ON (c.ingredient_id=i.id) WHERE c.recipe_id=?";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $i);
				$ret = $stmt->execute();
				if(!$ret)
				{
					die("Erro ao buscar ingredientes.");
				}
				else
				{
					$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}			
		}
		function buscarTempo($i)
		{
			$sql = "SELECT i.preparation_time FROM complements c INNER JOIN ingredients i ON (c.ingredient_id=i.id) WHERE c.ingredient_id=? LIMIT 1";
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $i);
				$ret = $stmt->execute();
				if(!$ret)
				{
					die("Erro ao buscar ingredientes.");
				}
				else
				{
					$resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch (PDOException $e)
			{
				die( $e->getMessage());
			}			
		}
	}
?>