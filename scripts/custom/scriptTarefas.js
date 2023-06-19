        // Array de exemplo com categorias e tarefas
        let categories = [
          {
              name: 'Trabalho',
              tasks: [
                  { name: 'Fazer relatório', descricao: '', completed: false },
                  { name: 'Enviar e-mails', descricao: '', completed: true }
              ]
          },
          {
              name: 'Casa',
              tasks: [
                  { name: 'Limpar cozinha', descricao: '', completed: false },
                  { name: 'Lavar roupa', descricao: '', completed: false }
              ]
          }
      ];

      // Função para renderizar os cards e as listas de tarefas
      function renderCards() {
          const cardsContainer = document.getElementById('corpo_documento');
          cardsContainer.innerHTML = '';

          categories.forEach((category, categoryIndex) => {
              const card = document.createElement('div');
              card.classList.add('col-md-12', 'col-xl-4', 'grid-margin', 'stretch-card');

              const innerCard = document.createElement('div');
              innerCard.classList.add('card');

              const cardBody = document.createElement('div');
              cardBody.classList.add('card-body');

              const title = document.createElement('h2');
              title.classList.add('card-title');
              title.textContent = category.name;

              const dropdownMenu = createDropdownMenu(categoryIndex);

              const addItems = document.createElement('div');
              addItems.classList.add('add-items', 'd-flex');

              const addTaskInput = document.createElement('input');
              addTaskInput.classList.add('form-control', 'text-white', 'todo-list-input');
              addTaskInput.type = 'text';
              addTaskInput.placeholder = 'Nova tarefa...';

              const addButton = document.createElement('button');
              addButton.classList.add('add', 'btn', 'btn-primary', 'todo-list-add-btn');
              addButton.textContent = 'Adicionar';
              addButton.addEventListener('click', () => {
                  addTask(categoryIndex, addTaskInput.value);
                  addTaskInput.value = '';
              });

              const listWrapper = document.createElement('div');
              listWrapper.classList.add('list-wrapper');

              const taskList = document.createElement('ul');
              taskList.classList.add('d-flex', 'flex-column-reverse', 'text-white', 'todo-list', 'todo-list-custom');

              category.tasks.forEach((task, index) => {
                  const taskItem = document.createElement('li');
                  taskItem.classList.add('task-item');

                  const formCheck = document.createElement('div');
                  formCheck.classList.add('form-check', 'form-check-primary');

                  const checkboxLabel = document.createElement('label');
                  checkboxLabel.classList.add('form-check-label');

                  const checkbox = document.createElement('input');
                  checkbox.classList.add('checkbox');
                  checkbox.type = 'checkbox';
                  checkbox.checked = task.completed;
                  checkbox.addEventListener('change', () => {
                      toggleTaskCompleted(categoryIndex, index);
                  });
                  const taskNameLabel = document.createElement('label');
                  taskNameLabel.setAttribute('id', `labelNomeTarefa`);
                  taskNameLabel.classList.add('form-check-label', 'form-check-item');
                  taskNameLabel.textContent = task.name;
                  taskNameLabel.addEventListener('click', () => {
                      openEditTaskModal(categoryIndex, index);
                  });

                  const deleteIcon = document.createElement('i');
                  deleteIcon.classList.add('mdi', 'remove', 'mdi-close-circle-outline');
                  deleteIcon.addEventListener('click', () => {
                      deleteTask(categoryIndex, index);
                  });

                  // Função para excluir uma tarefa
                  function deleteTask(categoryIndex, taskIndex) {
                      categories[categoryIndex].tasks.splice(taskIndex, 1);
                      renderCards();
                  }

                  checkboxLabel.appendChild(checkbox);
                  formCheck.appendChild(checkboxLabel);
                  formCheck.appendChild(taskNameLabel);
                  taskItem.appendChild(formCheck);
                  taskItem.appendChild(deleteIcon);

                  taskList.appendChild(taskItem);
              });

              addItems.appendChild(addTaskInput);
              addItems.appendChild(addButton);
              listWrapper.appendChild(taskList);

              cardBody.appendChild(title);
              cardBody.appendChild(dropdownMenu);
              cardBody.appendChild(addItems);
              cardBody.appendChild(listWrapper);

              innerCard.appendChild(cardBody);
              card.appendChild(innerCard);

              cardsContainer.appendChild(card);
          });
      }

      // Função para criar o dropdown menu de opções
      function createDropdownMenu(categoryIndex) {
          const dropdownMenu = document.createElement('div');
          dropdownMenu.classList.add('dropdown');
          dropdownMenu.setAttribute('id', `dropdownMenu`);

          const dropdownToggle = document.createElement('button');
          dropdownToggle.classList.add('btn', 'btn-sm', 'btn-light', 'dropdown-toggle');
          dropdownToggle.setAttribute('type', 'button');
          dropdownToggle.setAttribute('id', `dropdownToggle`);
          //  dropdownToggle.setAttribute('id', `dropdownMenu${categoryIndex}`);
          dropdownToggle.setAttribute('data-toggle', 'dropdown');
          dropdownToggle.setAttribute('aria-haspopup', 'true');
          dropdownToggle.setAttribute('aria-expanded', 'false');
          dropdownToggle.innerHTML = '<i class="mdi mdi-dots-vertical"></i>';

          const dropdownMenuItems = document.createElement('div');
          dropdownMenuItems.classList.add('dropdown-menu');

          const editItem = document.createElement('a');
          editItem.classList.add('dropdown-item');
          editItem.setAttribute('href', '#');
          editItem.innerHTML = 'Editar Nome';
          editItem.addEventListener('click', () => {
              openEditCategoryModal(categoryIndex);
          });

          const deleteItem = document.createElement('a');
          deleteItem.classList.add('dropdown-item');
          deleteItem.setAttribute('href', '#');
          deleteItem.innerHTML = 'Apagar Categoria';
          deleteItem.addEventListener('click', () => {
              deleteCategory(categoryIndex);
          });

          dropdownMenuItems.appendChild(editItem);
          dropdownMenuItems.appendChild(deleteItem);

          dropdownMenu.appendChild(dropdownToggle);
          dropdownMenu.appendChild(dropdownMenuItems);

          return dropdownMenu;
      }

      // Função para adicionar uma nova tarefa
      function addTask(categoryIndex, taskName) {
          if (taskName) {
              const tarefa = { name: taskName, descricao: 'A', completed: false };
              categories[categoryIndex].tasks.push(tarefa);
              renderCards();
          }
      }

      // Função para marcar/desmarcar uma tarefa como concluída
      function toggleTaskCompleted(categoryIndex, taskIndex) {
          categories[categoryIndex].tasks[taskIndex].completed = !categories[categoryIndex].tasks[taskIndex].completed;
          renderCards();
      }

      // Função para abrir o modal de edição de tarefa
      function openEditTaskModal(categoryIndex, taskIndex) {
          const task = categories[categoryIndex].tasks[taskIndex];
          const modal = document.getElementById('editTaskModal');

          // Define os dados da tarefa no conteúdo do modal
          const taskNameInput = modal.querySelector('#taskNameInput');
          taskNameInput.value = task.name;
          const taskDescricaoTextArea = modal.querySelector('#taskDescriptionTextarea');
          taskDescricaoTextArea.value = task.descricao;
          const taskCompletedField = task.completed;

          const saveButton = modal.querySelector('#editTask');
          saveButton.addEventListener('click', () => {
              const tarefaEditada = { name: taskNameInput.value, descricao: taskDescricaoTextArea.value, completed: taskCompletedField };
              //const newTaskName = taskNameInput.value;
              //editTaskName(categoryIndex, taskIndex, newTaskName);
              editTaskName(categoryIndex, taskIndex, tarefaEditada);
              bootstrapModal.hide();
          });

          // Função para editar o nome da tarefa
          function editTaskName(categoryIndex, taskIndex, tarefaEditada) {
              categories[categoryIndex].tasks[taskIndex] = tarefaEditada;
              renderCards();
          }

          // Abre o modal
          const bootstrapModal = new bootstrap.Modal(modal);
          bootstrapModal.show();
      }

      // Função para chamar o modal para editar categoria
      function openEditCategoryModal(categoryIndex) {
          const modal = document.getElementById('editCategoryModal');

          // Define os dados da categoria no conteúdo do modal
          const categoryNameInput = modal.querySelector('#categoryNameInput');
          categoryNameInput.value = categories[categoryIndex].name;

          const saveButton = modal.querySelector('#editCategory');
          saveButton.addEventListener('click', () => {
              const newCategoryName = categoryNameInput.value;
              editCategoryName(categoryIndex, newCategoryName);
              bootstrapModal.hide();
          });

          // Função para editar o nome da categoria
          function editCategoryName(categoryIndex, newCategoryName) {
              categories[categoryIndex].name = newCategoryName;
              renderCards();
          }

          // Abre o modal
          const bootstrapModal = new bootstrap.Modal(modal);
          bootstrapModal.show();
      }

      // Função para chamar o modal para adicionar categoria
      function openAddCategoryModal(nomeCategoria) {
          const modal = document.getElementById('addCategoryModal');

          // Define os dados da categoria no conteúdo do modal
          const categoryNameInput = modal.querySelector('#categoryNameInput');

          const saveButton = modal.querySelector('#addCategory');
          saveButton.addEventListener('click', () => {
              const newCategoryName = categoryNameInput.value;
              addCategory(newCategoryName);
              bootstrapModal.hide();
          });

          // Função para adicionar uma nova categoria
          function addCategory(newCategoryName) {
              //const newCategoryName = prompt('Digite o nome da nova categoria:');
              if (newCategoryName) {
                  const newCategory = {
                      name: newCategoryName,
                      tasks: []
                  };
                  categories.push(newCategory);
                  renderCards();
              }
          }

          // Abre o modal
          const bootstrapModal = new bootstrap.Modal(modal);
          bootstrapModal.show();

      }

      // Função para excluir uma categoria
      function deleteCategory(categoryIndex) {
          categories.splice(categoryIndex, 1);
          renderCards();
      }

      // Event listener para o botão de criar categoria
      const btnCriarCategoria = document.getElementById('btnCriarCategoria');
      btnCriarCategoria.addEventListener('click', openAddCategoryModal);

      // Renderiza os cards iniciais
      renderCards();