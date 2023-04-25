document.getElementById("tasksBtn").addEventListener("click", tasksTab);
document.getElementById("profileBtn").addEventListener("click", profileTab);
document.getElementById("friendsBtn").addEventListener("click", friendsTab);

function tasksTab(){
  let tasksTab = document.getElementById("tasksTab");
  let profileTab = document.getElementById("profileTab");
  let friendsTab = document.getElementById("friendsTab");
  let tasksNav = document.getElementById("tasksBtn");
  let profileNav = document.getElementById("profileBtn");
  let friendsNav = document.getElementById("friendsBtn");
  tasksTab.className = "visibleTab";
  profileTab.className = "hiddenTab";
  friendsTab.className = "hiddenTab";
  tasksNav.classList.add("active");
  profileNav.classList.remove("active");
  friendsNav.classList.remove("active");
}

function profileTab(){
  let tasksTab = document.getElementById("tasksTab");
  let profileTab = document.getElementById("profileTab");
  let friendsTab = document.getElementById("friendsTab");
  let tasksNav = document.getElementById("tasksBtn");
  let profileNav = document.getElementById("profileBtn");
  let friendsNav = document.getElementById("friendsBtn");
  tasksTab.className = "hiddenTab";
  profileTab.className = "visibleTab";
  friendsTab.className = "hiddenTab";
  tasksNav.classList.remove("active");
  profileNav.classList.add("active");
  friendsNav.classList.remove("active");
}

function friendsTab(){
  let tasksTab = document.getElementById("tasksTab");
  let profileTab = document.getElementById("profileTab");
  let friendsTab = document.getElementById("friendsTab");
  let tasksNav = document.getElementById("tasksBtn");
  let profileNav = document.getElementById("profileBtn");
  let friendsNav = document.getElementById("friendsBtn");
  tasksTab.className = "hiddenTab";
  profileTab.className = "hiddenTab";
  friendsTab.className = "visibleTab";
  tasksNav.classList.remove("active");
  profileNav.classList.remove("active");
  friendsNav.classList.add("active");
}