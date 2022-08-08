<?php
    require_once("./mysqli_connect.php");

    $loadTasksQuery = "SELECT task.task_id, task.task_name, task.is_done FROM usertask INNER JOIN task ON usertask.fk_task_id = task.task_id";

    $response = @mysqli_query($dbc, $loadTasksQuery);

    $taskObjects = array();

    if($response){
        while($row = mysqli_fetch_array($response)){
            $taskObjects[] = $row;
        }
    }else{
        echo "Could not issue databse query: " . mysqli_error($dbc);
    }

    echo json_encode($taskObjects);

    mysqli_close($dbc);

?>

