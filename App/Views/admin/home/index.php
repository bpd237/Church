<?php if(isset($success)) : ?>
  <div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?= $success; ?>
  </div>
<?php endif; ?>

<?php
  $eTotal = 0;
  $sTotal = 0;
?>

<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>LOGS <small><em>All entries and spending log the today ...</em></small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a></li>
              <li><a href="#">Settings 2</a></li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>ENTRIES LOG <small><em>All entries log of today ...</em></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a></li>
                    <li><a href="#">Settings 2</a></li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <ul class="list">
                <?php foreach($transactions as $v) : ?>
                  <?php $categorie = $categories[$v->id_categorie-1]; ?>
                  <?php $type = $this->loadModel('categorie_parent')->find($categorie->id_categorie_parent); ?>
                  <?php if($type == 'entree') : ?>
                    <li class='list-item'><b><?= $v->montant; ?></b> <em><?= $categories[$v->id_categorie-1]->nom; ?></em><span class="pull-right colored">(<?= $v->date; ?>)</span></li>
                    <?php $eTotal += $v->montant; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <li class="list-item list-total"><b>TOTAL : </b><span class="pull-right"><?= $eTotal; ?></span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>SPENDING LOG <small><em>All spending log of today ...</em></small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a></li>
                    <li><a href="#">Settings 2</a></li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <ul class="list">
                <?php foreach($transactions as $v) : ?>
                  <?php $categorie = $categories[$v->id_categorie-1]; ?>
                  <?php $type = $this->loadModel('categorie_parent')->find($categorie->id_categorie_parent); ?>
                  <?php if($type == 'sortie') : ?>
                    <li class='list-item'><b><?= $v->montant; ?></b> <em><?= $categories[$v->id_categorie-1]->nom; ?></em><span class="pull-right colored">(<?= $v->date; ?>)</span></li>
                    <?php $sTotal += $v->montant; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <li class="list-item list-total"><b>TOTAL : </b><span class="pull-right"><?= $sTotal; ?></span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>