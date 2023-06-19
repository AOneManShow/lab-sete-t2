<?php
require 'gestor.php';
?>

  <div class="container">
    <div class="row g-4 bg-dark text-light m-5 text-center box-rounded">
      <h1 class="mt-4">Gestor de Tarefas</h1>
      <h2>Adicionar/Editar Tarefa</h2>

      <!-- Formulário para adicionar ou editar uma tarefa -->
      <div class="mt-4 d-flex justify-content-center">
        <form id="taskForm">
          <div class="row g-1 ps-5 pe-5 ms-5 me-5 d-flex justify-content-center">
            <div class="col-lg-6 col-md-8">
              <div class="mb-3">
                <input type="text" id="taskName" class="form-control" placeholder="Nome da tarefa" required>
              </div>
            </div>
            <div class="col-lg-4 col-md-8">
              <div class="mb-3">
                <select id="category" class="form-select" required>
                  <option selected disabled value="">--Selecione a categoria--</option>
                  <option value="Trabalho">Trabalho</option>
                  <option value="Estudo">Estudo</option>
                  <option value="Lazer">Lazer</option>
                </select>
              </div>
            </div>

            <div class="col-lg-5 col-md-8">
              <div class="mb-3">
                <input type="date" id="startDate" class="form-control" placeholder="Data de Início" required>
              </div>
            </div>
            <div class="col-lg-5 col-md-8">
              <div class="mb-3">
                <input type="date" id="completionDate" class="form-control" placeholder="Data de Conclusão" required>
              </div>
            </div>

            <div class="col-lg-10 col-md-8">
              <div class="mb-3">
                <textarea rows="3" maxlength="200" type="text" id="taskDescription" class="form-control"
                  placeholder="Descrição da tarefa" style="resize: none;"></textarea>
              </div>
            </div>
          </div>
          <div class="row g-1 ps-5 pe-5 ms-5 me-5 d-flex justify-content-center">
            <div class="col-lg-2">
              <button type="submit" id="submitButton" class="btn text-light" style="background-color: royalblue;"><i
                  class="fas fa-plus"></i>
                Adicionar</button>
            </div>
            <div class="col-lg-2">
              <button type="button" hidden id="cancelButton" class="btn btn-secondary">Cancelar</button>
            </div>
            <div class="mb-4"></div>
          </div>
        </form>
      </div>
    </div>

    <!-- Lista de tarefas -->
    <div class="mt-4 mb-4">
      <h2 hidden>Tarefas</h2>
      <ul id="taskList" class="list-group">
        <!-- As tarefas serão adicionadas dinamicamente aqui -->
      </ul>
    </div>
  </div>
  <!--
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card mb-5 bg-dark box-rounded text-white">
            <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h1 class="mt-4">Gestor de Tarefas</h1>
                <h2>Adicionar/Editar Tarefa</h2>
                <form class="mt-4" id="taskForm">
                  <div class="form-outline form-white mb-4">
                    <input type="text" id="taskName" class="form-control" placeholder="Nome da tarefa" required>
                  </div>
                  <div class="form-outline form-white mb-4">
                    <select id="category" class="form-select" required>
                      <option selected disabled value="">--Selecione a categoria--</option>
                      <option value="Trabalho">Trabalho</option>
                      <option value="Estudo">Estudo</option>
                      <option value="Lazer">Lazer</option>
                    </select>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="date" id="startDate" class="form-control" placeholder="Data de Início" required>
                  </div>
                  <div class="form-outline form-white mb-4">
                    <input type="date" id="completionDate" class="form-control" placeholder="Data de Conclusão"
                      required>
                  </div>
                  <div class="form-outline form-white mb-4">
                    <textarea rows="3" maxlength="200" type="text" id="taskDescription" class="form-control"
                      placeholder="Descrição da tarefa" style="resize: none;"></textarea>
                  </div>

                  <button type="submit" id="submitButton" class="btn btn-success text-light"><i class="fas fa-plus"></i>
                    Adicionar</button>
                  <-- <input type="hidden" name="form-logged" value="1" /> --
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
-->

  <script src="../scripts/custom/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
