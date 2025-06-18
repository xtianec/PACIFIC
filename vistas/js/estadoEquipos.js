$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EstadoEquiposController.php';
  const table = $('#tblEstadoEquipos').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEstadoEquipos')[0].reset();
    $('#modalEstadoEquipos').modal('show');
  });
});
