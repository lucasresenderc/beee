<?php

//conecta com o db
require "db.php";
$rotinas = retornarRotinas();
if( empty($rotinas) ){
	novaRotina();
	usarRotina(retornarUltimoId());
	header("Refresh:0");
} else {

?>

<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<html lang='pt-br'>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	<meta name='description' content=''> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
	<title>Beee</title>
	<link rel="stylesheet" type="text/css" href="green.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet">
</head>
<body>

<div id="rotinas-cnt">

<?php
$start = true;
$r = [];
foreach ($rotinas as $rotina) {
	$sel = '';
	if( (isset($_GET['id']) && $rotina[0] == $_GET['id']) || !isset($_GET['id']) && $start ){
		$sel = 'sel';
		$r = [$rotina[0],$rotina[1],$rotina[2], json_decode($rotina[3]) ,$rotina[4]];
	}
	echo '<a href="index.php?id='.$rotina[0].'"><div class="rotina '.$sel.'">
		<h3>'.$rotina[1].'</h3>
		<p>'.$rotina[2].'</p>
	</div></a>';
	$start = false;
}

?>

</div>

<div id="title-cnt">
	<div id="beee">beee</div>
	<div id="t-desc">Gerenciador de rotinas</div>
</div>

<div id="novarotina-cnt">
	<a id="novarotina-bt" href="novarotina.php">NOVA ROTINA</a>
</div>

<div id="edit-cnt">
	<div id="center">
		<form action="salvar.php" method="POST" id="rotina-head">
			<input type="text" name="nome" placeholder="Digite o nome da rotina" id="rh-nome" value="<?php echo $r[1]; ?>">
			<input type="text" name="desc" placeholder="Digite uma descrição" id="rh-desc" value="<?php echo $r[2]; ?>">
			<input type="hidden" name="id" value="<?php echo $r[0]; ?>">
			<input type="hidden" name="rotina" id="hidden-rotina" value="">
		</form>

		<div id="rotina-bts">
			<a href="excluir.php?id=<?php echo $r[0]; ?>" class="rotina-bt" id="rotina-del">EXCLUIR</a>
			<div id="rotina-salvar" class="rotina-bt">SALVAR</div>
			<?php
			if( $r[4] == '1' ){
				echo '<a href="#" class="rotina-bt off">USANDO</a>';
			} else {
				echo '<a href="usar.php?id='.$r[0].'" class="rotina-bt">USAR</a>';
			}
			?>
		</div>

		<?php

		$etapaindex = 0;
		foreach ($r[3] as $etapa) {
			echo ' <div class="etapa" data-etapa="'.$etapaindex.'">
				<div class="etapa-img-cnt">';

			for($i=0; $i<12; $i++){
				echo '<div class="etapa-img-led r'.dechex($i+1).'"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2" style="opacity: '.(floatval($etapa[$i])/255).'"></div></div>'.dechex($i+1).'</div>';
			}
			
			echo '</div>
				<div class="etapa-int-cnt">';

			for($i=0; $i<12; $i++){
				echo '<div class="etapa-int">
						<div class="etapa-int-l">L'.dechex($i+1).'</div>
						<input class="etapa-int-i" type="number" value="'.$etapa[$i].'">
					</div>';
			}

			echo '</div>
					<div class="etapa-rem">
						<div class="er-bt">✕</div>
					</div>
				</div>

				<div class="trans '.( $etapa[13] == '0'? 't-left' : 't-right' ).'" data-etapa="'.$etapaindex.'">
					<div class="trans-opt t-left">
						<div class="tr-ball"></div>
						<div class="tr-line"></div>
						<div class="tr-opt">ESPERAR <input class="trans-time" type="number" value="'.$etapa[12].'"> MS</div>
						<div class="tr-ball"></div>
					</div>

					<div class="trans-opt t-right">
						<div class="tr-ball"></div>
						<div class="tr-line"></div>
						<div class="tr-opt">ESPERAR O CLIQUE</div>
						<div class="tr-ball"></div>
					</div>
				</div>';

			$etapaindex++;
		}
		?>

		<div class="etapa etapa-final" id="nova-etapa">
			+
		</div>
	</div>
</div>

<script src="js/jq.js"></script>
<script src="js/func.js"></script>

<script type="text/javascript">

<?php

echo 'seq = '.json_encode($r[3]).';';
?>

</script>

</body>

</html>

<?php
}
?>