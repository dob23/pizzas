$(document).ready(function() {
    $('.rol-select').on('change', function() {
      const userId = $(this).data('id');
      const newRole = $(this).val();

      $.ajax({
        url: `/usuarios/${userId}/rol`,
        type: 'PUT',
        data: {
          role: newRole,
          _token: '{{ csrf_token() }}'
        },
        success: function(response) {
          $.alert("Rol actualizado correctamente");
        },
        error: function(xhr) {
          $.alert("Error al actualizar el rol");
        }
      });
    });
  });