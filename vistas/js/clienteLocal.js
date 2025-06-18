$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ClienteLocalController.php';
  const table = $('#tblClienteLocal').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formClienteLocal')[0].reset();
    $('#modalClienteLocal').modal('show');
  });
});
