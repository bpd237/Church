<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>ADD NEW TRANSACTION <small>Form for adding a new transaction on database</small></h2>
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
            $id_categorie = !empty($value) ? $value->id_categorie : '';
            $nom = !empty($value) ? $value->nom : '';
            $description = !empty($value) ? $value->description : '';
            $montant = !empty($value) ? $value->montant : '';
            $id_acteur = !empty($value) ? $value->id_acteur : '';
            $date = !empty($value) ? $value->date : date('y/m/d');
            $id = !empty($value) ? $value->id : '';

            $categories = $this->loadModel('categorie')->all();;
            $nbrCategories = count($categories);

            $acteurs = $this->loadModel('acteur')->all();
            $nbrActeurs = $this->loadModel('acteur')->nbr();
          ?>

          <input type="hidden" name="table" value="transaction">
          <input type="hidden" name="id" value="<?= $id; ?>">

          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <span class ='form-control-feedback left fa fa-user'></span>
            <select name="id_acteur" class="form-control" style="padding: 0 42px">
              <option value="0">Choose Actor ...</option>
              <?php for($i = 0; $i < $nbrActeurs[0]->nbr; $i++) : ?>
                <?php if(!empty($value)) : ?>
                  <?php if($acteurs[$i]->id == $value->id_acteur) : ?>
                    <option value="<?= $acteurs[$i]->id ?>" selected ><?= $acteurs[$i]->nom ?></option>
                  <?php else : ?>
                    <option value="<?= $acteurs[$i]->id ?>"><?= $acteurs[$i]->nom ?></option>
                  <?php endif; ?>
                <?php else : ?>
                  <option value="<?= $acteurs[$i]->id ?>"><?= $acteurs[$i]->nom ?></option>
                <?php endif; ?>
              <?php endfor; ?>
            </select>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <span class ='form-control-feedback left fa fa-cogs'></span>
            <select name="id_categorie" class="form-control" style="padding: 0 42px">
              <option value="0">Choose Category ...</option>
              <?php for($i = 0; $i < $nbrCategories; $i++) : ?>
                <?php if(!empty($value)) : ?>
                  <?php if($categories[$i]->id == $value->id_categorie) : ?>
                    <option value="<?= $categories[$i]->id ?>" selected ><?= $categories[$i]->nom ?></option>
                  <?php else : ?>
                    <option value="<?= $categories[$i]->id ?>"><?= $categories[$i]->nom ?></option>
                  <?php endif; ?>
                <?php else : ?>
                  <option value="<?= $categories[$i]->id ?>"><?= $categories[$i]->nom ?></option>
                <?php endif; ?>
              <?php endfor; ?>
            </select>
          </div>

          <?= $form->input('nom', 'user', 'text', '', '', $nom, 'Name of transaction'); ?>
          <?= $form->input('description', 'pencil', 'text', '', '', $description, 'Description'); ?>
          <?= $form->input('montant', 'money', 'number', '', '', $montant, 'Amount'); ?>
          <?= $form->input('date', 'calendar', 'date', '', '', $date, 'Date'); ?>
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <?php $action = isset($old) ? 'Edit' : 'Add'; ?>
              <?php $name = isset($old) ? 'modTransaction' : 'addTransaction'; ?>
              
              <?= $form->submit('reset', 'Reset', 'btn-default', 'reset'); ?>
              <?= $form->submit('addActor', '+ Actor', 'btn-info'); ?>
              <?= $form->submit('addCategory', '+ Category', 'btn-info'); ?>
              <?= $form->submit($name, $action, 'btn-success'); ?>
            </div>
          </div>

        </form>
      </div>
    </div>
</div>