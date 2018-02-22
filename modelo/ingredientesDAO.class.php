<?php
	class ingredientesDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		function buscarTodos()
		{
			$sql = "SELECT * FROM recipes";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar todos as receitas");
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