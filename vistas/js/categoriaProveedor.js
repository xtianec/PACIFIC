$(function () {
  const base = window.BASE_URL;
  const ctrl = 'CategoriaProveedorController.php';

  const table = $('#tblCategoriaProveedor').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formCategoriaProveedor')[0].reset();
    $('#modalCategoriaProveedor').modal('show');
  });
});
