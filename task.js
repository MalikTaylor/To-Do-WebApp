// const todo_task_list = [];


// window.onload = function(){

//     const task_ul = document.querySelector("#todo-ul");  // <-ul element id name

//     myTodoList = new Todo_Class(task_ul);
    
//     if(localStorage.length != 0){
//         let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
//         myTodoList.display();
//     }
    
//     const addBtn = document.querySelector("#todo-add-btn") // <- add btn id name

//     if(addBtn){
//         addBtn.addEventListener("click", function () {
//             myTodoList.add();
//             // console.log("Add Btn Clicked")
//         })
//     }
//     // localStorage.clear();
// }

// class Todo_Class{
// 	constructor(item){
// 		this.ulElement = item;
// 	}

// 	add(){
// 		var taskInput = document.querySelector("#new-todo-field").value; // <- input field nm


//         const todo_task_object = {
//             id : todo_task_list.length,
//             taskName : taskInput,
//             isDone : false,
//         }

//         todo_task_list.unshift(todo_task_object);
//         if(localStorage.length == 0 && taskInput != ""){
//             localStorage.setItem("my_tasks", JSON.stringify([...JSON.parse(localStorage.getItem("my_tasks") || "[]"), {taskName: taskInput, isDone: false}])); 
//             let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
//         }
        
//         else if(localStorage.length > 0){
//             let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
//             tasks.forEach(listObject =>{
//                 console.log( JSON.stringify([...JSON.parse(localStorage.getItem("my_tasks") || "[]")]));
//                 if(listObject.taskName == taskInput){
//                     alert("Already Exists");
//                     taskInput = "";
//                     return;
//                 }
//             });

//             if(taskInput == ""){ //get around this by making it "required" to submit w/ out an entry
//                 console.log("Please enter a task.")
//             }else{
//                 localStorage.setItem("my_tasks", JSON.stringify([...JSON.parse(localStorage.getItem("my_tasks") || "[]"), {taskName: taskInput, isDone: false}])); 
//             }	
//         }

//         this.display();
//         document.querySelector("#new-todo-field").value = "";
// 	}

// 	done_undone(x){
//         console.log("checked");
// 	}

// 	deleteElement(z){
//         console.log("You chose to delete ");
// 	}

// 	display(){
//         this.ulElement.innerHTML = "";
//         let tasks = Array.from(JSON.parse(localStorage.getItem("my_tasks")));
//         // const storage_name = todo_task_list;
        
//         //Iterate throught the To list to display all tasks
//         tasks.forEach((listObject) =>{
//             const taskListElement = document.createElement("li");
//             taskListElement.classList.add("row", "todo-item", "d-flex", "align-items-center");

//             //Check Box
//             const checkbox = document.createElement("input");
//             checkbox.classList.add("col-md-1");
//             checkbox.setAttribute("type", "checkbox");
//             taskListElement.appendChild(checkbox);

//             //Task Name
//             const name = document.createElement("h5")
//             name.classList.add("col-md-8", "task-name");
//             name.innerText = listObject.taskName;
//             taskListElement.setAttribute("data-id", listObject.id);
//             taskListElement.appendChild(name);

//             //Buttons
//             const editBtn = document.createElement("button");
//             editBtn.classList.add("btn","edit-btn");
//             editBtn.innerText = "Edit";

//             const removeBtn = document.createElement("button");
//             removeBtn.classList.add("btn" ,"remove-btn");
//             removeBtn.setAttribute("data-id", listObject.id);
//             removeBtn.classList.add("far", "fa-trash-alt"); // Add trash Icon

//             const btnGroup = document.createElement("div")
//             btnGroup.classList.add("col-md-3", "btn-group", "task-btns");
//             btnGroup.appendChild(editBtn);
//             btnGroup.appendChild(removeBtn);
//             taskListElement.appendChild(btnGroup);
           
//             removeBtn.addEventListener("click", function(element){
//                 const deleteId = element.target.getAttribute("data-id");
//                 myTodoList.deleteElement(deleteId);
//             })

//             checkbox.addEventListener("click", function(element){
//                 const selectId = element.target.getAttribute("data-id");
//                 myTodoList.done_undone(selectId);
//             })

//             if(listObject.isDone){
//                 taskListElement.classList.add("checked")
//             }
            
//             this.ulElement.appendChild(taskListElement)
//         })
// 	}
// }







