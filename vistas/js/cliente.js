$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ClienteController.php';

  const table = $('#tblCliente').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formCliente')[0].reset();
    $('#modalCliente').modal('show');
  });
});
