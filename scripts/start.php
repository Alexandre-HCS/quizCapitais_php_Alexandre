<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $total_questions = intval($_POST['text_total_questions']) ?? 10;

    prepare_game($total_questions);

    header('Location: index.php?route=game');
    exit;
}

function prepare_game($total_questions){
    global $capitals;

    $ids = [];

    while(count($ids) < $total_questions){
        $id = rand(0, count($capitals) - 1);

        if(!in_array($id, $ids)){
            $ids[] = $id;
        }
    }

    $questions = [];

    foreach($ids as $id){
        $answers = [];

        $answers[] = $id;

        while(count($answers) < 3){
            $tmp = rand(0, count($capitals) - 1);
            if(!in_array($tmp, $answers)){
                $answers[] = $tmp;
            }
        }

        shuffle($answers);

        $questions[] = [
            'question' => $capitals[$id][0],
            'correct_answer' => $id,
            'answers' => $answers
        ];
    }

    $_SESSION['questions'] = $questions;

    $_SESSION['game'] = [
        'total_questions' => $total_questions,
        'current_question' => 0,
        'correct_answers' => 0,
        'incorrect_answers' => 0,
    ];
}
?>

<!-- Início do código HTML para exibir o formulário na página de início -->
<div class="container">
    <div class="row">
        <h1>Quiz das Capitais</h1>
        <hr>

        <form action="index.php?route=start" method="post">
            <h3><label for="text_total_questions" class="form-label">Número de questões:</label>
            <input type="number" class="form-control" id="text_total_questions" name="text_total_questions" value="10" min="2" max="195"></h3>
            
            <div>
                <button type="submit" class="btn">Iniciar</button>
            </div>
        </form>
    </div>
</div>