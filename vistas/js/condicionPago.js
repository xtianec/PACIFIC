$(function () {
  const base = window.BASE_URL;
  const ctrl = 'CondicionPagoController.php';
  const table = $('#tblCondicionPago').DataTable({
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
    $('#formCondicionPago')[0].reset();
    $('#modalCondicionPago').modal('show');
  });
});
