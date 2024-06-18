<?php 
session_start(); // Inicia a sessão

// Verifica se as variáveis de sessão estão setadas
if(isset($_SESSION['nickUser'], $_SESSION['email'], $_SESSION['senha'])) {
    // Apaga as variáveis de sessão
    unset($_SESSION['nickUser']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}

// Redireciona para a página de login
header('Location: 0-Login.php');
exit(); // Encerra o script após o redirecionamento
?>
