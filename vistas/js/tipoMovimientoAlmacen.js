$(function () {
  const base = window.BASE_URL;
  const ctrl = 'TipoMovimientoAlmacenController.php';
  const table = $('#tblTipoMovimientoAlmacen').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formTipoMovimientoAlmacen')[0].reset();
    $('#modalTipoMovimientoAlmacen').modal('show');
  });
});
