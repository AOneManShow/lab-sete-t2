(function($) {
    'use strict';
    $(function() {
      var todoListItem = $('.todo-list');
      var todoListInput = $('.todo-list-input');
      $('.todo-list-add-btn').on("click", function(event) {
        event.preventDefault();
  
        var item = $(this).prevAll('.todo-list-input').val();
  
        if (item) {
          todoListItem.append("<li><div class='form-check'><label class='form-check-label'><input class='checkbox' type='checkbox'/>" + item + "<i class='input-helper'></i></label></div><i class='remove mdi mdi-close-circle-outline'></i></li>");
          todoListInput.val("");
        }
  
      });
  
      todoListItem.on('change', '.checkbox', function() {
        if ($(this).attr('checked')) {
          $(this).removeAttr('checked');
        } else {
          $(this).attr('checked', 'checked');
        }
  
        $(this).closest("li").toggleClass('completed');
  
      });
  
      todoListItem.on('click', '.remove', function() {
        $(this).parent().remove();
      });
  
    });
  })(jQuery);
/*
  function addCategorias(){
    var corpo = document.getElementById("corpo_documento");
    corpo.append(""
    +"<div class='col-md-12 col-xl-4 grid-margin stretch-card'>"
      +"<div class='card'>"
        +"<div class='card-body'>"
          +"<h4 class='card-title'>Categoria Dinâmica</h4>"
          +"<div class='add-items d-flex'>"
            +"<input type='text' class='form-control todo-list-input' placeholder='Nova tarefa...'>"
            +"<button class='add btn btn-primary todo-list-add-btn'>Adicionar</button>"
          +"</div>"
          +"<div class='list-wrapper'>"
            +"<ul class='d-flex flex-column-reverse text-white todo-list todo-list-custom'></ul>"
          +"</div>"
        +"</div>"
      +"</div>"
    +"</div>"
    );
  }
  var botaoAddCat = document.getElementById("criarCategoria");
  botaoAddCat.addEventListener("click", addCategorias);
  */
