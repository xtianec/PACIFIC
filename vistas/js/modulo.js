$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ModuloController.php';
  const table = $('#tblModulo').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formModulo')[0].reset();
    $('#modalModulo').modal('show');
  });
});
