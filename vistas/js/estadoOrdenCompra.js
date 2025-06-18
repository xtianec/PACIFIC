$(function () {
  const base = window.BASE_URL;
  const ctrl = 'EstadoOrdenCompraController.php';
  const table = $('#tblEstadoOrdenCompra').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: 'data'
    }
  });

  $('#btnNuevo').click(() => {
    $('#formEstadoOrdenCompra')[0].reset();
    $('#modalEstadoOrdenCompra').modal('show');
  });
});
