<!--
<div class="modal" id="editTaskModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Tarefa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <label for="taskNameInput">Nome da Tarefa:</label>
        <input type="text" id="taskNameInput" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" id="editTask" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
-->
<div class="modal" id="editTaskModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Tarefa</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="taskNameInput" class="form-label">Nome da Tarefa:</label>
          <input type="text" id="taskNameInput" class="form-control">
        </div>
        <div class="mb-3">
          <label for="taskCategorySelect" class="form-label">Categoria da Tarefa:</label>
          <select id="taskCategorySelect" class="form-select custom-select">
            <!-- Opções para seleção de categoria -->
          </select>
        </div>
        <div class="mb-3">
          <label for="taskDescriptionTextarea" class="form-label">Descrição:</label>
          <textarea id="taskDescriptionTextarea" class="form-control" rows="3" style="resize: none;"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="editTask">Salvar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

