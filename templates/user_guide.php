<div class='container, popup2' id="user_guide_popUp1">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image1.png'>
        <p>
        This is the create task page, from here you can <br/>
        create new tasks for you to complete a selected <br/>
        task type throughout a set time period. Just remember <br/>
        that you can only be doing one task at a single time,<br/> 
        so make sure that they don’t overlap with each other.<br/>
        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp1", "user_guide_popUp2")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp2">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image2.png'>
        <p>
        From here you can view all of the tasks that you <br/>
         have created for yourself. You can also use <br/>
        the bin buttons on the side of each of them to <br/>
        delete any of the tasks that you no longer want <br/>
        or have completed. <br/>
        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp2", "user_guide_popUp3")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp3">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image3.png'>
        <p>
        In the tasks section you can also select individual <br/>
        tasks to update, make sure that they also conform to <br/>
        the same rules as in the new task form. <br/>
        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp3", "user_guide_popUp4")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp4">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image4.png'>
        <p>
        The last thing you can access in the tasks section <br/>
        in the task’s leader board, from here you can see how <br/>
        many tasks you have completed compared to your friends <br/>
        through the “score” metric. The score is a number <br/>
        assigned to a user that gets increased by 1 whenever <br/>
        you complete a task <br/>
        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp4", "user_guide_popUp5")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp5">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image5.png'>
        <p>
        This is the profile page where you can view all of the <br/>
        details that relate to you and update the experience <br/>
        of your account: <br/>
            o	You can delete your account with the delete button <br/>
                down in the bottom right corner <br/>
            o	You can also make all of your account changes permanent <br/>
                with the update account button at the top. This can <br/>
                change the name of your account of change from light <br/>
                mode to dark mode <br/>
            o	Finally you have the ability to re-set your password <br/>
                if you need to with the button in the bottom left <br/>

        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp5", "user_guide_popUp6")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp6">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image6.png'>
        <p>
        This is the profile page where you can view all of the <br/>
        details that relate to you and update the experience <br/>
        of your account: <br/>
            o	You can delete your account with the delete button <br/>
                down in the bottom right corner <br/>
            o	You can also make all of your account changes permanent <br/>
                with the update account button at the top. This can <br/>
                change the name of your account of change from light <br/>
                mode to dark mode <br/>
            o	Finally you have the ability to re-set your password <br/>
                if you need to with the button in the bottom left <br/>

        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp6", "user_guide_popUp7")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp7">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image7.png'>
        <p>
        Here you can view all of the other users that you are <br/>
        currently friends with inside of this application. If you <br/>
        also choose you can use the delete button on the right <br/>
        side of the list to remove a user from you friend list. <br/>
        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp7", "user_guide_popUp8")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp8">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image8.png'>
        <p>
        You can use this tool inside of the friend’s page to <br/>
        add more friends to your friends list. You can do this <br/>
        by clicking the friend request button on the right side <br/>
        of the specific person you want to be friends with. This <br/>
        will send a request to them, if they accept they will <br/>
        then appear at the bottom of your friends list. <br/>
        </p>
        <button class="btn, navItem" onclick='changePopUp("user_guide_popUp8", "user_guide_popUp9")'>Next</button>
    </div>
</div>

<div class='container, popup2' id="user_guide_popUp9">
    <div class='popup-content2'>
        <img class='userGuideImage' src='../images/UserGuideImages/user_guide_image9.png'>
        <p>
        Finally the friend requests list which shows all of the <br/>
        friend request you have received from users, you can either <br/>
        accept them (check button) or decline them (stop button) <br/>
        </p>
        <button class="btn, navItem" onclick='document.getElementById("user_guide_popUp9").classList.remove("show")'>Next</button>
    </div>
</div>


<script type='text/javascript' defer>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById("user_guide_popUp1").classList.add("show");
    });

    function changePopUp(popUpid1, popUpid2){
        let curActivityPopUp1 = document.getElementById(popUpid1);
        curActivityPopUp1.classList.remove("show");
        let curActivityPopUp2 = document.getElementById(popUpid2);
        curActivityPopUp2.classList.add("show");
    }
</script>


<style>
    .popup2 {
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
    .popup-content2 {
        background-color: white;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888888;
        width: 70%;
        font-weight: bolder;
    }
    .popup-content2 button {
        display: block;
        margin: 0 auto;
    }
    .show {
        display: block;
    }
    h1 {
        color: green;
    }
    .userGuideImage {
        width: 100%;
        height: 100%;
    }

</style>