<?php
    require_once("./mysqli_connect.php");
    
    if(isset($_POST["user_id"], $_POST["taskName"], $_POST["done"], $_POST["date"])){
        $userID = $_POST["user_id"];
        $name = $_POST["taskName"];
        $isDone = (int)$_POST["done"];
        $date = $_POST["date"];
    
        $addTaskQuery = "INSERT INTO task (task_name, is_done, create_date) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $addTaskQuery);
        mysqli_stmt_bind_param($stmt, "sis", $name, $isDone, $date); //s: string, i:integer
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt); //Find if any rows were affected, if not return error msg
        mysqli_stmt_close($stmt);

        if($affected_rows == 0){
            echo "Could not issue database quer: " . mysqli_error();
        }

        $getAutoInc = "SHOW TABLE STATUS LIKE 'task'"; //GET AUTOINCREMENT
        $statusData = @mysqli_query($dbc, $getAutoInc);
        $incrementVal = $statusData->fetch_assoc(); 
        
        $taskID = intval($incrementVal["Auto_increment"]) - 10; //Last Auto_Increment value is last task's ID

        echo $incrementVal["Auto_increment"] . "-> " . $taskID;

        $addUserTaskQuery = "INSERT INTO usertask VALUES(?, ?)"; //userID, taskID
        $stmt = mysqli_prepare($dbc, $addUserTaskQuery);
        mysqli_stmt_bind_param($stmt, "ii", $userID, $taskID);
        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt); //Find if any rows were affected, if not return error msg
        mysqli_stmt_close($stmt);

        if($affected_rows == 0){
            echo "0 rows affected: " . mysqli_error();
        }
    }

    mysqli_close($dbc);
?>