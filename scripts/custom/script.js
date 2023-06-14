    // Variável para guardar o índice da tarefa sendo editada (-1 significa adição)
    var editIndex = -1;

    // Array para armazenar as tarefas
    var tasks = [];

    // Função para adicionar ou editar uma tarefa
    function addOrUpdateTask() {
      var taskName = document.getElementById("taskName").value;
      var taskDescription = document.getElementById("taskDescription").value;
      var category = document.getElementById("category").value;

      if (editIndex === -1) {
        // Adicionar uma nova tarefa
        var task = {
          name: taskName,
          description: taskDescription,
          category: category,
          completed: false
        };
        tasks.push(task);
      } else {
        // Editar uma tarefa existente
        tasks[editIndex].name = taskName;
        tasks[editIndex].description = taskDescription;
        tasks[editIndex].category = category;
      }
      editIndex = -1;
      renderTasks();
      document.getElementById("taskForm").reset();
      document.getElementById("submitButton").innerHTML = '<i class="fas fa-plus"></i> Adicionar';
      document.getElementById("cancelButton").hidden = true;
    }

    // Função para renderizar as tarefas na lista
    function renderTasks() {
      var taskList = document.getElementById("taskList");
      taskList.innerHTML = "";

      tasks.forEach(function(task, index) {
        var listItem = document.createElement("li");
        listItem.className = "list-group-item";

        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.onchange = function() {
          toggleTaskStatus(index);
        };

        var editBtn = document.createElement("button");
        editBtn.className = "btn btn-primary btn-sm me-2";
        editBtn.innerHTML = '<i class="far fa-edit"></i>';
        editBtn.onclick = function() {
          editTask(index);
        };

        var deleteBtn = document.createElement("button");
        deleteBtn.className = "btn btn-danger btn-sm";
        deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
        deleteBtn.onclick = function() {
          deleteTask(index);
        };

        listItem.appendChild(checkbox);
        listItem.appendChild(document.createTextNode(task.category + ": " + task.name + " - " + task.description + " "));
        listItem.appendChild(editBtn);
        listItem.appendChild(deleteBtn);

        if (task.completed) {
          listItem.classList.add("text-decoration-line-through");
          listItem.classList.add("text-muted");
        }

        taskList.appendChild(listItem);
      });
    }

    // Função para alternar o status de uma tarefa (concluída/não concluída)
    function toggleTaskStatus(index) {
      tasks[index].completed = !tasks[index].completed;
      renderTasks();
    }

    // Função para editar uma tarefa
    function editTask(index) {
      document.getElementById("taskName").value = tasks[index].name;
      document.getElementById("taskDescription").value = tasks[index].description;
      document.getElementById("category").value = tasks[index].category;
      document.getElementById("submitButton").innerHTML = '<i class="fas fa-edit"></i> Editar';
      document.getElementById("cancelButton").hidden = false;
      document.getElementById("cancelButton").innerHTML = 'Cancelar';
      editIndex = index;
    }

    // Função para excluir uma tarefa
    function deleteTask(index) {
      tasks.splice(index, 1);
      renderTasks();
    }

    // Event listener para o formulário de adição/editação de tarefa
    document.getElementById("taskForm").addEventListener("submit", function(e) {
      e.preventDefault();
      addOrUpdateTask();
    });

    // Event listener para o botão de cancelar a edição
    document.getElementById("cancelButton").addEventListener("click", function(e) {
      e.preventDefault();
      document.getElementById("taskForm").reset();
      document.getElementById("submitButton").innerHTML = '<i class="fas fa-plus"></i> Adicionar';
      document.getElementById("cancelButton").hidden = true;
      editIndex = -1;
    });

    // Renderizar as tarefas inicialmente
    renderTasks();