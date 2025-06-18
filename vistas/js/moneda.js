$(function () {
  const base = window.BASE_URL;
  const ctrl = 'MonedaController.php';

  const table = $('#tblMoneda').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formMoneda')[0].reset();
    $('#modalMoneda').modal('show');
  });
});
