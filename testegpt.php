<!DOCTYPE html>
<html>

<head>
    <title>TESTE GPT</title>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: black;
        }

        /* Estilos para a navbar */
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            margin-left: 200px;/* Largura da sidebar */
        }

        .navbar-title {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        /* Estilos para a sidebar */
        .sidebar {
            background-color: #f1f1f1;
            width: 200px;
            padding: 10px;
            position: fixed;
            top: 40px; /* Altura da navbar */
            left: 0;
            height: 100%;
            bottom: 0;
            overflow: auto;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-item {
            margin-bottom: 10px;
        }

        .sidebar-item a {
            display: block;
            padding: 5px;
            text-decoration: none;
            color: #333;
        }

        .sidebar.sidebar-hidden {
            transform: translateX(-100%);
            /*    transition: transform 0.3s ease-in-out;*/
        }

        .sidebar-hidden~.main-content {
            margin-left: calc(200px - 20px);
            /* Ajuste o valor conforme necessário */
            /* Estilos adicionais para expandir o conteúdo principal quando a sidebar estiver escondida */
        }
        /*
        .sidebar-hidden~.main-content {
            margin-left: 20px; /* Ajuste o valor conforme necessário *
        }
        */

        /*
        .sidebar-hidden~.navbar {
            margin-left: calc(200px - 20px);
        }
        */

        /* Estilos para o conteúdo principal */
        .main-content {
            margin-left: 200px;/* Largura da sidebar */
            margin-right: 20px;
            padding: 20px;
        }

        /* Estilos para os cards */
        .card {
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
        }

        .task-list {
            list-style-type: none;
            padding: 0;
        }

        .task-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .task-item input[type="checkbox"] {
            margin-right: 5px;
        }

        .task-item .mdi {
            margin-left: auto;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Sidebar 
        <div class="sidebar">
            <div class="sidebar-item">
                <a href="#">Categoria 1</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Categoria 2</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Categoria 3</a>
            </div>
        </div>
    -->

    <!-- Navbar -->
<div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button id="btnToggleSidebar" class="btn btn-primary"><i class="mdi mdi-menu"></i></button>
    <h1 class="navbar-title">Exemplo de Cards e Listas de Tarefas</h1>
    <button id="btnCriarCategoria" class="btn btn-primary">Criar Categoria</button>
</div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        <div id="cards-container"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
            const cardsContainer = document.getElementById('cards-container');
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

                const addItems = document.createElement('div');
                addItems.classList.add('add-items', 'd-flex');

                const addTaskInput = document.createElement('input');
                addTaskInput.classList.add('form-control', 'todo-list-input');
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
                    deleteIcon.classList.add('mdi', 'mdi-close-circle-outline');
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
                cardBody.appendChild(addItems);
                cardBody.appendChild(listWrapper);

                innerCard.appendChild(cardBody);
                card.appendChild(innerCard);

                cardsContainer.appendChild(card);
            });
        }

        // Função para adicionar uma nova tarefa
        function addTask(categoryIndex, taskName) {
            categories[categoryIndex].tasks.push({ name: taskName, completed: false });
            renderCards();
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
    </script>
    <script>
        // Função para alternar a visibilidade da sidebar
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('sidebar-hidden');
        }

        // Função para ajustar a ordem z-index da sidebar
        function adjustSidebarZIndex() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');

            if (sidebar.classList.contains('sidebar-hidden')) {
                sidebar.style.zIndex = 'initial';
                mainContent.style.zIndex = 'initial';
            } else {
                sidebar.style.zIndex = '2';
                mainContent.style.zIndex = '1';
            }
        }

        // Event listener para o botão de esconder/mostrar a sidebar
        const btnToggleSidebar = document.getElementById('btnToggleSidebar');
        btnToggleSidebar.addEventListener('click', function () {
            toggleSidebar();
            adjustSidebarZIndex();
        });

        /*
                // Event listener para o botão de esconder/mostrar a sidebar
                const btnToggleSidebar = document.getElementById('btnToggleSidebar');
                btnToggleSidebar.addEventListener('click', toggleSidebar);
        */
    </script>
    <script>
        // Função para verificar o tamanho da tela e ocultar a sidebar se necessário
        function checkScreenSize() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const navbar = document.querySelector('.navbar');

            if (window.innerWidth < 992) {
                sidebar.classList.add('sidebar-hidden');
                mainContent.style.marginLeft = '20px'; // Ajuste o valor conforme necessário
                navbar.style.marginLeft = '20px'; // Descomente essa linha se quiser aplicar o mesmo recuo à navbar
            } else {
                sidebar.classList.remove('sidebar-hidden');
                mainContent.style.marginLeft = '220px'; // Ajuste o valor conforme necessário
                navbar.style.marginLeft = '200px'; // Descomente essa linha se quiser redefinir a margem da navbar
            }
        }

        // Verifica o tamanho da tela ao carregar e redimensionar
        window.addEventListener('DOMContentLoaded', checkScreenSize);
        window.addEventListener('resize', checkScreenSize);

    </script>
</body>

</html>