<?php 
    require_once("./mysqli_connect.php");
    include_once("index.html"); 

    // $return_mytasks = "SELECT user.user_name, user.user_id, task.task_name, task.task_id 
    // FROM usertask 
    // INNER JOIN user ON user.user_id = usertask.fk_user_id 
    // INNER JOIN task ON task.task_id = usertask.fk_task_id;";

    // $response = @mysqli_query($dbc, $return_mytasks);

    // if($response){
    //     echo '<table align="left"
    //     cellspacing="5" cellpadding="8">

    //     <tr>
    //         <td align="left"<b>User Name</b></td>
    //         <td align="left"<b>User ID</b></td>
    //         <td align="left"<b>Task</b></td>
    //         <td align="left"<b>Task ID</b></td>
    //     </tr>';

    //     while($row = mysqli_fetch_array($response)){
    //         echo '<tr><td align="left">' .
    //         $row['user_name'] . '</td><td align="left">' . 
    //         $row['user_id'] . '</td><td align="left">' .
    //         $row['task_name'] . '</td><td align="left">' .
    //         $row['task_id'] . '</td><td align="left">';
    //         echo '</tr>';
    //     }
    //     echo "</table>";

    // } else{
    //     echo "Could not issue databse query";
    //     echo mysqli_error($dbc);
    // }

    // mysqli_close($dbc);
?>
