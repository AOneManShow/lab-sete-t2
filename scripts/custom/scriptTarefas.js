        // Array de exemplo com categorias e tarefas
        let categories = [
          {
              name: 'Trabalho',
              tasks: [
                  { name: 'Fazer relatório', completed: false },
                  { name: 'Enviar e-mails', completed: true }
              ]
          },
          {
              name: 'Casa',
              tasks: [
                  { name: 'Limpar cozinha', completed: false },
                  { name: 'Lavar roupa', completed: false }
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
                  taskNameLabel.classList.add('form-check-label', 'form-check-item');
                  taskNameLabel.textContent = task.name;

                  const deleteIcon = document.createElement('i');
                  deleteIcon.classList.add('mdi', 'remove', 'mdi-close-circle-outline');
                  deleteIcon.addEventListener('click', () => {
                      deleteTask(categoryIndex, index);
                  });

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
              editCategoryName(categoryIndex);
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
              categories[categoryIndex].tasks.push({ name: taskName, completed: false });
              renderCards();
          }
      }

      // Função para marcar/desmarcar uma tarefa como concluída
      function toggleTaskCompleted(categoryIndex, taskIndex) {
          categories[categoryIndex].tasks[taskIndex].completed = !categories[categoryIndex].tasks[taskIndex].completed;
          renderCards();
      }

      // Função para excluir uma tarefa
      function deleteTask(categoryIndex, taskIndex) {
          categories[categoryIndex].tasks.splice(taskIndex, 1);
          renderCards();
      }

      // Função para editar o nome da categoria
      function editCategoryName(categoryIndex) {
          const newName = prompt('Digite o novo nome da categoria:');
          if (newName) {
              categories[categoryIndex].name = newName;
              renderCards();
          }
      }

      // Função para excluir uma categoria
      function deleteCategory(categoryIndex) {
          categories.splice(categoryIndex, 1);
          renderCards();
      }

      // Função para adicionar uma nova categoria
      function addCategory() {
          const newCategoryName = prompt('Digite o nome da nova categoria:');
          if (newCategoryName) {
              const newCategory = {
                  name: newCategoryName,
                  tasks: []
              };
              categories.push(newCategory);
              renderCards();
          }
      }

      // Event listener para o botão de criar categoria
      const btnCriarCategoria = document.getElementById('btnCriarCategoria');
      btnCriarCategoria.addEventListener('click', addCategory);

      // Renderiza os cards iniciais
      renderCards();