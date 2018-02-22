<?php
	abstract class conexao {
		protected $db;
		
		protected function __construct()
		{
			$dsn="mysql:host=localhost;dbname=smart_coffee";
			try
			{
				$this->db = new PDO($dsn, "root", "");
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}
		}
	}
?>