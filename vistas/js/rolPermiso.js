$(function () {
  const base = window.BASE_URL;
  const ctrl = 'RolPermisoController.php';
  const table = $('#tblRolPermiso').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formRolPermiso')[0].reset();
    $('#modalRolPermiso').modal('show');
  });
});
