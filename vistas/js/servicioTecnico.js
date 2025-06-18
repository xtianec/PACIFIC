$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ServicioTecnicoController.php';
  const table = $('#tblServicioTecnico').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formServicioTecnico')[0].reset();
    $('#modalServicioTecnico').modal('show');
  });
});
