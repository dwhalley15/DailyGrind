document.getElementById("allBtn").addEventListener("click", allTab);
document.getElementById("inviteBtn").addEventListener("click", inviteTab);
document.getElementById("requestBtn").addEventListener("click", requestTab);

function allTab(){
  let allTab = document.getElementById("allTab");
  let inviteTab = document.getElementById("inviteTab");
  let requestTab = document.getElementById("requestTab");
  let allNav = document.getElementById("allBtn");
  let inviteNav = document.getElementById("inviteBtn");
  let requestNav = document.getElementById("requestBtn");
  allTab.className = "visibleTab";
  inviteTab.className = "hiddenTab";
  requestTab.className = "hiddenTab";
  allNav.classList.add("active");
  inviteNav.classList.remove("active");
  requestNav.classList.remove("active");
}

function inviteTab(){
  let allTab = document.getElementById("allTab");
  let inviteTab = document.getElementById("inviteTab");
  let requestTab = document.getElementById("requestTab");
  let allNav = document.getElementById("allBtn");
  let inviteNav = document.getElementById("inviteBtn");
  let requestNav = document.getElementById("requestBtn");
  allTab.className = "hiddenTab";
  inviteTab.className = "visibleTab";
  requestTab.className = "hiddenTab";
  allNav.classList.remove("active");
  inviteNav.classList.add("active");
  requestNav.classList.remove("active");
}

function requestTab(){
  let allTab = document.getElementById("allTab");
  let inviteTab = document.getElementById("inviteTab");
  let requestTab = document.getElementById("requestTab");
  let allNav = document.getElementById("allBtn");
  let inviteNav = document.getElementById("inviteBtn");
  let requestNav = document.getElementById("requestBtn");
  allTab.className = "hiddenTab";
  inviteTab.className = "hiddenTab";
  requestTab.className = "visibleTab";
  allNav.classList.remove("active");
  inviteNav.classList.remove("active");
  requestNav.classList.add("active");
}