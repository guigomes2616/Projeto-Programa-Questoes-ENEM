<?php
// Inicia a sessão para armazenar informações temporárias de usuário
session_start();

// Verifica se o formulário foi submetido e se todos os campos obrigatórios estão preenchidos
if (isset($_POST['submit']) && !empty($_POST['nickUsuario']) && !empty($_POST['emailLogin']) && !empty($_POST['senhaLogin'])) {
    
    // Inclui o arquivo de configuração para conectar ao banco de dados
    include_once ('9-Config.php');

    // Obtém os dados fornecidos pelo usuário
    $email = $_POST['emailLogin'];
    $senha = $_POST['senhaLogin'];
    $nickUser = $_POST['nickUsuario'];

    // Prepara a consulta SQL para verificar se existe um usuário correspondente
    $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha' and nick_usuario = '$nickUser'";
    
    // Executa a consulta no banco de dados e armazena o resultado
    $result = $conexao->query($sql);

    // Se não há resultados retornados pela consulta, o login falha
    if(mysqli_num_rows($result) < 1){
        
        // Limpa as variáveis da sessão
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['nickUser']);
        
        // Adiciona mensagem de erro na sessão
        $_SESSION['login_erro'] = "Usuário, email ou senha incorretos";  
        
        // Redireciona o usuário para a página de login
        header('Location: 0-Login.php');
        exit();  // Adiciona exit para encerrar o script após o redirecionamento

    } else {
        
        // Armazena os dados na sessão
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['nickUser'] = $nickUser;

        // Remove qualquer mensagem de erro armazenada
        unset($_SESSION['login_erro']);
        
        // Redireciona o usuário para a página inicial
        header('Location: 1-Pagina-Inicial.php');
        exit();  // Adiciona exit para encerrar o script após o redirecionamento
    }

} else {
    // Se algum campo obrigatório estiver vazio, armazena a mensagem de erro na sessão
    $_SESSION['login_erro'] = "Preencha todos os campos";  
    header('Location: 0-Login.php');
    exit();  // Adiciona exit para encerrar o script após o redirecionamento
}
?>
