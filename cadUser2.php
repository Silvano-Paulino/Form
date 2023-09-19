<?php 
    include_once "banco.php";

    if(isset($_POST['cadastre'])) {
        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $tel    = $_POST['telefone'];
        $senha  = md5($_POST['senha']);

        $request = $conexao->prepare("INSERT INTO user(id, nome, email, telefone, senha) VALUES (DEFAULT,'$nome','$email', '$tel', '$senha')");
        $receive = $request->execute();

        if($receive) {
            echo "<script> 
                alert('Usuário cadastrado com sucesso!!!');
                window.location.href='home.php';
            </script>";
        }else {
            echo "<script> 
                alert('Usuário não cadastrado tente mais tarde!!!');
                window.location.href='home.php';
            </script>";
        }

    }

    if(isset($_POST['alt'])) {
        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $tel    = $_POST['telefone'];
        $senha  = md5($_POST['senha']);
        $id_alt = $_POST['id'];

        $request = $conexao->prepare("UPDATE user SET nome='$nome', email='$email', telefone='$tel', senha= '$senha' WHERE id = '$id_alt'");
        $receive = $request->execute();

        if($receive) {
            echo "<script> 
                alert('Usuário alterado com sucesso!!!');
                window.location.href='home.php';
            </script>";
        }else {
            echo "<script> 
                alert('Usuário não alterado tente mais tarde!!!');
                window.location.href='home.php';
            </script>";
        }    
    }

    if(isset($_GET['delete'])) {
        $id_delete = $_GET['delete'];

        $request = $conexao->prepare("DELETE FROM user WHERE id = '$id_delete'");
        $receive = $request->execute();

        if($receive) {
            echo "<script> 
                alert('Usuário deletado com sucesso!!!');
                window.location.href='home.php';
            </script>";
        }else {
            echo "<script> 
                alert('Usuário não deletado tente mais tarde!!!');
                window.location.href='home.php';
            </script>";
        }
    }

?>