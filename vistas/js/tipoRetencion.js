$(function () {
  const base = window.BASE_URL;
  const ctrl = 'TipoRetencionController.php';
  const table = $('#tblTipoRetencion').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formTipoRetencion')[0].reset();
    $('#modalTipoRetencion').modal('show');
  });
});
