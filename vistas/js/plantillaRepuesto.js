$(function () {
  const base = window.BASE_URL;
  const ctrl = 'PlantillaRepuestoController.php';
  const table = $('#tblPlantillaRepuesto').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formPlantillaRepuesto')[0].reset();
    $('#modalPlantillaRepuesto').modal('show');
  });
});
