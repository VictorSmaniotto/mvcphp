<!DOCTYPE html>
<html>

<head>
    <title>Minha Lista de Tarefas</title>
</head>

<body>
    <h1>Minha Lista de Tarefas</h1>

    <form action="index.php" method="post">
        <label for="task">Nova Tarefa:</label>
        <input type="text" name="tarefa" id="tarefa">
        <input type="submit" value="Adicionar">
    </form>

    <?php

    require_once('tarefaController.php');
    require_once('TarefaModel.php');

    $model = new TarefaModel();
    $controller = new TarefaController($model);

    if (isset($_POST['tarefa'])) {
        $controller->addTask($_POST['tarefa']);
    }
    
    if (isset($_GET['excluir'])) {
        $controller->deleteTask($_GET['excluir']);
    }
    $tarefas = $controller->getTasks();

    ?>

    <ul>
        <?php foreach ($tarefas as $indice => $tarefa) : ?>
            <li><?php echo $tarefa; ?> <a href="index.php?excluir=<?php echo $indice; ?>">[x]</a></li>
        <?php endforeach; ?>
    </ul>


</body>

</html>



