<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01//EN' 'http://www.w3.org/TR/html4/strict.dtd'>
<html lang='pt-br'>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
	<meta name='description' content=''> <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
	<title>Título</title>
	<link rel="stylesheet" type="text/css" href="green.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet">
</head>
<body>

<div id="rotinas-cnt">

	<div class="rotina sel">
		<h3>Nome da Rotina</h3>
		<p>Desc da rotina</p>
	</div>
</div>

<div id="title-cnt">
	<div id="beee">beee</div>
	<div id="t-desc">Gerenciador de rotinas</div>
</div>

<div id="novarotina-cnt">
	<a id="novarotina-bt" href="#">NOVA ROTINA</a>
</div>

<div id="edit-cnt">
	<div id="center">
		<div id="rotina-head">
			<input type="text" placeholder="Digite o nome da rotina" id="rh-nome">
			<input type="text" placeholder="Digite uma descrição" id="rh-desc">
		</div>

		<div id="rotina-bts">
			<a href="#" class="rotina-bt" id="rotina-del">EXCLUIR</a>
			<a href="#" class="rotina-bt">SALVAR</a>
			<a href="#" class="rotina-bt off">USANDO</a>
		</div>

		<div class="etapa" data-etapa="0">
			<div class="etapa-img-cnt">
				<div class="etapa-img-led r1"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>1</div>
				<div class="etapa-img-led r2"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>2</div>
				<div class="etapa-img-led r3"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>3</div>
				<div class="etapa-img-led r4"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>4</div>
				<div class="etapa-img-led r5"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>5</div>
				<div class="etapa-img-led r6"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>6</div>
				<div class="etapa-img-led r7"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>7</div>
				<div class="etapa-img-led r8"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>8</div>
				<div class="etapa-img-led r9"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>9</div>
				<div class="etapa-img-led ra"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>a</div>
				<div class="etapa-img-led rb"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>b</div><div class="etapa-img-led"><div class="etapa-img-led-s1"><div class="etapa-img-led-s2"></div></div>c</div>
			</div>
			<div class="etapa-int-cnt">
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
				<div class="etapa-int">
					<div class="etapa-int-l">L1</div>
					<input class="etapa-int-i" type="number" value="255">
				</div>
			</div>

			<div class="etapa-rem">
				<div class="er-bt">✕</div>
			</div>
		</div>

		<div class="trans t-left" data-etapa="0">
			<div class="trans-opt t-left">
				<div class="tr-ball"></div>
				<div class="tr-line"></div>
				<div class="tr-opt">ESPERAR <input class="trans-time" type="number" value="40"> MS</div>
				<div class="tr-ball"></div>
			</div>

			<div class="trans-opt t-right">
				<div class="tr-ball"></div>
				<div class="tr-line"></div>
				<div class="tr-opt">ESPERAR O CLIQUE</div>
				<div class="tr-ball"></div>
			</div>
		</div>

		<div class="etapa etapa-final" id="nova-etapa">
			+
		</div>
	</div>
</div>

<script src="js/jq.js"></script>
<script src="js/func.js"></script>

<script type="text/javascript">

seq = [
	[255,255,255,255,255,255,255,255,255,255,255,255,40,0]
];

</script>

</body>

</html>