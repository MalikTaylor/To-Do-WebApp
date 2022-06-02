<?php
    require_once("./mysqli_connect.php");
    
    // $return_mytasks = "SELECT user.user_name, user.user_id, task.task_name, task.task_id 
    // FROM usertask 
    // INNER JOIN user ON user.user_id = usertask.fk_user_id 
    // INNER JOIN task ON task.task_id = usertask.fk_task_id;";

    // $response = @mysqli_query($dbc, $return_mytasks);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/07fb3b026d.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./task.js"></script>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <title>To-Do List</title>
    </head>
    <body>
        <nav class="navbar navbar-dark d-flex align-content-center">
            
            <div class="btn-group">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <i class="fa-solid fa-bars nav-icon"></i>
                </button>

                
                <a class="nav-link" href="#"> 
                    <i class="fa-solid fa-house nav-icon"></i>
                </a>
            </div>
           
            <div class="navbar-collapse collapse text-left" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown-item active">
                        <a>
                            <i class="fa-solid fa-inbox nav-icon"></i>
                            All Tasks
                        </a>
                    </li>
                    <li class="nav-item dropdown-item">
                        <a>
                            <i class="fa-solid fa-briefcase nav-icon"></i>
                            Work
                        </a>
                    </li>
                    <li class="nav-item dropdown-item">
                        <a>
                            <i class="fa-solid fa-house-chimney-window nav-icon"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown-item">
                        <a>
                            <i class="fa-solid fa-book nav-icon"></i>
                            Study
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="drpdown" class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i id="dropdown-arrow" class="fa-solid fa-angle-right"></i>
                            <text style="margin-left: 8%;">Projects</text>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        </div>
                    </li>
                </ul>
            </div>
            
            <a id="profile-icon" class="navbar-brand" href="#"> 
                <i class="fa-solid fa-circle"></i>
            </a>
        </nav>

        <main>
            <div class="row d-flex justify-content-center">
                <div id="header" class="row d-flex align-items-center">
                    <h3 style="padding-left: 20px;">All Tasks</h3>
                    <div class="row">
                        <hr class="header-line">
                    </div>
                </div>

                <div class="row d-flex justify-content-center"> 
                       
                    <!-- <div class="" id="new-todo-bar">
                        <div class="col-md-12 btn-group">
                            <input class="col-md-11 col-sm-11" id="new-todo-field" name="new-todo" type="text" placeholder="Add new task">
                            <button class="btn col-md-1" id="todo-add-btn">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div> -->

        
                    <div class="col-md-6" id="task-container">
                        <div class="container" id="todo-list">
                            <ul id="todo-ul" style="list-style: none; padding: 0;"></ul>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div id="gradient"></div>
                </div>
                
            </div>

           
            
            <!--Mobile style add btn -->
            <div id="new-task-btn" class="">
                <button class="btn d-flex justify-content-center align-items-center" id="todo-add-btn">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>

        </main>

        <script>
            (function(document){
            var div = document.getElementById('drpdown');
            var icon = document.getElementById('dropdown-arrow');
            var open = false;

            div.addEventListener('click', function(){
                if(open){
                // icon.className = 'fa-solid fa-angle-right';  
                icon.classList.value = "fa-solid fa-angle-right close";
                } else{
                icon.classList.add('open');
                }

                open = !open;
            });
            })(document);
        </script>
    </body>
</html>