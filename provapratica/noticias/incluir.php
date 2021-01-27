<?php

$formatosPermitidos=array("png","jpeg","jpg","gif");
	$extensao=pathinfo($_FILES['imagem']['name'],PATHINFO_EXTENSION);
	
	if (in_array($extensao,$formatosPermitidos))
	{
		$pasta="arquivo/";
		$temporario=$_FILES['imagem']['tmp_name'];
		$novoNome=uniqid().".$extensao";
		
		if (move_uploaded_file($temporario, $pasta.$novoNome))
		{
			$mensagem="Upload feito com sucesso!";
		}
		else
		{
			$mensagem="Erro, não foi possível fazer o upload!";
		}
	}
	else
	{
		$mensagem="Formato Inválido";
	}




require_once 'conexao.php';
$con = Connection::getConn();
$titulo=$_POST['titulo'];
$slug=$_POST['slug'];
$descricao=$_POST['descricao'];
$palavras_chave=$_POST['palavras_chave'];
$conteudo=$_POST['conteudo'];
$imagem2=$pasta."/".$GLOBALS["novoNome"];

if(!empty($titulo) && !empty($slug) && !empty($descricao) && !empty($palavras_chave) && !empty($conteudo))
	{
		
		
			$sql = $con -> prepare("INSERT INTO noticias (titulo,slug,descricao,palavras_chave,conteudo,imagem) VALUES (:t, :s, :d, :p,:c,:i)");
			$sql->bindValue(":t",$titulo);
			$sql->bindValue(":s",$slug);
			$sql->bindValue(":d",$descricao);
			$sql->bindValue(":p",$palavras_chave);
			$sql->bindValue(":c",$conteudo);
			$sql->bindValue(":i",$imagem2);
			$sql->execute();
		?>
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
	  Notícias cadastradas com sucesso!!
</div>
<footer>
	<div id="rodape">
		Desenvolvido por Alexandre Biangaman Aleixo
	</div>
</footer>
</body>
</html>
<?php
	 		
}else{
	echo "Preencha os campos por favor";
}


?>