<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="2-Style-Projeto.css"> <!-- Link para o arquivo de estilos CSS -->
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Link para o framework Bootstrap -->
</head>

<body class="bodyLogin">

    <h1 id="tituloLogin">Questões de História do ENEM</h1> <!-- Título da página -->

    <div class="container">
        <div class="row">
            <div class="col"></div> <!-- Espaço vazio à esquerda -->
            <div class="col">
                <div class="mt-3"> <!-- Divisão para margin-top -->
                    <?php
                    session_start(); // Inicia a sessão

                    // Verifica se existe mensagem de erro na sessão
                    if (isset($_SESSION['login_erro'])) {
                        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['login_erro'] . "</div>"; // Exibe a mensagem de erro
                        unset($_SESSION['login_erro']);  // Limpa a mensagem de erro após exibi-la
                    }
                    ?>

                    <form action="10-TesteLogin.php" method="post"> <!-- Início do formulário -->
                        <div class="mb-3">
                            <label for="nickUsuario" class="form-label">Usuário</label> <!-- Label para o campo de nome de usuário -->
                            <input type="text" name="nickUsuario" class="form-control" id="nickUsuario" placeholder="Digite o seu nome de usuário" required> <!-- Campo de texto -->
                        </div>

                        <div class="mb-3">
                            <label for="usuario" class="form-label">Email</label> <!-- Label para o campo de email -->
                            <input type="text" name="emailLogin" class="form-control" id="emailLogin" aria-describedby="" placeholder="Digite o seu email" required> <!-- Campo de texto -->
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label> <!-- Label para o campo de senha -->
                            <input type="password" name="senhaLogin" class="form-control" id="senha" placeholder="Digite a sua senha" required> <!-- Campo de senha -->
                        </div>

                        <div class="divduvida">
                            <p>Não é cadastrado? Aperte em Cadastrar</p> <!-- Texto para instrução -->
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary mt-3" id="botaoCadastro"> <!-- Botão para redirecionar para a página de cadastro -->
                                <a href="8-Cadastro.php" style="color: white; text-decoration: none;">Cadastrar</a>
                            </button>

                            <button name="submit" type="submit" class="btn btn-primary mt-3" id="botaoLogin">Entrar</button> <!-- Botão de login -->
                        </div>

                    </form> <!-- Fim do formulário -->
                </div>
            </div>
            <div class="col"></div> <!-- Espaço vazio à direita -->
        </div>
    </div>    

    <?php 
        include '1-Rodape.php'; // Inclui o rodapé do site
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() { // Evento disparado quando o DOM estiver totalmente carregado
            const alert = document.getElementById('loginErrorAlert');
            if (alert) {
                setTimeout(() => { // Espera 5 segundos e depois começa a ocultar
                    alert.style.opacity = '0';
                    setTimeout(() => {
                        alert.remove(); // Remove o alerta após a transição de ocultamento
                    }, 500); // Espera o fim da transição para remover o elemento
                }, 5000); // 5000 milissegundos = 5 segundos
            }
        });
    </script>

</body>
</html>
