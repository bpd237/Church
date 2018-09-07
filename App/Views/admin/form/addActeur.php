<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>ADD NEW Actor <small>Form for adding a new actor in database</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a></li>
              <li><a href="#">Settings 2</a></li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content"><br />
        <form class="form-horizontal form-label-left input_mask" method="post" action="__controlElement">

          <?php 
            $value = isset($old) ? $old : '';
            $nom = !empty($value) ? $value->nom : '';
            $localisation = !empty($value) ? $value->localisation : '';
            $type = !empty($value) ? $value->type : '';
            $profession = !empty($value) ? $value->profession : '';
          ?>

          <input type="hidden" name="table" value="acteur">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <input type="hidden" name="oldName" value="<?= $nom; ?>">

          <?= $form->input('nom', 'user', 'text', '', '', $nom, 'Actor Full Name'); ?>
          <?= $form->input('localisation', 'map-marker', 'text', '', '', $localisation, 'Actor Localisation'); ?>
          <?= $form->input('type', 'sort', 'text', '', '', $type, 'Actor Type'); ?>
          <?= $form->input('profession', 'briefcase', 'text', '', '', $profession, 'Actor Profession'); ?>
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <?php $action = isset($old) ? 'Edit' : 'Add'; ?>
              <?php $name = isset($old) ? 'modActeur' : 'addActeur'; ?>
              
              <?= $form->submit('reset', 'Reset', 'btn-default', 'reset'); ?>
              <?= $form->submit($name, $action, 'btn-success'); ?>
            </div>
          </div>

        </form>
      </div>
    </div>
</div>