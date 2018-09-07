<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>ADD NEW CATEGORY <small>Form for adding a new category of spending fund</small></h2>
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
            $description = !empty($value) ? $value->description : '';
            $id = !empty($value) ? $value->id : '';

            $parents = $this->loadModel('categorie_parent')->all();
          ?>

          <input type="hidden" name="table" value="categorie">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <input type="hidden" name="oldName" value="<?= $nom; ?>">

          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <span class ='form-control-feedback left fa fa-user'></span>
            <select name="id_categorie_parent" class="form-control" style="padding: 0 42px">
              <?php foreach($parents as $v) : ?>
                <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <?= $form->input('nom', 'code-fork', 'text', '', '', $nom, 'Category Name'); ?>
          <?= $form->input('description', 'pencil', 'text', '', '', $description, 'Description'); ?>
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <?php $action = isset($old) ? 'Edit' : 'Add'; ?>
              <?php $name = isset($old) ? 'modCategorie' : 'addCategorie'; ?>
              
              <?= $form->submit('reset', 'Reset', 'btn-default', 'reset'); ?>
              <?= $form->submit($name, $action, 'btn-success'); ?>
            </div>
          </div>

        </form>
      </div>
    </div>
</div>