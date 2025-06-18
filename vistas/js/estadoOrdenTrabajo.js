$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EstadoOrdenTrabajoController.php';
  const table = $('#tblEstadoOrdenTrabajo').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEstadoOrdenTrabajo')[0].reset();
    $('#modalEstadoOrdenTrabajo').modal('show');
  });
});
