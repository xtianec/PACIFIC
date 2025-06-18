$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ClienteController.php';
  function initTable(data) {
    return $('#tblCliente').DataTable({
      data: data,
      responsive: true
    });
  }

  $.getJSON(base + 'controlador/' + ctrl + '?op=listar', function (json) {
    const data = json.data || json.aaData || [];
    if (data.length && $('#tblHead').children().length === 0) {
      const headers = Object.keys(data[0]).map(k => `<th>${k}</th>`).join('');
      $('#tblHead').html('<tr>' + headers + '</tr>');
    }
    initTable(data);
  });

  $('#btnNuevo').click(() => {
    $('#formCliente')[0].reset();
    $('#modalCliente').modal('show');
  });
});
