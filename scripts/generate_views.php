<?php
$controllerDir = __DIR__ . '/../controlador';
$viewDir = __DIR__ . '/../vistas';
$jsDir = __DIR__ . '/../js';

foreach (glob("$controllerDir/*Controller.php") as $file) {
    $base = basename($file, 'Controller.php');
    $viewPath = "$viewDir/" . lcfirst($base) . ".php";
    $jsPath = "$jsDir/" . lcfirst($base) . ".js";

    if (!file_exists($viewPath)) {
        $pageTitle = trim(preg_replace('/([A-Z])/', ' $1', $base));
        $pageTitle = ucwords($pageTitle);
        $lower = lcfirst($base);
        $view = <<<PHP
<?php \$pageTitle = '$pageTitle'; ?>
<div class="page-wrapper">
  <div class="container-fluid pt-4">
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><?= \$pageTitle ?></h3>
      </div>
      <div class="col-md-7 align-self-center">
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="<?= APP_URL ?>">Inicio</a></li>
          <li class="breadcrumb-item active"><?= \$pageTitle ?></li>
        </ol>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <button id="btnNuevo" class="btn btn-success mb-3">
          <i class="fa fa-plus"></i> Nuevo
        </button>
        <div class="table-responsive">
          <table id="tbl{$base}" class="table color-table inverse-table" style="width:100%">
            <thead id="tblHead" style="background-color: #2A3E52; color: white;"></thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal{$base}" tabindex="-1">
      <div class="modal-dialog">
        <form id="form{$base}" class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Nuevo {$pageTitle}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" id="formFields"></div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-light">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>window.BASE_URL = '';</script>
<script src="js/{$lower}.js"></script>
PHP;
        file_put_contents($viewPath, $view);
    }

    if (!file_exists($jsPath)) {
        $lower = lcfirst($base);
        $js = <<<JS
$(function () {
  const base = window.BASE_URL;
  const ctrl = '{$base}Controller.php';
  const table = $('#tbl{$base}').DataTable({
    ajax: {
      url: base + 'controlador/' + ctrl + '?op=listar',
      type: 'GET',
      dataSrc: function (json) {
        const data = json.data || json.aaData || [];
        if (data.length && $('#tblHead').children().length === 0) {
          const headers = Object.keys(data[0]).map(k => `<th>\${k}</th>`).join('');
          $('#tblHead').html('<tr>' + headers + '</tr>');
        }
        return data;
      }
    }
  });

  $('#btnNuevo').click(() => {
    $('#form{$base}')[0].reset();
    $('#modal{$base}').modal('show');
  });
});
JS;
        file_put_contents($jsPath, $js);
    }
}
