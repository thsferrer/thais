<?php
	class complementos
	{
		private $idreceita;
		private $idingrediente;
		
		function __construct($idreceita, $idingrediente)
		{
			$this->idreceita = $idreceita;
			$this->idingrediente = $idingrediente;
		}
		function getIdingrediente()
		{
			return $this->idingrediente;
		}
		function getIdreceita()
		{
			return $this->idreceita;
		}
	}
?>