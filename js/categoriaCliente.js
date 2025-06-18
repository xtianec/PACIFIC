$(function () {
  const base = window.BASE_URL;

  const tabla = $('#tbllistadoCategories').DataTable({
    dom: '<"row"<"col-md-6"B><"col-md-6"f>>'
      + '<"row"<"col-md-12"tr>>'
      + '<"row"<"col-md-5"i><"col-md-7"p>>',
    buttons: [
      { extend: 'copy', className: 'btn btn-secondary' },
      { extend: 'csv', className: 'btn btn-secondary' },
      { extend: 'excel', className: 'btn btn-secondary' },
      { extend: 'print', className: 'btn btn-secondary' }
    ],
    language: {
      paginate: { previous: '<i class="fa fa-chevron-left"></i>', next: '<i class="fa fa-chevron-right"></i>' },
      info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
      search: '<i class="fa fa-search"></i>',
      searchPlaceholder: "Buscar...",
      lengthMenu: "Mostrar _MENU_ registros"
    },
    lengthMenu: [10, 25, 50], pageLength: 10,
    ajax: {
      url: base + 'controlador/CategoriaClienteController.php?op=listar',
      type: 'GET',
      dataType: 'json',
      dataSrc: function (json) {
        console.log('Listado JSON:', json);
        return json.data;
      },
      error: function (xhr) {
        console.error('Ajax error:', xhr.responseText);
        alert('Error al cargar listado, mira la consola.');
      }
    },
    order: [[0, 'desc']],
    columns: [
      { data: 0 },
      { data: 1 },
      { data: 2 },
      { data: 3 },
      { data: 4 },
      { data: 5 }
    ]
  });

  // Nuevo
  $('#btnNuevo').click(() => {
    $('#formCategoria')[0].reset();
    $('#categoria_id').val('');
    $('#modalCategoria .modal-title').text('Nueva Categoría');
    $('#modalCategoria').modal('show');
  });

  // Guardar / Editar
  $('#formCategoria').submit(function (e) {
    e.preventDefault();
    const op = $('#categoria_id').val() ? 'editar' : 'guardar';
    $.post(
      base + 'controlador/CategoriaClienteController.php?op=' + op,
      $(this).serialize(),
      resp => {
        console.log('Guardar/Editar resp:', resp);
        Swal.fire({ icon: 'success', text: resp });
        $('#modalCategoria').modal('hide');
        tabla.ajax.reload(null, false);
      }
    ).fail((xhr) => {
      console.error('Save error:', xhr.responseText);
      Swal.fire('Error', 'No se pudo guardar', 'error');
    });
  });

  // Editar
  $('#tbllistadoCategories').on('click', '.btn-edit', function () {
    const data = tabla.row($(this).closest('tr')).data();
    $('#categoria_id').val(data[0]);
    $('#categoria_nombre').val(data[1]);
    $('#modalCategoria .modal-title').text('Editar Categoría');
    $('#modalCategoria').modal('show');
  });

  // Desactivar
  $('#tbllistadoCategories').on('click', '.btn-deactivate', function () {
    const id = $(this).data('id');
    Swal.fire({
      title: '¿Desactivar categoría?',
      icon: 'warning',
      showCancelButton: true
    }).then(r => {
      if (r.isConfirmed) {
        $.post(
          base + 'controlador/CategoriaClienteController.php?op=desactivar',
          { id },
          function (resp) {
            if (resp.status === 'success') {
              Swal.fire('¡Hecho!', resp.msg, 'success');
              $('#modalCategoria').modal('hide');
              tabla.ajax.reload(null, false);
            } else {
              Swal.fire('Error', resp.msg, 'error');
            }
          },
          'json'
        );
      }
    });
  });

  // Activar
  $('#tbllistadoCategories').on('click', '.btn-activate', function () {
    const id = $(this).data('id');
    Swal.fire({
      title: '¿Activar categoría?', icon: 'question', showCancelButton: true
    }).then(r => {
      if (r.isConfirmed) {
        $.post(
          base + 'controlador/CategoriaClienteController.php?op=activar',
          { id },
          function (resp) {
            if (resp.status === 'success') {
              Swal.fire('¡Listo!', resp.msg, 'success');
              tabla.ajax.reload(null, false);
            } else {
              Swal.fire('Error', resp.msg, 'error');
            }
          },
          'json'
        );
      }
    });
  });

});