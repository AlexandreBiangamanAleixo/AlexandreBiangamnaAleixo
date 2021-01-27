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
       <Hh1>Site de Notícias</Hh1>
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
  <form method="Post" action="incluir.php" enctype="multipart/form-data">
<?php
require_once 'Conexao.php';
  try
  { 
        $con = Connection::getConn();
        $sql = "SELECT * FROM noticias ORDER BY id DESC"; 
        $sql = $con->prepare($sql);
        $sql -> execute();
      
     while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
      echo "Título: {$linha['titulo']} <br> Slug: {$linha['slug']} <br> Descrição: {$linha['descricao']} <br />  Palavras chaves: {$linha['palavras_chave']} <br> Conteudo {$linha['conteudo']} <br> <img src={$linha['imagem']}><br>";
    }
           
   }
   catch(Exception $e)
   {
               echo $e->getMessage();
   }
         
        
?>
</div>
<footer>
  <div id="rodape">
    Desenvolvido por Alexandre Biangaman Aleixo
  </div>
</footer>
</body>
</html>