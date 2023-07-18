<?php
// session_start();
require_once('TarefaModel.php'); 

class TarefaController {
    private $model;
    
    public function __construct($model) {
        $this->model = $model;
    }
    
    public function addTask($task) {
        $this->model->addTask($task);
        header('Location:/');
    }
    
    public function deleteTask($index) {
        $this->model->deleteTask($index);
        header('Location:/');
    }
    
    public function getTasks() {
        return $this->model->getTasks();
    }
}
