<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>ADD NEW USER <small>Form for adding a new user</small></h2>
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
            $username = !empty($value) ? $value->username : '';
            $password = !empty($value) ? $value->password : '';
            $level = !empty($value) ? $value->level : '';
            $contact = !empty($value) ? $value->contact : '';
            $localisation = !empty($value) ? $value->localisation : '';
            $profession = !empty($value) ? $value->profession : '';
            $id = !empty($value) ? $value->id : '';
          ?>

          <input type="hidden" name="table" value="user">
          <input type="hidden" name="id" value="<?= $id; ?>">
          <input type="hidden" name="oldName" value="<?= $username; ?>">

          <?= $form->input('full_name', 'tag', 'text', '', '', $full_name, 'User FullName'); ?>
          <?= $form->input('username', 'user', 'text', '', '', $username, 'Identification'); ?>
          <?php if(empty($value)) : ?>
            <?= $form->input('password', 'key', 'password', '', '', $password, 'Password'); ?>
          <?php endif; ?>

          <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <span class ='form-control-feedback left fa fa-lock '></span>
            <select name="level" class="form-control" style="padding: 0 42px">
              <option>Select Level ...</option>
              <?php if(!empty($value)) : ?>
                <?php if($value->level == 'administrator') : ?>
                  <option value="administrator" selected>Full Control</option>
                  <option value="manager">Limited Control</option>
                <?php elseif($value->level == 'manager') : ?>
                  <option value="administrator">Full Control</option>
                  <option value="manager" selected>Limited Control</option>
                <?php endif; ?>
              <?php else : ?>
                <option value="administrator">Full Control</option>
                <option value="manager">Limited Control</option>
              <?php endif; ?>
            </select>
          </div>

          <?= $form->input('contact', 'phone', 'text', '', '', $contact, 'Contact'); ?>
          <?= $form->input('localisation', 'map-marker', 'text', '', '', $localisation, 'Localisation'); ?>
          <?= $form->input('profession', 'tasks', 'text', '', '', $profession, 'Profession'); ?>
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <?php $action = isset($old) ? 'Edit' : 'Add'; ?>
              <?php $name = isset($old) ? 'modUser' : 'addUser'; ?>
              
              <?= $form->submit('reset', 'Reset', 'btn-default', 'reset'); ?>
              <?= $form->submit($name, $action, 'btn-success'); ?>
            </div>
          </div>

        </form>
      </div>
    </div>
</div>