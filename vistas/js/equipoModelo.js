$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EquipoModeloController.php';
  const table = $('#tblEquipoModelo').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEquipoModelo')[0].reset();
    $('#modalEquipoModelo').modal('show');
  });
});
