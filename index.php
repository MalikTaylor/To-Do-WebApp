<?php
    include_once("index.html"); 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="https://kit.fontawesome.com/07fb3b026d.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="/task.js"></script>
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <title>To-Do List</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" id="task-container">
                    <div class="d-flex align-items-center" id="header">
                        <h1>To Do List</h1>
                    </div>

                    <div class="" id="new-todo-bar">
                        <div class="col-md-12 btn-group">
                            <input class="col-md-11" id="new-todo-field" name="new-todo" type="text" placeholder="Add new task">
                            <button class="btn col-md-1" id="todo-add-btn"><i class="fa-solid fa-plus"></i></button>
                            
                        </div>
                    </div>

                    <div class="container" id="todo-list">
                        <ul id="todo-ul" style="list-style: none; padding: 0;"></ul>
                        <script>
                            $(document).ready(function(){
                                $.ajax({
                                    type: "GET",
                                    url: "fetch_tasks.php",
                                    data: "html",
                                    success: function (message) {
                                        console.log("success");
                                        console.log(message);
                                        $('#todo-ul').html(message);
                                    }
                                })
                            })
                        </script>
                    </div>
                </div>
            
            </div>
        </div>
    </body>
</html>