<?php
?>
<html lang="pt">
<head>
	<title>Site de Nótícias</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alexandre Biangaman Aleixo">    
	<link href="noticias.css" rel="stylesheet">
</head>
<body>
	<div id="topo">
       <Hh1>Site de Notícias -  Alteração de posts</Hh1>
	</div>
	<div id="menu">
		<ul>
			<li><a href="Postagem2.php">Consultar</a></li>
			<li><a href="index.php">Inclusão</a></li>
			<li><a href="update.php">Alteração</a></li>
			<li><a href="excluir.php">Exclusão</a></li>
		</ul>
	</div>
	<div id="corpo">
	<form method="POST" action="update2.php">
		Consulte a Postatem por título  para alteraçr..
		<input type="text" name="titulo" placeholder="Digite o título" maxlength="100">
		<input type="submit" name="consultar" value="Consultar">
	</form>		
</body>
</div>
<footer>
	<div id="rodape">
		Desenvolvido por Alexandre Biangaman Aleixo
	</div>
</footer>
</html>

