
$(document).ready(function () {
    $('.delete-form').on('submit', function (e) {
      e.preventDefault();
      var form = this;
      $.confirm({
        title: 'Confirmación',
        icon: 'fa fa-exclamation-triangle',
        content: '¿Estás seguro de que deseas eliminar?',
        theme: 'Modern',
        type: 'red',
        buttons: {
          confirmar: {
            text: 'Sí, eliminar',
            btnClass: 'btn-red',
            action: function () {
              form.submit();
            }
          },
          cancelar: {
            text: 'Cancelar',
            action: function () {
              // No se realiza ninguna acción
            }
          }
        }
      });
    });
  });