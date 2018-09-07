<?php

  $filter = isset($_POST['parent']) ? $_POST['parent'] : 'all';
?>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>ALL SUB CATEGORIES</h2>
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
    <div class="x_content">
      <?php if(isset($err)) : ?>
        <div class="alert alert-danger alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?= $err; ?>
        </div>
      <?php endif; ?>
      <?php if(isset($success)) : ?>
        <div class="alert alert-success alert-dismissible fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?= $success; ?>
        </div>
      <?php endif; ?>
      <?php $balance = 0; ?>
      <?php $parents = $this->loadModel('categorie_parent')->all(); ?>
            
      <h3 style="font-family: forte; text-align: center;">Choose Category Filter <small style="font-family: script">(All by default)</small></h3>
      <form class="form-horizontal form-label-left input_mask special_form" method="post" action="">
        <div class="col-md-4 col-md-offset-3">
          <span class ='form-control-feedback left fa fa-code-fork'></span>
          <select name="parent" class="form-control" style="padding: 0 42px">
            <option value="all">all</option>
            <?php foreach($parents as $v) : ?>
              <?php if($filter == $v->id) : ?>
                <option value="<?= $v->id; ?>" selected><?= $v->nom; ?></option>
              <?php else : ?>
                <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-1"><?= $form->submit('submit', 'Show', 'btn-info', 'submit'); ?></div>
        <div class="col-md-1"><button id='printButton' value="print" class="btn btn-warning"><i class="fa fa-print"></i> Print</button> </div>
      </form>
      <form method="post" action="addElement">
        <input type="hidden" name="table" value="categorie">
        <input type="submit" name="newSpending" class="btn btn-success pull-right" value="Add Category">
      </form>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Category Name</th>
            <th>Parent</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($categories as $v) : ?>
            <?php $parent = $this->loadModel('categorie_parent')->find($v->id_categorie_parent); ?>
            <?php if($filter != 'all') : ?>
              <?php if($parent->id == $filter) : ?>
                <tr>
                  <td><?= $v->nom; ?></td>
                  <td><?= $parent->nom; ?></td>
                  <td><?= $v->description; ?></td>
                  <td class="noDisturb">
                    <form class="inline" method="post" action="modElement">
                      <input type="hidden" name="table" value="categorie" />
                      <input type="hidden" name="id" value="<?= $v->id; ?>" />
                      <button type="submit" id="mod" class="act" name="modCategorie"><span class="fa fa-edit"></span> Edit</button>
                    </form>
                  </td>
                </tr>
              <?php endif; ?>
            <?php else : ?>
              <tr>
                <td><?= $v->nom; ?></td>
                <td><?= $parent->nom; ?></td>
                <td><?= $v->description; ?></td>
                <td class="noDisturb">
                  <form class="inline" method="post" action="modElement">
                    <input type="hidden" name="table" value="categorie" />
                    <input type="hidden" name="id" value="<?= $v->id; ?>" />
                    <button type="submit" id="mod" class="act" name="modCategorie"><span class="fa fa-edit"></span> Edit</button>
                  </form>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
