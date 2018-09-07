<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>ADD NEW CHURCH MEMBER <small>Form for adding a new church member</small></h2>
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
            $full_name = !empty($value) ? $value->full_name : '';
            $degree = !empty($value) ? $value->degree : '';
            $phone = !empty($value) ? $value->phone : '';
            $localisation = !empty($value) ? $value->localisation : '';
            $salary = !empty($value) ? $value->salary : '';
            $profession = !empty($value) ? $value->profession : '';
            $date = !empty($value) ? $value->date : '';
            $id = !empty($value) ? $value->id : '';

            $degrees = $this->loadModel('degree')->all();;
            $nbrDegrees = count($degrees);
          ?>

          <input type="hidden" name="table" value="membre">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <input type="hidden" name="oldName" value="<?= $full_name; ?>">

          <?= $form->input('full_name', 'tag', 'text', '', '', $full_name, 'User FullName'); ?>

          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <span class ='form-control-feedback left fa fa-lock '></span>
            <select name="degree" class="form-control" style="padding: 0 42px">
              <option>Select Degree ...</option>
              <?php for($i = 0; $i < $nbrDegrees; $i++) : ?>
                <?php if(!empty($value)) : ?>
                  <?php if($degrees[$i]->id == $value->id_degree) : ?>
                    <option value="<?= $degrees[$i]->id ?>" selected ><?= $degrees[$i]->nom ?></option>
                  <?php else : ?>
                    <option value="<?= $degrees[$i]->id ?>"><?= $degrees[$i]->nom ?></option>
                  <?php endif; ?>
                <?php else : ?>
                  <option value="<?= $degrees[$i]->id ?>"><?= $degrees[$i]->nom ?></option>
                <?php endif; ?>
              <?php endfor; ?>
            </select>
          </div>

          <?= $form->input('phone', 'phone', 'text', '', '', $phone, 'Contact'); ?>
          <?= $form->input('localisation', 'map-marker', 'text', '', '', $localisation, 'Localisation'); ?>
          <?= $form->input('salary', 'money', 'text', '', '', $salary, 'Salary'); ?>
          <?= $form->input('profession', 'tasks', 'text', '', '', $profession, 'Profession'); ?>
          <?= $form->input('date', 'calendar', 'date', '', '', $date, 'Entrance Date'); ?>
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <?php $action = isset($old) ? 'Edit' : 'Add'; ?>
              <?php $name = isset($old) ? 'modMembre' : 'addMembre'; ?>
              
              <?= $form->submit('reset', 'Reset', 'btn-default', 'reset'); ?>
              <?= $form->submit('addDegree', '+ Degree', 'btn-info'); ?>
              <?= $form->submit($name, $action, 'btn-success'); ?>
            </div>
          </div>

        </form>
      </div>
    </div>
</div>