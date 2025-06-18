$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EquipoController.php';
  const table = $('#tblEquipo').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEquipo')[0].reset();
    $('#modalEquipo').modal('show');
  });
});
