$(function () {
  const base = window.BASE_URL;
  const ctrl = 'UnidadMedidaController.php';
  const table = $('#tblUnidadMedida').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formUnidadMedida')[0].reset();
    $('#modalUnidadMedida').modal('show');
  });
});
