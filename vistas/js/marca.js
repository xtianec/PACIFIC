$(function () {
  const base = window.BASE_URL;
  const ctrl = 'MarcaController.php';
  const table = $('#tblMarca').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formMarca')[0].reset();
    $('#modalMarca').modal('show');
  });
});
