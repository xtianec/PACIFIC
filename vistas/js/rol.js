$(function () {
  const base = window.BASE_URL;
  const ctrl = 'RolController.php';
  const table = $('#tblRol').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formRol')[0].reset();
    $('#modalRol').modal('show');
  });
});
