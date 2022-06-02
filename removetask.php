<?php
    require_once("./mysqli_connect.php");

    if(isset($_POST["taskID"])){
        $taskID = (int)$_POST["taskID"];
        $removeQuery = "DELETE FROM task WHERE task_id = " . $taskID;
        $stmt = mysqli_prepare($dbc, $removeQuery);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($dbc)

?>