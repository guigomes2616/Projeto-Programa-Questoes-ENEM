<?php 
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['nickUsuario']) && !empty($_POST['emailLogin']) && !empty($_POST['senhaLogin'])){
        include_once ('9-Config.php');

        $email = $_POST['emailLogin'];
        $senha = $_POST['senhaLogin'];
        $nickUser = $_POST['nickUsuario'];

        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha' and nick_usuario = '$nickUser'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) <1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['nickUser']);

            header('Location: 0-Login.php');

        }else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nickUser'] = $nickUser;
            
            header('Location: 1-Pagina-Inicial.php');

        }

    }else{
        header('Location: 0-Login.php');
    }

?>