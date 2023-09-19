<?php 

    include_once 'banco.php';

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
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        body {
            background-image: url('fundo.jpg');
        }

        #container {
            padding: 4em;
            display: flex;
            gap: 3em;
        }

        #container form {
            width: 500px;
            display: grid;
            gap: 1em;
        }

        #container form input,
        #container form button {
            padding: .8em;
            font-size: 1em;
        }

        #container form input {
            width: 100%;
        }

        table {
            width: 100%;
            border: solid 2px white;
            padding: 0;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: .4em;
            border: solid 1px white;
        }

    </style>
</head>
<body>
    <div id="container">
        <form action="cadUser2.php" method="POST">
            <h2>FORMULÁRIO DE CADASTRO DE USUÁRIOS</h2>
            <div class="form_content">
                <input type="text" name="nome" placeholder="Inserir nome">
            </div>

            <div class="form_content">
                <input type="email" name="email" placeholder="Inserir email">
            </div>

            <div class="form_content">
                <input type="text" name="telefone" placeholder="Inserir telefone">
            </div>

            <div class="form_content">
                <input type="password" name="senha" placeholder="Inserir senha">
            </div>

            <button type="submit" style="cursor: pointer;" name="cadastre">Enviar</button>
        </form>

        <div id="outraDiv">
            <h2 style="padding-bottom: .8em;">AREA DE USUÁRIOS</h2>
            <table>
                <thead>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>TELEFONE</th>
                    <th>SENHA</th>
                    <th>OPÇÕES</th>
                </thead>
                <?php 
                    $reg = $conexao->prepare("SELECT *FROM user");
                    $reg->execute();
                    $count = $reg->rowCount();
                    
                    foreach($reg->fetchAll() as $result) {    
                ?>
                
                <tbody>
                    <?php if($count == 0) {
                        echo "<p>Sem dados vindo do banco de dados...</p>";
                        }

                    ?>
                    <td><?php echo $result['nome'] ?></td>
                    <td><?php echo $result['email'] ?></td>
                    <td><?php echo $result['telefone'] ?></td>
                    <td><?php echo $result['senha'] ?></td>
                    <td><a style="color: white;list-style: none;" href="homeAlt.php?alterar=<?php echo $result['id'] ?>">Alterar</a>
                    <a style="color: red;list-style: none;" href="cadUser2.php?delete=<?php echo $result['id'] ?>">Deletar</a></td>
                </tbody>

                <?php }?>
            </table>
        </div>
    </div>
</body>
</html>