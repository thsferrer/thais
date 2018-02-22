<?php
  include "visao/cabec.php";
  $client_id="";
?>
<script type="text/javascript">
function valida(){
		var name = document.getElementById("name");
		var email = document.getElementById("email");
		if(name.value == ""){
			alert("Campo Nome não preenchido!");
			return false;
		} 
		else if(email.value == ""){
			alert("Campo Email não preenchido!");
			return false;
		}
		return true;
}
</script>
<!DOCTYPE html>
<html>
	<body>
	<form action="index.php?controle=relatorioControle&metodo=inserirUsuario"  method="POST" id="Cadastro" onsubmit="return valida()">
			 <input type="hidden" name="client_id"  value="<?php echo $client_id; ?>" />   
			
			<label for="nome">Nome Completo</label><br/>
			<input type="text" name="name" id="name"/>
			<br/><br/>			
			<label for="email">E-mail</label><br/>
			<input type="text" name="email" id="email"/>
			<br/><br/>
			<input type="submit" value="CADASTRAR" name="Cadastrar" id="cadastrar"/>
			
		</form>
	</body>	
</html>