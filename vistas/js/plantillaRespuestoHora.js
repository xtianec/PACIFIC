$(function () {
  const base = window.BASE_URL;
  const ctrl = 'PlantillaRespuestoHoraController.php';
  const table = $('#tblPlantillaRespuestoHora').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formPlantillaRespuestoHora')[0].reset();
    $('#modalPlantillaRespuestoHora').modal('show');
  });
});
