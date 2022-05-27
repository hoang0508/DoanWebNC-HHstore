// show password
const iconEye = document.querySelectorAll(".icon-eye");
iconEye.forEach((item) =>
  item.addEventListener("click", function (e) {
    const input = this.previousElementSibling;
    const inputType = input.getAttribute("type");
    if (inputType === "password") {
      input.setAttribute("type", "text");
      e.target.classList.toggle("fa-eye-slash");
      e.target.classList.toggle("fa-eye");
    } else {
      input.setAttribute("type", "password");
      e.target.classList.toggle("fa-eye-slash");
      e.target.classList.toggle("fa-eye");
    }
  })
);

// todo -list
let btnAddTaskEl = document.querySelector("button");
let taskNameEl = document.querySelector(".content");

let tasks = getTaskFromLocalStorage();
renderTask(tasks);
btnAddTaskEl.addEventListener("click", function () {
  if (!taskNameEl.value) {
    alert("Vui lòng nhập tên công việc");
    return false;
  }
  let tasks = getTaskFromLocalStorage();
  tasks.push({
    name: taskNameEl.value,
  });
  taskNameEl.value = "";
  localStorage.setItem("tasks", JSON.stringify(tasks));
  renderTask(tasks);
});

function renderTask(tasks = []) {
  const resultT = document.querySelector(".result");
  let content = "<ul class='task-list'>";
  tasks.forEach((task) => {
    content += `
    <li class="item-task">
          <div class="task-name">${task.name}</div>
          <div class="task-fc">
            <a href="" class="icon icon-edit"
              ><ion-icon name="create-outline" class= "edit"></ion-icon
            ></a>
            <a href="" class="icon icon-remove"
              ><ion-icon name="trash-outline" class = "remove"></ion-icon
            ></a>
          </div>
          </li>
    `;
  });
  content += "</ul>";
  resultT.innerHTML = content;
}

function getTaskFromLocalStorage() {
  return localStorage.getItem("tasks")
    ? JSON.parse(localStorage.getItem("tasks"))
    : [];
}

const resultH = document.querySelector(".result");

resultH.addEventListener("click", function (e) {
  if (e.target.matches(".remove")) {
    e.preventDefault();
    //remove dom
    const taskName = e.target.parentNode.parentNode.parentNode;
    taskName.parentNode.removeChild(taskName);

    // remove local
    const todoText = e.target.parentNode.parentNode.parentNode.textContent;
    const index = tasks.findIndex((item) => item === todoText);
    tasks.splice(index, 1);
    localStorage.setItem("tasks", JSON.stringify(tasks));
  }
});

resultH.addEventListener("click", function (id) {
  if (id.target.matches(".edit")) {
    id.preventDefault();
    let tasks = getTaskFromLocalStorage();
    if (tasks.length > 0) {
      console.log(tasks[id]);
    }
  }
});
