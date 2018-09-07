<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>LIST OF CHURCH MEMBERS</h2>
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
      <form method="post" action="addElement">
        <input type="hidden" name="table" value="membre">
        <input type="submit" name="newSpending" class="btn btn-success pull-right" value="Add Church Member">
      </form>
      <table id="datatable" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Degree</th>
            <th>Full Name</th>
            <th>Contact</th>
            <th>Localisation</th>
            <th>Salary</th>
            <th>Entrance Date</th>
            <?php if($_SESSION['authorizationsdioamkpàaç_rsslnf'] == 99) : ?>
              <th>Actions</th>
            <?php endif; ?>
          </tr>
        </thead>

        <tbody>
          <?php foreach($membres as $v) : ?>
          <?php $degree = $this->loadModel('degree')->find($v->degree); ?>

            <tr>
              <td><em><b><?= $degree->nom; ?></b></em></td>
              <td><?= $v->full_name; ?></td>
              <td><?= $v->phone; ?></td>
              <td><?= $v->localisation; ?></td>
              <td><?= $v->salary; ?></td>
              <td><?= $v->entrance_date; ?></td>
              <?php if($_SESSION['authorizationsdioamkpàaç_rsslnf'] == 99) : ?>
                <td class="noDisturb">
                  <form class="inline" method="post" action="modElement">
                    <input type="hidden" name="table" value="membre" />
                    <input type="hidden" name="id" value="<?= $v->id; ?>" />
                    <button type="submit" id="mod" class="act" name="modMembre"><span class="fa fa-edit"></span> Edit</button>
                  </form>
                    <form class="inline" method="post" action="delElement">
                      <input type="hidden" name="table" value="membre" />
                      <input type="hidden" name="id" value="<?= $v->id; ?>" />
                      <button type="submit" id="supp" class="act" name="delMembre"><span class="fa fa-times"></span> Delete</button>
                    </form>
                </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
