<?php
	class pedidoDAO extends conexao
	{
		public function __construct()
		{
			parent::__construct();
		}
		function buscar()
		{
			$sql = "SELECT coupon_code FROM clients WHERE id=(SELECT MAX(ID) FROM clients)";
			try
			{
				$stmt = $this->db->prepare($sql);
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao buscar código do cupom");
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