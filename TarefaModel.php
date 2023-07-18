<?php


// class TarefaModel
// {
//     private $tasks;

//     public function __construct()
//     {
//         $this->tasks = $this->getTasks();
//     }

//     public function addTask($task)
//     {
//         array_push($this->tasks, $task);
//         $this->setSession($this->tasks);
//     }

//     public function deleteTask($index)
//     {
//         unset($this->tasks[$index]);
//         $this->setSession($this->tasks);
//     }

//     public function getTasks()
//     {
//         return $this->getSession();
//     }

//     private function setSession($tasks)
//     {
//         setcookie('tasks', serialize($tasks), time() + (86400 * 30));
//     }

//     private function getSession()
//     {
//         if (isset($_COOKIE['tasks']))
//             return  unserialize($_COOKIE['tasks']);

//         return [];
//     }
// }







class TarefaModel {
    private $tasks; 

    public function __construct() {
        $this->tasks = $this->getTasksFromCookies();
    }

    public function addTask($task) {
        array_push($this->tasks, $task);
        $this->setTasksToCookies($this->tasks);
    }

    public function deleteTask($index) {
        unset($this->tasks[$index]);
        $this->setTasksToCookies($this->tasks);
    }

    public function getTasks() {
        return $this->getTasksFromCookies();
    }

    private function setTasksToCookies($tasks) {
        setcookie('tasks', json_encode($tasks), time() + (86400 * 30), '/');
    }
    
    private function getTasksFromCookies() {
        if(isset($_COOKIE['tasks'])) {
            return json_decode($_COOKIE['tasks'], true);
        }
        return [];
    }
}

