<?php
require_once 'Conexao.php';



$titulo=$_POST['titulo'];

  try
  { 

        $con = Connection::getConn();
        $sql = "SELECT * FROM noticias where titulo=:t"; 
        $sql = $con->prepare($sql);
        $sql->bindValue(":t",$titulo);
        $sql -> execute();
      
      $linha = $sql->fetch(PDO::FETCH_ASSOC);

   

      $id= $linha['id'];
      $titulo=$linha['titulo'];
      $slug=$linha['slug'];
      $descricao=$linha['descricao'];
      $palavras_chave=$linha['palavras_chave'];
      $conteudo=$linha['conteudo'];
      $imagem=$linha['imagem'];
  var_dump($id);

   }
   catch(Exception $e)
   {
               echo $e->getMessage();
   }   

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
		<h1>Altere os Posts no site de Notícias</h1>
	<form method="Post" action="#" enctype="multipart/form-data">
		<input type="text" name="id" value='<?php echo $id?>' maxlength="100">
		<input type="text" name="titulo" placeholder="Digite o título" value='<?php echo $titulo?>' maxlength="100">
		<input type="text" name="slug"   placeholder="Digite o  Slug" value='<?php echo $slug?>'  maxlength="100">
		<input type="text" name="descricao" placeholder="Digite a Descrição"  value='<?php echo $descricao?>' maxlength="200">
		<input type="text" name="palavras_chave" placeholder="Digite as palavras_chave"  value='<?php echo $palavras_chave?>' maxlength="100">
		<textarea id="conteudo" name="conteudo" rows="4" cols="50"><?php echo $conteudo?></textarea>
		<img src="<?php echo $imagem?>" width="200"  height="100">
		<br><label for="imagem">Selecione a imagem:</label><input type="file" name="imagem" id="imagem">
		<input type="submit" name="alterar" value="Alterar">
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

<?php

if (isset($_POST['alterar']))
{
  var_dump($id);
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



	$titulo=$_POST['titulo'];
	$slug=$_POST['slug'];
	$descricao=$_POST['descricao'];
	$palavras_chave=$_POST['palavras_chave'];
	$conteudo=$_POST['conteudo'];
	$imagem2=$pasta."/".$GLOBALS["novoNome"];

  	try
  	{ 

   
      
      $sql = $con -> prepare("UPDATE noticias SET titulo=:t, slug=:s, descricao=:d, palavras_chave=:p, conteudo=:c, imagem=:i where id=:id");
			$sql->bindValue(":t",$titulo);
			$sql->bindValue(":s",$slug);
			$sql->bindValue(":d",$descricao);
			$sql->bindValue(":p",$palavras_chave);
			$sql->bindValue(":c",$conteudo);
			$sql->bindValue(":i",$imagem2);
			$sql->bindValue(":id",$id);
			$sql->execute();
		
	 		echo "Notícias atualizadas com sucesso"; 
    
           
   }
   catch(Exception $e)
   {
               echo $e->getMessage();
   }
        

}
?>