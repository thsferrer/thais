<?php
	class usuarioDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function inserir($usuario)
		{
			$sql = "INSERT INTO clients(id, name, email, coupon_code) VALUES(?,?,?,?)";			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $usuario->getId());
				$stmt->bindValue(2, $usuario->getName());
				$stmt->bindValue(3, $usuario->getEmail());
				$stmt->bindValue(4, $usuario->getCoupon());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao Inserir Usuário");
				}
				
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
		function buscarid()
		{
			$sql = "SELECT MAX(id) maximo FROM clients";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar id");
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