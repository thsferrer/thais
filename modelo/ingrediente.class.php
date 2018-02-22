<?php
	class ingrediente
	{
		private $id;
		private $name;
		private $content;
		private $photo;
		
		function __construct($id, $name, $content, $photo)
		{
			$this->id = $id;
			$this->name = $name;
			$this->content = $content;
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
		function getContent()
		{
			return $this->content;
		}
		function getPhoto()
		{
			return $this->photo;
		}
	}
?>