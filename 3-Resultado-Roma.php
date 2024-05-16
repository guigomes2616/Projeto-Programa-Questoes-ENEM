<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabarito</title>
</head>

<body>
    <?php
        include '1-Header.php';

        $gabarito = array(
            'quest1' => array('q2_1','5'),
            'quest2' => array('q2_2','2'),
            'quest3' => array('q2_3','5'),
            'quest3' => array('q2_4','4'),
            'quest3' => array('q2_5','3')
        );

        if($_SERVER["RESQUEST_METHOOD"]=="POST" && !empty($POST)){
            $respostas_corretas=0;
            $respostas_incorretas=0;

            $respostas_acertadas = array();
            $respostas_erradas = array();

            foreach($_POST  as $questao => $respostas){
                if(isset($gabarito[$questao])){
                    if($respostas == $gabarito[$questao][0]){
                        $respostas_corretas++;
                        $perguntas_acertadas[] = $gabarito[$questao][1];
                    }else{
                        $respostas_incorretas++;
                        $respostas_erradas[] = $gabarito[$questao][1];
                    }
                }
            }
            echo "<h2>Você acertou $respostas_corretas de 5 perguntas e errou $respostas_incorretas.</h2>";
    ?>

<div class="divGabarito" id="divAcertos">
            <?php
                echo "<h3>Perguntas acertadas:</h3>";
                foreach ($perguntas_acertadas as $pergunta) {
                    echo "<p>Pergunta $pergunta</p>";
                }
            ?>
        </div>
        
        <div class="divGabarito" id="divErros">
            <?php 
                echo "<h3>Perguntas erradas:</h3>";
                foreach ($perguntas_erradas as $pergunta) {
                    echo "<p>Pergunta $pergunta</p>";
                }
            ?>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" id="botaoVoltar"><a href="2-Grecia.php">Voltar</a></button>
  </div>

<?php
    }   
    include '1-Rodape.php';
?>

</body>
</html>