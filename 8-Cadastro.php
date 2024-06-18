<?php
    // Verifica se o formulário foi submetido
    if (isset($_POST['submitCad'])) {

        // Inclui o arquivo de configuração para conectar ao banco de dados
        include_once ('9-Config.php');

        // Obtém os dados fornecidos pelo usuário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $dataNascimento = $_POST['dataNascimento'];
        $nomeUsuario = $_POST['nomeUsuario'];
        $senha = $_POST['senha'];

        // Verifica se o usuário já existe no banco de dados
        $check_query = mysqli_query($conexao, "SELECT * FROM usuario WHERE email='$email' OR nick_usuario='$nomeUsuario'");
        $count = mysqli_num_rows($check_query); // Conta o número de linhas retornadas pela consulta

        if ($count > 0) {
            // Se o usuário já existe, exibe mensagem de erro com JavaScript
            echo "<script>
                    alert('Este email ou nome de usuário já está cadastrado. Por favor, escolha outros.');
                    document.getElementById('nome').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('dataNascimento').value = '';
                    document.getElementById('nomeUsuario').value = '';
                    document.getElementById('senhacriada').value = '';
                  </script>";
        } else {
            // Se o usuário não existe, insere no banco de dados
            $result = mysqli_query($conexao, "INSERT INTO usuario(nome, email, data_nascimento, nick_usuario, senha) VALUES ('$nome', '$email', '$dataNascimento', '$nomeUsuario', '$senha')");

            if ($result) {
                // Se o cadastro for bem-sucedido, exibe mensagem de sucesso com JavaScript
                echo "<script>alert('Cadastro realizado com sucesso!')</script>";
            } else {
                // Se houver um erro ao cadastrar, exibe mensagem de erro com JavaScript
                echo "<script>alert('Ocorreu um erro ao cadastrar. Por favor, tente novamente.')</script>";
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="2-Style-Projeto.css">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bodyLogin">

    <h1 id="tituloCadastro">Cadastro</h1>

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="mt-3">
                    <form action="8-Cadastro.php" method="POST">

                        <div class="mb-3">
                            <label for="nome" class="nome">Nome completo: </label>
                            <input type="text" name="nome" class="form-control" id="nome" aria-describedby="" placeholder="Digite o seu nome completo" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="email">Email: </label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Digite o seu email" required>
                        </div>

                        <div class="mb-3">
                            <label for="dataNascimento" class="dataNascimento">Data de Nascimento: </label>
                            <input type="date" name="dataNascimento" class="form-control" id="dataNascimento" required>
                        </div>

                        <div class="mb-3">
                            <label for="nomeUsuario" class="nomeUsuario">Usuário: </label>
                            <input type="text" name="nomeUsuario" class="form-control" id="nomeUsuario" placeholder="Digite como quer ser chamado" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="senha">Criar senha: </label>
                            <input type="password" name="senha" class="form-control" id="senhacriada" placeholder="Crie uma senha" required>
                        </div>

                        <div class="text-center" id="divbotaoCad">
                            <button type="submit" name="submitCad" class="btn btn-primary mt-3" id="botaoCadastrar">Cadastrar</button>
                            <button type="submit" name="submitVolt" class="btn btn-primary mt-3" id="botaoVoltarCad">
                                <a href="0-Login.php" style="text-decoration: none; color: white;">Voltar</a>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <?php 
        include '1-Rodape.php';
    ?>
</body>
</html>
