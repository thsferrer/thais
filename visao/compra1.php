 <?php
 include "visao/cabec2.php";
  $client_recipe_id="";
 ?>
<form action="index.php?controle=relatorioControle&metodo=finalizar"  method="POST" id="Cadastro">
<?php
	foreach($ret as $g)
	{
		echo "<br/><div>";
		echo "<img src='./{$g->photo}'/>";
		echo "<input type='radio' name='ingredient_id' value='{$g->id}'/>";
		//var_dump($g->id);
		echo "</div>";
		echo "<div>";
		echo "<label>{$g->name}</label>";
		echo "<br/>";
		echo "<label>{$g->preparation_time} min</label>";
		echo "</div>";
	}
	foreach($retorno as $m)
	{
		echo "<input type='hidden' name='client_recipe_id'  value='{$m->maximo2}' /> ";
	}
?>
<br/>
	<input type="button" value="Voltar" onClick="history.go(-1)" id="voltar"/> 
	<input type="submit" value="Finalizar" name="Finalizar" id="finalizar"/>
</form>
	</body>
</html>