$(function () {
  const base = window.BASE_URL;
  const ctrl = 'TipoServicioController.php';
  const table = $('#tblTipoServicio').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formTipoServicio')[0].reset();
    $('#modalTipoServicio').modal('show');
  });
});
