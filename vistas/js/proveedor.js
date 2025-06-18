$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ProveedorController.php';
  const table = $('#tblProveedor').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formProveedor')[0].reset();
    $('#modalProveedor').modal('show');
  });
});
