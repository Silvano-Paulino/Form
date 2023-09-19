<?php 
    include_once 'banco.php';

    if(isset($_GET['alterar'])) {
        $id_alt = $_GET['alterar'];

        $sql = $conexao->prepare("SELECT *FROM user WHERE id= '$id_alt'");
        $sql->execute();
        
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de teste</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        body {
            background-image: url('fundo.jpg');
        }

        #container {
            display: flex;
            gap: 2em;
            padding: 4em;
        }

        #container form {
            display: grid;
            gap: 1.6em;
            width: 500px;
        }

        #container h2 {
            text-transform: uppercase;
            color: white;
        }

        #container form .form_content {
            display: grid;
            grid-template-columns: 1fr;
            gap: .5em;
        }

        #container form .form_content label {
            font-size: 1.2em;
        }

        #container form .form_content input,
        #container form .form_content button {
            padding: .8em;
            border-radius: 2px;
            border: none;
        }

        #container form .form_content button {
            font-size: 1em;
            width: 14em;
            cursor: pointer;
        }

        #mostrarUser div {
            padding-top: 1.3em;
        }

        #mostrarUser table {
            border: solid white 2px;
        }

        #mostrarUser table th {
            text-transform: uppercase;
        }

        #mostrarUser table th,
        #mostrarUser table td {
            padding: .6em;
        }

        #mostrarUser table span {
            cursor: pointer;
            padding: .4em;
        }
    </style>
</head>
<body>
    <div id="container">
        <form action="cadUser.php" method="POST">
            <h2>Area de Cadastro de Usuários</h2>
            <?php foreach($sql->fetchAll() as $reg) {

            ?>
            <div class="form_content">
                
                <input type="text" name="nome" value="<?php echo $reg['nome'] ?>" placeholder="Inserir nome">
            </div>
            <div class="form_content">
                
                <input type="email" name="email" value="<?php echo $reg['email'] ?>" placeholder="Inserir email">
            </div>
            <div class="form_content">
                
                <input type="tel" name="telefone" value="<?php echo $reg['telefone'] ?>" placeholder="Inserir telefone">
            </div>
            <div class="form_content">
                
                <input type="password" name="senha" value="<?php echo $reg['senha'] ?>" placeholder="Inserir senha">
            </div>
            <input type="hidden" name="id" value="<?php echo $id_alt ?>">
            <?php }  ?>
            <div class="form_content">
                <button type="submit" name="alterar">Alterar</button>
            </div>
        </form>

        <div id="mostrarUser">
            <h2>Area para visualizar usuários</h2>
            <div>
                <table>
                    <thead>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Senha</th>
                    </thead>
                    <?php 
                        $resultado = $conexao->prepare('SELECT *FROM user ORDER BY id DESC');
                        $resultado->execute();
                        $count = $resultado->rowCount();

                        if($count == 0) {

                            echo '<p>Sem dados...</p>';
                        
                        }else {
                            foreach($resultado->fetchAll() as $mostrar) {

                    ?>
                    <tbody>
                        <td><?php echo $mostrar['nome'] ?></td>
                        <td><?php echo $mostrar['email'] ?></td>
                        <td><?php echo $mostrar['telefone'] ?></td>
                        <td><?php echo md5($mostrar['nome'])?></td>
                    </tbody>
                            <?php } ?>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>