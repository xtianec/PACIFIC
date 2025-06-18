$(function () {
  const base = window.BASE_URL;
  const ctrl = 'ProgramacionServiciosTecnicosController.php';
  const table = $('#tblProgramacionServiciosTecnicos').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formProgramacionServiciosTecnicos')[0].reset();
    $('#modalProgramacionServiciosTecnicos').modal('show');
  });
});
