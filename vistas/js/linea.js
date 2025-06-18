$(function () {
  const base = window.BASE_URL;
  const ctrl = 'LineaController.php';
  const table = $('#tblLinea').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formLinea')[0].reset();
    $('#modalLinea').modal('show');
  });
});
