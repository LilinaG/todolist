<?php
use App\Controllers\TareasController;
require __DIR__ . '/../vendor/autoload.php';

// print_r($_POST);
// print_r($_SERVER);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $new_task = new TareasController;
  $new_task-> create([
                "tarea"=>$_POST["tarea"],
                "descripcion"=>$_POST["descripcion"],
                "fechaCreacion"=>$_POST["fechaCreacion"]
                
                
                ]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Después de agregar una nueva tarea, obtener todas las tareas
    $all_tasks = $new_task->getAllTasks();

    // Iterar sobre las tareas y mostrarlas en una tabla
    if (!empty($all_tasks)) {
        echo '<table>';
        echo '<thead><tr><th>ID</th><th>Tarea</th><th>Descripción</th><th>Fecha de Creación</th></tr></thead>';
        echo '<tbody>';
        foreach ($all_tasks as $task) {
            echo '<tr>';
            echo '<td>' . $task['id'] . '</td>';
            echo '<td>' . $task['tarea'] . '</td>';
            echo '<td>' . $task['descripcion'] . '</td>';
            echo '<td>' . $task['fechaCreacion'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}

?>
