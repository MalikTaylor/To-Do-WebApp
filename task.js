userID = 0;
userName = "Malik622";
userFirst = "Malik";
userLast = "Taylor";
userPass = "1234";


window.onload = function(){

    const task_ul = document.querySelector("#todo-ul");  // <-ul element id name
    myTodoList = new Todo_Class(task_ul); //Create task list object
    
    myTodoList.display(); //retrieve and display users tasks from DB

    // if(localStorage.length != 0){
    //     let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
    //     myTodoList.display();
    // }
    
    const addBtn = document.querySelector("#todo-add-btn"); 

    if(addBtn){
        addBtn.addEventListener("click", function () {
            myTodoList.add();
            console.log("Added new task");
        })
    }

    // localStorage.clear();
}

class Todo_Class{
	// constructor(item){
	// 	this.ulElement = item;
	// }

	add(){
        var taskInput = document.querySelector("#new-todo-field").value; // <- input field nm
        var isDone = 0; // 0: false
        var dateCreated = new Date().toLocaleDateString("en-CA"); //Suffers problems with timezone as this is based on UTC

        $.ajax({
            url: "addtask.php",
            type: "POST", 
            data: {user_id: userID, taskName: taskInput, done: isDone, date: dateCreated},
            success: function(response){
                document.querySelector("#new-todo-field").value = ''; //reset input field to be blank
                myTodoList.display(); //refresh tasklist to show newly added task
            }
        });

        
        // const todo_task_object = {
        //     id : todo_task_list.length,
        //     taskName : taskInput,
        //     isDone : false,
        // }

        // todo_task_list.unshift(todo_task_object);
        // if(localStorage.length == 0 && taskInput != ""){
        //     localStorage.setItem("my_tasks", JSON.stringify([...JSON.parse(localStorage.getItem("my_tasks") || "[]"), {taskName: taskInput, isDone: false}])); 
        //     let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
        // }
        
        // else if(localStorage.length > 0){
        //     let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
        //     tasks.forEach(listObject =>{
        //         console.log( JSON.stringify([...JSON.parse(localStorage.getItem("my_tasks") || "[]")]));
        //         if(listObject.taskName == taskInput){
        //             alert("Already Exists");
        //             taskInput = "";
        //             return;
        //         }
        //     });

        //     if(taskInput == ""){ //get around this by making it "required" to submit w/ out an entry
        //         console.log("Please enter a task.")
        //     }else{
        //         localStorage.setItem("my_tasks", JSON.stringify([...JSON.parse(localStorage.getItem("my_tasks") || "[]"), {taskName: taskInput, isDone: false}])); 
        //     }	
        // }

        // this.display();
        // document.querySelector("#new-todo-field").value = "";
	}

	done_undone(id, taskElement){
        var is_done = 0;
        if($('.checkbox[data-id="'+ id +'"]').is(':checked')){
            console.log("Task: " + id + " - Completed");
            is_done = 1;
            // console.log(this.task_name);
        }else{
            console.log("Task: " + id + " - Changed to not completed");
        }

        $.ajax({
            url: "done_undone.php",
            type:  "POST",
            data: {isDone: is_done, taskID: id},
            success: function(response){
                if(is_done == 1){
                    taskElement.parentElement.removeChild(taskElement);
                }
                
                console.log("done");
            }
        });
	}

	deleteElement(id, taskElement){
        console.log("You chose to delete " + id);

        $.ajax({
            url: "removetask.php",
            type: "POST",
            data: {taskID: id},
            success: function(response){
                taskElement.parentElement.removeChild(taskElement);
            }
        })
	}

    display(){
        var taskList = document.getElementById("todo-ul");
        taskList.innerHTML = '';

        // const checkbox = document.querySelector("#checkbox");
        const editBtn = document.querySelector("#edit-btn");
        const removeBtn = document.querySelector("#remove-btn");
        
        $.ajax({
            url: "loadtasks.php",
            type: "GET",
            data: "json",
            success: function(response){
                console.log(response);
                let tasks = Array.from(JSON.parse(response));
                // $("#todo-ul").html(response);
                tasks.forEach((listObject) => { //Iterate throught the To list to display all tasks
                    // console.log(listObject.task_name);

                    const taskListElement = document.createElement("li");
                    taskListElement.classList.add("row-xs-12", "todo-item", "d-flex", "align-items-center");

                    //Check Box
                    const rndCheckContainer = document.createElement("div");
                    rndCheckContainer.classList.add("round", "col-2", "col-sm-1");
                    const checkbox = document.createElement("input");
                    checkbox.classList.add("checkbox"); //"col-md-1", "col-sm-1"
                    checkbox.setAttribute("type", "checkbox");
                    checkbox.setAttribute("data-id", listObject.task_id);
                    checkbox.setAttribute("id", "checkbox" + listObject.task_id);
                    var newlabel = document.createElement("Label");
                    newlabel.setAttribute("for", "checkbox" + listObject.task_id);
                    rndCheckContainer.appendChild(checkbox);
                    rndCheckContainer.appendChild(newlabel);
                    taskListElement.appendChild(rndCheckContainer);

                    //Task Name
                    const name = document.createElement("h5")
                    name.classList.add("col-xs-6", "col-7", "col-md-8", "task-name"); //"col-lg-8", "col-md-8", "col-sm-4""
                    name.innerText = listObject.task_name;
                    taskListElement.setAttribute("required", '');
                    // name.setAttribute("contenteditable", false);
                    taskListElement.setAttribute("data-id", listObject.task_id);
                    taskListElement.appendChild(name);

                    //Buttons
                    const editBtn = document.createElement("button");
                    editBtn.classList.add("btn","edit-btn");
                    editBtn.innerText = "Edit";

                    const removeBtn = document.createElement("button");
                    removeBtn.classList.add("btn" ,"remove-btn");
                    removeBtn.setAttribute("data-id", listObject.task_id);
                    removeBtn.classList.add("far", "fa-trash-alt"); 

                    const mobileBtn = document.createElement("button");
                    mobileBtn.classList.add("btn","mbl-task-btn");
                    mobileBtn.setAttribute("data-id", listObject.task_id);
                    mobileBtn.innerHTML = '<i class="fa-solid fa-ellipsis"></i>';
                    // mobileBtn.classList.add("far", "fa-ellipsis"); 

                    const btnGroup1 = document.createElement("div")
                    btnGroup1.classList.add("btn-group", "col-xs-3", "col", "task-btns");
                    btnGroup1.appendChild(editBtn);
                    btnGroup1.appendChild(removeBtn);
                    taskListElement.appendChild(btnGroup1);

                    const btnGroup2 = document.createElement("div")
                    btnGroup2.classList.add("btn-group");
                    btnGroup2.appendChild(mobileBtn);
                    taskListElement.appendChild(btnGroup2);
                    

                    checkbox.addEventListener("click", function(element){
                        const selectId = element.target.parentNode.parentNode.getAttribute("data-id");
                        var listItem = this.parentElement.parentElement; //Find the task element
                        myTodoList.done_undone(selectId, listItem); //Send task element to be moved to completed tbl 
                    })
     
                    removeBtn.addEventListener("click", function(element){
                        const deleteId = element.target.parentNode.parentNode.getAttribute("data-id");
                        var listItem = this.parentElement.parentElement; //Find the task element
                        myTodoList.deleteElement(deleteId, listItem); //Send task elememt to be deleted
                        
                    })

                    if(listObject.is_done == 1){
                        checkbox.checked = true;
                    }
                    
                    taskList.appendChild(taskListElement);
                })
            }
        });

        

    
    
        // if(editBtn){
        //     editBtn.addEventListener("click", function(){
        //         console.log("edit btn clicked");
        //     })
        // }
    
        // if(removeBtn){
        //     console.log("remove btn clicked");
        // }
  

    }

	// display(){
    //     this.ulElement.innerHTML = "";
    //     let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
    //     // const storage_name = todo_task_list;
        
    //     //Iterate throught the To list to display all tasks
    //     tasks.forEach((listObject) =>{
    //         const taskListElement = document.createElement("li");
    //         taskListElement.classList.add("row", "todo-item", "d-flex", "align-items-center");

    //         //Check Box
    //         const checkbox = document.createElement("input");
    //         checkbox.classList.add("col-md-1");
    //         checkbox.setAttribute("type", "checkbox");
    //         taskListElement.appendChild(checkbox);

    //         //Task Name
    //         const name = document.createElement("h5")
    //         name.classList.add("col-md-8", "task-name");
    //         name.innerText = listObject.taskName;
    //         taskListElement.setAttribute("data-id", listObject.id);
    //         taskListElement.appendChild(name);

    //         //Buttons
    //         const editBtn = document.createElement("button");
    //         editBtn.classList.add("btn","edit-btn");
    //         editBtn.innerText = "Edit";

    //         const removeBtn = document.createElement("button");
    //         removeBtn.classList.add("btn" ,"remove-btn");
    //         removeBtn.setAttribute("data-id", listObject.id);
    //         removeBtn.classList.add("far", "fa-trash-alt"); // Add trash Icon

    //         const btnGroup = document.createElement("div")
    //         btnGroup.classList.add("col-md-3", "btn-group", "task-btns");
    //         btnGroup.appendChild(editBtn);
    //         btnGroup.appendChild(removeBtn);
    //         taskListElement.appendChild(btnGroup);
           
    //         removeBtn.addEventListener("click", function(element){
    //             const deleteId = element.target.getAttribute("data-id");
    //             myTodoList.deleteElement(deleteId);
    //         })

    //         checkbox.addEventListener("click", function(element){
    //             const selectId = element.target.getAttribute("data-id");
    //             myTodoList.done_undone(selectId);
    //         })

    //         if(listObject.isDone){
    //             taskListElement.classList.add("checked")
    //         }
            
    //         this.ulElement.appendChild(taskListElement)
    //     })
	// }
}







