$(function () {
  const base = window.BASE_URL;
  const ctrl = 'CondicionPagoController.php';
  const table = $('#tblCondicionPago').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formCondicionPago')[0].reset();
    $('#modalCondicionPago').modal('show');
  });
});
