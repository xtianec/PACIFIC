$(function () {
  const base = window.BASE_URL;
  const ctrl = 'UsuarioRolController.php';
  const table = $('#tblUsuarioRol').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formUsuarioRol')[0].reset();
    $('#modalUsuarioRol').modal('show');
  });
});
