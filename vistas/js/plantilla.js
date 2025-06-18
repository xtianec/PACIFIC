$(function () {
  const base = window.BASE_URL;
  const ctrl = 'PlantillaController.php';
  const table = $('#tblPlantilla').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formPlantilla')[0].reset();
    $('#modalPlantilla').modal('show');
  });
});
