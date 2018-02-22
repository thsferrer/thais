<?php
	class usuario
	{
		private $id;
		private $name;
		private $email;
		private $coupon;
		private $created_at;
		
		function __construct($id, $name, $email, $coupon, $created_at)
		{
			$this->idUsuario = $id;
			$this->name = $name;
			$this->email = $email;
			$this->coupon_code = $coupon;
			$this->created_at = $created_at;
		}
		function getId()
		{
			return $this->id;
		}
		function getName()
		{
			return $this->name;
		}
		function getEmail()
		{
			return $this->email;
		}
		function getCoupon()
		{
			return $this->coupon_code;
		}
		function getCat()
		{
			return $this->created_at;
		}
		
		function setEmail($email)
		{
			$this->email=$email;
		}
	}
?>