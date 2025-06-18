$(function () {
  const base = window.BASE_URL;
  const ctrl = 'GuiaRemModalidadController.php';
  const table = $('#tblGuiaRemModalidad').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formGuiaRemModalidad')[0].reset();
    $('#modalGuiaRemModalidad').modal('show');
  });
});
