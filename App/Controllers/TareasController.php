<?php
namespace App\Controllers;
use Database\PDO\DatabaseConnection;

class TareasController{

public function create($data){
    $server= "127.0.0.1";
    $username= "root";
    $password = "";
    $database= "todo_list";

    $db= new DatabaseConnection($server, $username, $password, $database);

    $db-> connect();

    $query= "INSERT INTO tareas(tarea, descripcion, fechaCreacion)
                VALUES (?,?,?)";

    $results= $db-> executeQuery($query, [$data["tarea"],
                                        $data["descripcion"],
                                        $data["fechaCreacion"]
                                         ]);
    print_r($results);

    if (!empty($results)){
        echo "Se realizó correctamente.";
    }else{
        echo "Error al crear la tarea.";
    };
}

public function getAllTasks() {

    $server = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "todo_list";

    $db = new DatabaseConnection($server, $username, $password, $database);
    $db->connect();

    $query = "SELECT * FROM tareas";
    $results = $db->executeQuery($query);

    return $results;
}
}

?>
