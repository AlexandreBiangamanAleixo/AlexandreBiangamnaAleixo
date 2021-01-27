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
	<form method="Post" action="#">
		<input type="text" name="titulo" placeholder="Digite o título" maxlength="100">
		<input type="submit" name="postar" value="Excluir">
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
require_once 'Conexao.php';



if (isset($_POST['postar']))
{
$titulo=$_POST['titulo'];
  try
  { 
        $con = Connection::getConn();
        $sql = "SELECT * FROM noticias ORDER BY id DESC"; 
        $sql = $con->prepare($sql);
        $sql -> execute();
      
      $linha = $sql->fetch(PDO::FETCH_ASSOC);
      $id= $linha['id'];


      
      $sql = $con -> prepare("DELETE FROM noticias WHERE id = :i");
			$sql->bindValue(":i",$id);
			
			$sql->execute();
		
	 		echo "Notícias excluidas com sucesso"; 
      $filename=$linha['imagem'];
     
       unlink($filename);

           
   }
   catch(Exception $e)
   {
               echo $e->getMessage();
   }
        


}
?>