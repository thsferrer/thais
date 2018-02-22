 <?php
 include "visao/cabec2.php"; 
 $client_id="";
 ?>
<form action="index.php?controle=relatorioControle&metodo=compra1"  method="POST" id="Cadastro"> 
<?php
	foreach($ret as $i)
	{
		echo "<br/><div>";
		echo "<img src='./{$i->photo}'/>";
		echo "<input type='radio' name='recipe_id' value='{$i->id}'/>";
		//var_dump($i->id);
		echo "</div>";
		echo "<div>";
		echo "<label>{$i->name}</label>";
		echo "</div>";
	}
	foreach($retorno as $r)
	{
		echo "<input type='hidden' name='client_id'  value='{$r->maximo}' /> ";
	}
?>
<br/>
	<input type="submit" value="Continuar" name="Continuar"/>
</form>
	</body>
</html>