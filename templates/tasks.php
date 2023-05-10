<div id="task_container" class="container, navbar">
    <div class="container" id="buttons_container">
        <input type="button" class="btn, navItem" id="new_task" value="New Task" onclick="toggleFromContainer()">
        <input type="button" class="btn, navItem" id="task_list" value="Tasks" onclick="toggleTaskContainer()">
        <input type="button" class="btn, navItem" id="task_leaderboard" value="Leaderboard" onclick="toggleLeaderBoard()">
    </div>

    <div class="container" id="newTaskFromContainer">
        <form name="taskCreationForm" id="taskCreationForm" action="<?php echo htmlspecialchars("../scripts/php/createNewTaskScript.php"); ?>" method="post">
            <input type="text" class="textInput" id="name" name="name" placeholder="Task Name" maxlength="20" required>
            <input type="text" class="textInput" id="description" name="description" placeholder="Task Description" maxlength="255" required>

            <select class="textInput" id="type" name="type" placeholder="name" maxlength="255" required>
                <option value="task">task</option>
                <option value="study">study</option>
                <option value="exercise">exercise</option>
                <option value="social">social</option>
                <option value="clean">clean</option>
                <option value="eat">eat</option>
                <option value="drink">drink</option>
                <option value="meditate">meditate</option>
            </select> 

            <input type="date" class="textInput" id="startTime" name="startTime" placeholder="name" maxlength="10" required
            maxlength="10" required required pattern = "[0-3][0-9]-[0-1][0-9]-[0-9]{4}">
            <input type="date" class="textInput" id="endTime" name="endTime" placeholder="name" maxlength="10" required
            maxlength="10" required required pattern = "[0-3][0-9]-[0-1][0-9]-[0-9]{4}">
            <br><br>
            <input onclick='submitTaskForm("taskCreationForm")' type="button" class="btn, navItem" id="newTask" value="Submit">
        </form>
    </div>

    <div class="container, hiddenTab" id="taskListContainer">
        <?php include "allTasks.php" ?>
    </div>

    <div class="container, hiddenTab" id="friendsLeaderBoard">
        <h3>Tasks Leaderboard</h3>
        <?php include "../scripts/php/loadLeaderBoard.php" ?>
    </div>
</div>


<script type="text/javascript">
    <?php

    //Php check after (update, delete, create, etc) to see which alerts to send:
    if(isset($_SESSION['task_delete_error']) && $_SESSION['task_delete_error'] == 'true'){
        echo("myAlert('" . $_SESSION['task_delete_error_text']."')");
        $_SESSION['task_delete_error'] = "false";
        $_SESSION['task_delete_error_text'] = "";
    }

    if(isset($_SESSION['task_update_error']) && $_SESSION['task_update_error'] == 'true'){
        echo("myAlert('" . $_SESSION['task_update_error_text']."')");
        $_SESSION['task_update_error'] = "false";
        $_SESSION['task_update_error_text'] = "";
    }

    if(isset($_SESSION['task_create_error']) && $_SESSION['task_create_error'] == 'true'){
        echo("myAlert('" . $_SESSION['task_create_error_text']."')");
        $_SESSION['task_create_error'] = "false";
        $_SESSION['task_create_error_text'] = "";
    }

    if(isset($_SESSION['task_date_error']) && $_SESSION['task_date_error'] == 'true'){
        echo("myAlert('" . $_SESSION['task_date_error_text']."')");
        $_SESSION['task_date_error'] = "false";
        $_SESSION['task_date_error_text'] = "";
    }
    ?>


    function myAlert(alert_text){
        var buf = Math.random() * 111;

        var alertBox = document.createElement("div");
        alertBox.classList.add("popup");
        alertBox.classList.add("container");
        alertBox.classList.add("show");
        alertBox.id = "alertBox" + buf;

        var alertBoxContainer = document.createElement("div");
        alertBoxContainer.classList.add("popup-content")
        alertBox.appendChild(alertBoxContainer);

        var alertText = document.createElement("h3");
        alertText.textContent = alert_text;

        var removeAlertButton = document.createElement("button");
        removeAlertButton.classList.add("btn");
        removeAlertButton.classList.add("navItem");
        removeAlertButton.innerText = "Close Alert";
        removeAlertButton.onclick = function() {
            let alertBoxRemv = document.getElementById(alertBox.id);
            alertBoxRemv.classList.remove("show");
            document.getElementById(alertBox.id).parentElement.removeChild(alertBoxRemv);
        }

        alertBoxContainer.appendChild(alertText);
        alertBoxContainer.appendChild(removeAlertButton);
        document.body.appendChild(alertBox);

        try{
            document.getElementById("task_container").appendChild(alertBox);
        }catch(e){
            console.log("Failed to insert");
        }
    }


    //Let users know when the task is about to end:
    function checkTaskEnd(){
        const tasks = document.getElementsByClassName("task");
        console.log(tasks);
        Array.from(tasks).forEach(task => {
            if(Date(task.elements["endTime"]) == Date()){
                myAlert("Task: " + task.elements["name"]["value"] + " This task is about to end!");
                console.log("TaskTypes1");
            }
        });
    }


    //Let users know which tasks they are missing:
    function checkTaskTypes(){
        var task_found = false;
        const tasks = document.getElementsByClassName("task");
        var taskList = ["task", "study", "exercise", "social", "clean", "eat", "drink", "meditate"];
        var myTaskList = [];
        Array.from(tasks).forEach(task => {myTaskList.push(task.elements["type"])});
        for(task in taskList){
            if(!myTaskList.includes(task) && !task_found){
                myAlert("You have no tasks of type: " + taskList[task] + ". Perhaps try adding one")
                task_found = true;
                console.log("TaskTypes2");
            }
        }
    }

    
    //Event listeners:
    document.addEventListener('DOMContentLoaded', checkTaskEnd);
    document.addEventListener('DOMContentLoaded', checkTaskTypes);
</script>


<script type="text/javascript" defer>
    //Getting the html elements by reference:
    const createTaskButton = document.getElementById('new_task');
    const formContainer = document.getElementById('newTaskFromContainer');
    const taskContainer = document.getElementById('taskListContainer');
    const formInput = document.getElementById('newTaskFromContainer');
    var formInputsList = formInput.querySelectorAll('input[type="text"], input[type="date"], select');
    const submitTaskFormButton = document.getElementById('newTask');
    const activityPopUps = document.getElementsByClassName("activityPopUp");
    const activities = document.getElementsByName("activity");
    const taskLeaderboard = document.getElementById('friendsLeaderBoard');


    //Event listeners:
    createTaskButton.addEventListener('click', toggleHidden);
    document.addEventListener('DOMContentLoaded', toggleHidden);


    //Functions
    
    //Activity PopUp section:
    function showPopUp(activity_id){
        const curActivityPopUp = document.getElementById(activity_id);
        curActivityPopUp.classList.add("show");
    }

    function removePopUp(activity_id){
        const curActivityPopUp = document.getElementById(activity_id);
        curActivityPopUp.classList.remove("show");
    }

    function toggleLeaderBoard(){
        formContainer.classList.add('hiddenTab');
        taskContainer.classList.add('hiddenTab');
        taskLeaderboard.classList.remove('hiddenTab');
    }


    function toggleTaskContainer(){
        formContainer.classList.add('hiddenTab');
        taskContainer.classList.remove('hiddenTab');
        taskLeaderboard.classList.add('hiddenTab');
    }


    function toggleFromContainer(){
        formContainer.classList.remove('hiddenTab');
        taskContainer.classList.add('hiddenTab');
        taskLeaderboard.classList.add('hiddenTab');
    }


    function dateValidation(date_input){
        var correctDate = true;
        date_input = date_input.value.replace(/\s/g, '');
        const date_check = /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/;
        if (date_check.test(date_input)){
            let sep1 = RegExp("//");
            let sep2 = RegExp("\-");
            let sep3 = RegExp("\.");
            var date = "";
            if (sep1.test(date_input)){
                date = date_input.split('/');
            } else if (sep2.test(date_input)){
                date = date_input.split('-');
            } else if (sep3.test(date_input)){
                date = date_input.split('.');
            }

            const yyyy = parseInt(date[0]);
            const mm = parseInt(date[1]);
            const dd = parseInt(date[2]);
            const mm_days_list = [31,28,31,30,31,30,31,31,30,31,30,31];
            
            if (!(yyyy % 4) && (yyyy%100)){
                mm_days_list[1] += 1;
            }

            if (yyyy != 2023){
                myAlert(yyyy + ": is not the current year");
                correctDate = false;
            } else if (mm > 13 || mm < 1){
                myAlert(mm + ": is not a correct month");
                correctDate = false;
            } else if (dd < 1 || dd > mm_days_list[mm-1]){
                myAlert(dd + ": There are this many days in month: " + mm);
                correctDate = false;
            }
            return correctDate;
        }
        else {
            myAlert("Please put the date in the correct format")
            return false;
        }
    }


    function checkInputsNotNull(formInputs = formInputsList) {
        var isNull = false;

        //For loop for each input
        formInputs.forEach(element => {
            if(typeof(element) == "string") element.value.trim();
            if(element.value == "" || element.value == null && !isNull) {
                isNull = true
            };
        });

        if(isNull) myAlert("All fields need to be filled out");
        return isNull;
    }

    
    function submitTaskForm(formID = "newTaskFromContainer"){
        var forms = document.getElementById(formID);
        var formInputs = forms.querySelectorAll('input[type="text"], input[type="date"], select');

        const isNull = checkInputsNotNull(formInputs);
        if(isNull) return;

        //Perform other validation checks:
        //Name validation:
        const nameInput = forms.elements["name"]
        const text_special_chars_check = /^[A-Za-z0-9]*$/;
        is_text = text_special_chars_check.test(nameInput.value.replace(/\s/g, ''));
        if(!is_text){
            myAlert("The name field can only have text in it!")
            return false
        }

        
        //Date validation:
        const startDateInput = forms.elements["startTime"];
        const endDateInput = forms.elements["endTime"];
        const date_validation1 = dateValidation(startDateInput);
        const date_validation2 = dateValidation(endDateInput);
        if(!date_validation1 || !date_validation2) {
            myAlert("Invalid date");
            return;
        }

        var date1 = new Date(startDateInput.value);
        var date2 = new Date(endDateInput.value);

        if(date1 < new Date()){
            myAlert("The start can't be before today");
            return
        }

        if(date2 < date1){
            myAlert("The start date must come before the end date");
            return
        }

        document.forms[formID].submit();
    }
</script>


<style>
    .popup {
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        display: none;
    }
    .popup-content {
        background-color: white;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888888;
        width: 30%;
        font-weight: bolder;
    }
    .popup-content button {
        display: block;
        margin: 0 auto;
    }
    .show {
        display: block;
    }
    h1 {
        color: green;
    }
</style>