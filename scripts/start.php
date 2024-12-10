<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $total_question = intval($_POST['text_total_question']) ?? 10;

    prepare_game($total_question);

    header('Location: index.php?route=game');
    exit;
}

function prepare_game($total_question)
{

    global $capitals;

    $ids = [];

    while (count($ids) < $total_question) {

        $id = rand(0, count($capitals) - 1);

        if (!in_array($id, $ids)) {
            $ids[] = $id;
        }
    }

    $questions = [];

    foreach ($ids as $id) {

        $answer = [];

        $answer[] = $id;

        while (count($answer) < 3) {

            $tmp = rand(0, count($capitals) - 1);

            if (!in_array($tmp, $answer)) {
                $answer[] = $tmp;
            }
        }

        shuffle($answer);

        $questions[] = [

            'question' => $capitals[$id][0],
            'correct_answer' => $id,
            'answer' => $answer

        ];
    }

    $_SESSION['game'] = [

        'total_questions' => $total_question,
        'current_question' => 0,
        'correct_answer' => 0,
        'incorrect_answer' => 0,

    ];
}

?>

<!-- Início do código HTML para exibir o formulário na página de início -->
<div class="container">

    <div class="row">

        <h1>Quiz das Capitais</h1>
        <hr>

        <form action="index.php?route=start" method="post">

            <h3><label for="text_total_questions" class="form-label">Número de questões</label>

                <input type="number" class="form-control" id="text_total_questions" name="texto_total_questions" value="10" min="2" max="300">
            </h3>

            <div>
                <button type="submit" class="btn">Iniciar</button>
            </div>

        </form>

    </div>

</div>