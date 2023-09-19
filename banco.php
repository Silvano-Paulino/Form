<?php 
    // CONEXAO COM O BANCO DADOS
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=formtest', 'root', '');

    }catch(PDOException $e) {
        $e->getMessage();
        
    }

?>