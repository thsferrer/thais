<?php 
	//require_once"visao/cabec2.php";
	require_once "mpdf60/mpdf.php"; 
	foreach($ret as $i)
		{
				// QR Code
				$html = $html . "<img src='https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl={$i->coupon_code}' id='qrcode'>";
				$mpdf=new mPDF(); // instancia a classe mpdf (parâmetros: qual tipo da folha, margem...)
				$mpdf->SetDisplayMode('fullpage'); // página completa
				$css = file_get_contents("css/css.css"); // pegando o conteúdo de css 
				$mpdf->WriteHTML($css,1); // passa o css				
				$mpdf->WriteHTML($html); // write
				$mpdf->Output();     
		} 
?>