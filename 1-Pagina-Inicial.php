<?php 
    include '1-Header.php'; // Inclui o cabeçalho da página

    session_start(); // Inicia a sessão

    // Verifica se o usuário está logado, se não estiver redireciona para a página de login
    if(!isset($_SESSION['nickUser'], $_SESSION['email'], $_SESSION['senha'])){
        header('Location: 0-Login.php');
        exit(); // Encerra o script após redirecionar
    }

    $logado = $_SESSION['nickUser']; // Armazena o nome do usuário logado
?>

<!DOCTYPE html>
<html lang="pt-br"> <!-- Início do HTML com linguagem português-brasileiro -->

<head>
    <meta charset="UTF-8"> <!-- Define o conjunto de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Meta tag para ajuste ao viewport -->
    <link rel="stylesheet" href="2-Style-Projeto.css"> <!-- Link para o arquivo de estilos CSS -->
    <title>Página Inicial</title>
</head>

<body class="body"> <!-- Corpo da página com classe de estilo -->
    <?php 
        echo "<h3>Bem vindo(a) $logado</h3>"; // Saudação com o nome do usuário logado
    ?>

    <div class="disciplina" id="disciplina1">
        <p><a href="2-Grecia.php">Grécia Antiga</a></p> <!-- Link para a página sobre Grécia Antiga -->
        <br>
    </div>
        
    <div class="disciplina" id="disciplina2">
        <p><a href="3-Roma.php">Roma Antiga</a></p> <!-- Link para a página sobre Roma Antiga -->
        <br>
    </div>

    <div class="disciplina" id="disciplina3">
        <p><a href="4-Primeira-Guerra.php">Primeira Guerra Mundial</a></p> <!-- Link para a página sobre Primeira Guerra Mundial -->
        <br>
    </div>

    <div class="disciplina" id="disciplina4">
        <p><a href="5-Segunda-Guerra.php">Segunda Guerra Mundial</a></p> <!-- Link para a página sobre Segunda Guerra Mundial -->
        <br>
    </div>

    <div class="disciplina" id="disciplina5">
        <p><a href="6-Guerra-Fria.php">Guerra Fria</a></p> <!-- Link para a página sobre Guerra Fria -->
        <br>
    </div>

    <div class="disciplina" id="disciplina6">
        <p><a href="7-Ditadura-Militar.php">Ditadura Militar no Brasil</a></p> <!-- Link para a página sobre Ditadura Militar no Brasil -->
        <br>
    </div>

    <h2>O que é o ENEM?</h2> <!-- Título sobre o ENEM -->
    <br>
    <div id="infoEnem"> <!-- Divisão com informações sobre o ENEM -->
        <p>O Exame Nacional do Ensino Médio (ENEM) é uma prova aplicada anualmente no Brasil pelo Instituto Nacional de Estudos e Pesquisas Educacionais Anísio Teixeira (INEP), vinculado ao Ministério da Educação (MEC). Ele foi criado em 1998 com o objetivo de avaliar a qualidade do ensino médio no país. Com o passar dos anos, o ENEM ganhou outras funções, como servir de acesso para o ensino superior em diversas universidades públicas e privadas, além de ser utilizado como critério para programas de financiamento estudantil, como o Fundo de Financiamento Estudantil (FIES) e o Programa Universidade para Todos (ProUni).</p>

        <p>A prova do ENEM é composta por quatro áreas de conhecimento: Linguagens, Códigos e suas Tecnologias; Ciências Humanas e suas Tecnologias; Ciências da Natureza e suas Tecnologias; e Matemática e suas Tecnologias. Além dessas áreas, há também uma redação.</p>

        <p>O ENEM é reconhecido pela sua amplitude, já que, além de avaliar o conhecimento adquirido durante o ensino médio, também busca medir habilidades como interpretação de texto, raciocínio lógico e capacidade de argumentação. Seu formato de aplicação é geralmente em dois dias consecutivos, sendo cada dia composto por uma parte das áreas de conhecimento e a redação.</p>
    </div>

    <?php 
        include '1-Rodape.php'; // Inclui o rodapé da página
    ?>

</body>
</html>
