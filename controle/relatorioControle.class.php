<?php
  include_once "funcao.php";
  class relatorioControle // criar uma classe
  {				
		function inicio()
		{
			require_once "visao/home.php";
		}
		function inserirUsuario() // função para inserir o usuário no BD
		{
			if($_POST)
			{
 				$coupon_code = uniqid(rand());
				$usuario = new usuario(null,$_POST["name"],$_POST["email"],$coupon_code,null); 
				$usuarioDAO = new usuarioDAO();
				$usuarioDAO->inserir($usuario);
				$iDAO = new ingredientesDAO();
				$ret = $iDAO -> buscarTodos();				
				$uDAO = new usuarioDAO();
				$retorno=$uDAO->buscarid();
				require_once"visao/compra.php";
			}
		}
		function compra1()
		{
			if($_POST)
			{
				$i = $_POST["recipe_id"];
				$cliente = $_POST["client_id"];
				$cc = new client_recipes(null, $i, $cliente, null);
				$ccDAO = new client_recipesDAO();
				$ccDAO->inserir($cc);
				$cDAO = new complementosDAO();
				$ret = $cDAO -> buscarIngredientes($i);				
				$rDAO = new client_recipesDAO();
				$retorno=$rDAO->buscarid_receitadocliente();
				require_once "visao/compra1.php";
			}
			
		}
		function finalizar()
		{
			if($_POST)
			{				
				$i = $_POST["ingredient_id"];
				$cliente = $_POST["client_recipe_id"];
				$c = new client_recipe_ingredients($i,$cliente);
				$cDAO = new client_recipe_ingredientsDAO();
				$cDAO->inserir($c);
				$cDAO = new complementosDAO();
				$ret = $cDAO -> buscarTempo($i);
				require_once "visao/final.php";
			}
		}
		function finalizarcompra()
		{
			if($_POST)
			{
				$cDAO = new pedidoDAO();
				$ret = $cDAO -> buscar();
				require_once "visao/comprovante.php";
			}
			
		}
  }
?>