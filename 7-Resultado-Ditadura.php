<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="2-Style-Projeto.css">
    <title>Gabarito</title>
</head>

<body>
    <?php
        include '1-Header.php';

        $gabarito = [
            'quest1' => ['q1_1', '1'],
            'quest2' => ['q2_2', '2'],
            'quest3' => ['q3_4', '3'],
            'quest4' => ['q4_4', '4'],
            'quest5' => ['q5_2', '5']
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { 
            // Inicializar contadores para respostas corretas e incorretas
            $respostas_corretas = 0;
            $respostas_incorretas = 0;
            $perguntas_acertadas = [];
            $perguntas_erradas = [];

            // Iterar sobre as respostas submetidas pelo usuário
            foreach ($_POST as $questao => $resposta) {
                if (isset($gabarito[$questao])) { // Verificar se a questão está no gabarito
                    if ($resposta === $gabarito[$questao][0]) {
                        $respostas_corretas++;
                        $perguntas_acertadas[] = $gabarito[$questao][1]; // Armazenar número da pergunta acertada
                    } else {
                        $respostas_incorretas++;
                        $perguntas_erradas[] = $gabarito[$questao][1]; // Armazenar número da pergunta errada
                    }
                }
            }

            // Exibir o número de respostas corretas e incorretas
            echo "<h2>Você acertou $respostas_corretas e errou $respostas_incorretas.</h2>";
    ?>

            <div class="divGabarito" id="divAcertos">
                <?php
                    echo "<h3>Perguntas acertadas:</h3>";
                    if (!empty($perguntas_acertadas)) {
                        foreach ($perguntas_acertadas as $pergunta) {
                            echo "<p>Pergunta $pergunta</p>";
                        }
                    } else {
                        echo "<p>Não houve respostas corretas.</p>";
                    }
                ?>
            </div>
            
            <div class="divGabarito" id="divErros">
                <?php 
                    echo "<h3>Perguntas erradas:</h3>";
                    if (!empty($perguntas_erradas)) {
                        foreach ($perguntas_erradas as $pergunta) {
                            echo "<p>Pergunta $pergunta</p>";
                        }
                    } else {
                        echo "<p>Não houve respostas incorretas.</p>";
                    }
                ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" id="botaoVoltar">
                <a href="7-Ditadura-Militar.php">Voltar</a>
            </button>
    </div>
    
    <?php
        }
        include '1-Rodape.php';
    ?>
</body>
</html>
