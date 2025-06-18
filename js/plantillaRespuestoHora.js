$(function () {
  const base = window.BASE_URL;
  const ctrl = 'PlantillaRespuestoHoraController.php';
  const table = $('#tblPlantillaRespuestoHora').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: function (json) {
        const data = json.data || json.aaData || [];
        if (data.length && $('#tblHead').children().length === 0) {
          const headers = Object.keys(data[0]).map(k => `<th>${k}</th>`).join('');
          $('#tblHead').html('<tr>' + headers + '</tr>');
        }
        return data;
      }
    }
  });

  $('#btnNuevo').click(() => {
    $('#formPlantillaRespuestoHora')[0].reset();
    $('#modalPlantillaRespuestoHora').modal('show');
  });
});
