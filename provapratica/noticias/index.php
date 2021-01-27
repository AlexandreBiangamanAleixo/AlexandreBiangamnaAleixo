<!DOCTYPE html>
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
       <Hh1>Site de Notícias -  inclusão de posts</Hh1>
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
		<h1>Inclua Posts no site de Notícias</h1>
	<form method="Post" action="incluir.php" enctype="multipart/form-data">
		<input type="text" name="titulo" placeholder="Digite o título" maxlength="100">
		<input type="text" name="slug"   placeholder="Digite o  Slug" maxlength="100">
		<input type="text" name="descricao" placeholder="Digite a Descrição" maxlength="200">
		<input type="text" name="palavras_chave" placeholder="Digite as palavras_chave" maxlength="100">
		<textarea id="conteudo" name="conteudo" rows="4" cols="50">Digite o conteúdo</textarea>
		<br><label for="imagem">Selecione a imagem:</label><input type="file" name="imagem" id="imagem">
		<input type="submit" name="postar" value="Postar">
		<br>
		<br>

	</form>
</div>
<footer>
	<div id="rodape">
		Desenvolvido por Alexandre Biangaman Aleixo
	</div>
</footer>
</body>
</html>