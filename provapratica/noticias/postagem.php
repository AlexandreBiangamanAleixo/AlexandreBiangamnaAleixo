<?php

require_once 'Conexao.php';

class Postagem{
    public static function selecionaTodos(){
        $con = Connection::getConn();

        $sql = "SELECT * FROM noticias ORDER BY id DESC"; 
        $sql = $con->prepare($sql);
        $sql -> execute();

        $resultado = array();
        while ($row = $sql->fetchObject('Postagem')){
            $resultado = $row;
        }
        if (!$resultado){
            throw new Exception("Não foi encontrar registros");
        }
        return $resultado;



    }
}




?>