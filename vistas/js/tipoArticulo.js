$(function () {
  const base = window.BASE_URL;
  const ctrl = 'TipoArticuloController.php';
  const table = $('#tblTipoArticulo').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formTipoArticulo')[0].reset();
    $('#modalTipoArticulo').modal('show');
  });
});
