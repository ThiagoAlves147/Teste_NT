<?php

    try{
        $pdo = new PDO('mysql:dbname=db_testeNT;host=mysql', "thiago", "12345"); //Tenta fazer  a conexão com o banco de dados
    }catch(PDOException $e){
        $pdo = false;
    }
    
?>