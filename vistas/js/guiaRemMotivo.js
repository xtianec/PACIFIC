$(function () {
  const base = window.BASE_URL;
  const ctrl = 'GuiaRemMotivoController.php';
  const table = $('#tblGuiaRemMotivo').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formGuiaRemMotivo')[0].reset();
    $('#modalGuiaRemMotivo').modal('show');
  });
});
