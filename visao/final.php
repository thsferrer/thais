 <?php
 include "visao/cabec2.php";
 ?>
 <br/>
 <h2 id='titulo'> Pedido realizado com sucesso!</h2>
<form action="index.php?controle=relatorioControle&metodo=finalizarcompra"  method="POST" id="Cadastro">
			<input type="hidden" name="id"  value="<?php echo $id; ?>" />  
<?php
	foreach($ret as $i)
	{
		echo "<br/><div>";
		echo "<label>Tempo total</label><br/>";
		echo "<label>{$i->preparation_time} min</label>";
		echo "</div>";
	}
?>
<br/>
	<img src="./images/seta.png"  onClick="history.go(-1)" id="seta">
	<input type="submit" value="Imprimir Cupom" name="Imprimir Cupom"/>
</form>
	</body>
</html>