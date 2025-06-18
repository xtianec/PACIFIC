$(function () {
  const base = window.BASE_URL;
  const ctrl = 'UsuarioController.php';
  const table = $('#tblUsuario').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formUsuario')[0].reset();
    $('#modalUsuario').modal('show');
  });
});
