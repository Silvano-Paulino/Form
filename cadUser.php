<?php
    include_once 'banco.php';

    if(isset($_POST['cadastro'])) {

        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $tel    = $_POST['telefone'];
        $senha  = md5($_POST['senha']);

        $sql = $conexao->prepare("INSERT INTO user(id, nome, email, telefone, senha) VALUES(DEFAULT,'$nome', '$email', '$tel', '$senha')");
        $rec = $sql->execute();
        if($rec) {
            echo '<script> alert("Usuário cadastrado com sucesso") </script>';
            echo '<script> window.location.href="index.php" </script>';
        }else {
            echo '<script> alert("Usuário não foi cadastrado") </script>';
            echo '<script> window.location.href="index.php" </script>';
        }
    }

    if(isset($_POST['alterar'])) {
        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $tel    = $_POST['telefone'];
        $senha  = md5($_POST['senha']);
        $id_alt = $_POST['id'];

        $sql =$conexao->prepare( "UPDATE user SET nome='$nome', email='$email', telefone='$tel', senha='$senha' WHERE id='$id_alt'");
        $rec = $sql->execute();

        if($rec) {
            echo '<script> alert("Usuário alterado com sucesso") </script>';
            echo '<script> window.location.href="index.php" </script>';
        }else {
            echo '<script> alert("Usuário não foi alterado") </script>';
            echo '<script> window.location.href="index.php" </script>';
        }
    }

    if(isset($_GET['deletar'])) {
        $delete = $_GET['deletar'];

        $sql = $conexao->prepare("DELETE FROM user WHERE id='$delete'");
        $rec = $sql->execute();

        if($rec) {
            echo '<script> alert("Usuário deletado com sucesso") </script>';
            echo '<script> window.location.href="index.php" </script>';
        }else {
            echo '<script> alert("Usuário não foi deletado") </script>';
            echo '<script> window.location.href="index.php" </script>';
        }

    }


?>