$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EstadoCotizacionController.php';
  const table = $('#tblEstadoCotizacion').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEstadoCotizacion')[0].reset();
    $('#modalEstadoCotizacion').modal('show');
  });
});
