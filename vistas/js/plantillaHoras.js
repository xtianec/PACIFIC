$(function () {
  const base = window.BASE_URL;
  const ctrl = 'PlantillaHorasController.php';
  const table = $('#tblPlantillaHoras').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formPlantillaHoras')[0].reset();
    $('#modalPlantillaHoras').modal('show');
  });
});
