<?php

    $total_questions = $_SESSION['game']['total_questions'];
    $correct_answers = $_SESSION['game']['correct_answers'];
    $incorrect_answers = $_SESSION['game']['incorrect_answers'];

?>

<!-- Início do código HTML para exibir os resultados finais do jogo -->
<div class="result-container">   
   
    <h1>Quiz das Capitais</h1>
    <hr>
    
    <h3>Total de questões <strong class="result-value"><?= $total_questions ?></strong></h3>

    <h3>Respostas certas: <strong class="result-value"><?= $correct_answers ?></strong></h3>

    <h3>Respostas erradas: <strong class="result-value"><?= $incorrect_answers ?></strong></h3>

</div>

