$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ClienteContactoController.php';
  const table = $('#tblClienteContacto').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formClienteContacto')[0].reset();
    $('#modalClienteContacto').modal('show');
  });
});
