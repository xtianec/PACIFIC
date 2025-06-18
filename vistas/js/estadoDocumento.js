$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EstadoDocumentoController.php';
  const table = $('#tblEstadoDocumento').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEstadoDocumento')[0].reset();
    $('#modalEstadoDocumento').modal('show');
  });
});
