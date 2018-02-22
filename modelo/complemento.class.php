<?php
	class complemento
	{
		private $id;
		private $name;
		private $preparation_time;
		private $photo;
		
		function __construct($id, $name, $preparation_time, $photo)
		{
			$this->id = $id;
			$this->name = $name;
			$this->preparation_time = $preparation_time;
			$this->photo = $photo;
		}
		function getId()
		{
			return $this->id;
		}
		function getName()
		{
			return $this->name;
		}
		function getPrep()
		{
			return $this->preparation_time;
		}
		function getPhoto()
		{
			return $this->photo;
		}
	}
?>