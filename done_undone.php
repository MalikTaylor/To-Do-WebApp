<?php
    require_once("./mysqli_connect.php");

    if(isset($_POST["isDone"], $_POST["taskID"])){
        $isDone = (int)htmlspecialchars($_POST["isDone"]);
        $taskID = (int)htmlspecialchars($_POST["taskID"]);
        
        $taskDoneQuery = "UPDATE task SET is_done = " . $isDone . " WHERE task_id = " . $taskID;
        
        $moveToCompletQuery = "INSERT INTO completed SELECT user.user_id, task.task_id, task.task_name, task.create_date 
        FROM usertask 
        INNER JOIN user ON user.user_id = usertask.fk_user_id 
        INNER JOIN task ON task.task_id = usertask.fk_task_id 
        WHERE task.task_id = " . $taskID;
        
        $stmt = mysqli_prepare($dbc, $taskDoneQuery);
        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt); //Find if any rows were affected, if not return error msg
        
        if($affected_rows == 0){
            echo "Could not issue database quer: " . mysqli_error();
        }
        
        mysqli_stmt_close($stmt);

        $stmt2 = mysqli_prepare($dbc, $moveToCompletQuery);
        mysqli_stmt_execute($stmt2);

        $affected_rows = mysqli_stmt_affected_rows($stmt2); //Find if any rows were affected, if not return error msg
        
        if($affected_rows == 0){
            echo "Could not issue database quer: " . mysqli_error();
        }

        mysqli_close($stmt2);
    }

    mysqli_close($dbc);
?>