$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ContactoController.php';
  const table = $('#tblContacto').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formContacto')[0].reset();
    $('#modalContacto').modal('show');
  });
});
