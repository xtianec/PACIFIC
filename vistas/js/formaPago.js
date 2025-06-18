$(function () {
  const base = window.BASE_URL;
  const ctrl = 'FormaPagoController.php';
  const table = $('#tblFormaPago').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formFormaPago')[0].reset();
    $('#modalFormaPago').modal('show');
  });
});
