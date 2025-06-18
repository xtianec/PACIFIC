$(function () {
  const base = window.BASE_URL;
  const ctrl = 'SublineaController.php';
  const table = $('#tblSublinea').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formSublinea')[0].reset();
    $('#modalSublinea').modal('show');
  });
});
