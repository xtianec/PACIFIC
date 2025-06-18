$(function () {
  const base = window.BASE_URL;
  const ctrl = 'PermisoController.php';
  const table = $('#tblPermiso').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formPermiso')[0].reset();
    $('#modalPermiso').modal('show');
  });
});
