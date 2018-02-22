<?php
	class client_recipesDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		function buscarTodos()
		{
			$sql = "SELECT * FROM client_recipes";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar");
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
		function inserir($cc)
		{
			$sql = "INSERT INTO client_recipes(id,recipe_id,client_id) VALUES(?,?,?)";			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $cc->getId());
				$stmt->bindValue(2, $cc->getRecipe_id());
				$stmt->bindValue(3, $cc->getClient_id());
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
		function buscarid_receitadocliente()
		{
			$sql = "SELECT MAX(id) maximo2 FROM client_recipes";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar id da receita deste cliente");
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