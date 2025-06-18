$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EquipoTipoController.php';
  const table = $('#tblEquipoTipo').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEquipoTipo')[0].reset();
    $('#modalEquipoTipo').modal('show');
  });
});
