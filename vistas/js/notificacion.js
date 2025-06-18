$(function () {
  const base = window.BASE_URL;
  const ctrl = 'NotificacionController.php';
  const table = $('#tblNotificacion').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formNotificacion')[0].reset();
    $('#modalNotificacion').modal('show');
  });
});
