<?php
  $initial_date = isset($_POST['initial_date']) ? $_POST['initial_date'] : '0000-00-00';
  $final_date = isset($_POST['final_date']) ? $_POST['final_date'] : '0000-00-00';

  $restart = isset($_POST['restart']) ? $_POST['restart'] : null;
  if(!is_null($restart)) {

    $_POST = null;
    $restart = null;
    header('Location : http://localhost/Workspace_/church/admin/rapport');
  }
?>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>FINANCIAL CHURCH APP MANAGEMENT <small><em>Repports</em></small></h2>
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

      <form class="form-horizontal form-label-left input_mask special_form" method="post" action="">
        <div style="padding: 2% 0;">
          <div class="row">
            <div class="col-md-2"><h4 style="font-family: script" class="pull-right">From </h4></div><div class="col-md-3"><?= $form->input('initial_date', 'calendar', 'date', '', '', $initial_date, 'From', '', '', '', 'required'); ?></div>
            <div class="col-md-2"><h4 style="font-family: script" class="pull-right">To </h4></div><div class="col-md-3"><?= $form->input('final_date', 'calendar', 'date', '', '', $final_date, 'From', '', '', '', 'required'); ?></div>
          </div>

          <?php if(isset($_POST['parent'])) : ?>
            <?php if($_POST['parent'] != 0) : ?>
              <div class="col-md-2"><h4 style="font-family: script" class="pull-right">CATEGORY </h4></div>
              <div class="col-md-3">
                <span class ='form-control-feedback left fa fa-code-fork'></span>
                <select name="parent" class="form-control" style="padding: 0 42px" id="parent" disabled>
                  <option value="0">All</option>
                  <?php foreach($categorie_parents as $v) : ?>
                    <?php if($_POST['parent'] == $v->id) : ?>
                      <option value="<?= $v->id; ?>" selected><?= $v->nom; ?></option>
                    <?php else : ?>
                      <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>

              <input type="hidden" name="id_parent" value="<?=$_POST['parent'] ?>">
              <div class="col-md-2"><h4 style="font-family: script" class="pull-right">SUB-CATEGORY </h4></div>
              <div class="col-md-3">
                <span class ='form-control-feedback left fa fa-code-fork'></span>
                <select name="enfant" class="form-control" style="padding: 0 42px" id="enfant">
                  <option value="0">Show All</option>
                  <?php foreach($categories as $v) : ?>
                    <?php if($v->id_categorie_parent == $_POST['parent']) : ?>
                      <?php if($_POST['enfant'] == $v->id) : ?>
                        <option value="<?= $v->id; ?>" selected><?= $v->nom; ?></option>
                      <?php else : ?>
                        <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-12" style="border-top: solid White 1px; padding-top: 10px; background-color: #ddd; position: relative; top: 10px">
                <div class="col-md-1 col-md-offset-3"><?= $form->submit('submit', 'Show', 'btn-info', 'submit'); ?></div>
                <div class="col-md-2 pull-right"><?= $form->submit('restart', 'Restart', 'btn-danger', 'submit'); ?></div>
              </div>
            <?php else : ?>
              <div class="col-md-2"><h4 style="font-family: script" class="pull-right">CATEGORY </h4></div>
              <div class="col-md-3">
                <span class ='form-control-feedback left fa fa-code-fork'></span>
                <select name="parent" class="form-control" style="padding: 0 42px" id="parent" readonly>
                  <option value="0">All</option>
                  <?php foreach($categorie_parents as $v) : ?>
                    <?php if($_POST['parent'] == $v->id) : ?>
                      <option value="<?= $v->id; ?>" selected><?= $v->nom; ?></option>
                    <?php else : ?>
                      <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-12" style="border-top: solid White 1px; padding-top: 10px; background-color: #ddd; position: relative; top: 10px;">
                <div class="col-md-1 pull-left"><?= $form->submit('type', 'Entree', 'btn-primary', 'submit'); ?></div>
                <div class="col-md-1 pull-left"><?= $form->submit('type', 'Sortie', 'btn-primary', 'submit'); ?></div>
                <div class="col-md-1 pull-left"><?= $form->submit('balance', 'Balance', 'btn-info', 'submit'); ?></div>
                <div class="col-md-2 pull-right"><?= $form->submit('restart', 'Restart', 'btn-danger', 'submit'); ?></div>
                <div class="col-md-1 pull-right"><button id='printButton' value="print" class="btn btn-success"><i class="fa fa-print"></i> Print</button> </div>
              </div>
            <?php endif; ?>
          <?php elseif(isset($_POST['enfant'])) : ?>
            <div class="col-md-2"><h4 style="font-family: script" class="pull-right">CATEGORY </h4></div>
            <div class="col-md-3">
              <span class ='form-control-feedback left fa fa-code-fork'></span>
              <select name="parent" class="form-control" style="padding: 0 42px" id="parent" disabled>
                <option value="0">All</option>
                <?php foreach($categorie_parents as $v) : ?>
                  <?php if($_POST['id_parent'] == $v->id) : ?>
                    <option value="<?= $v->id; ?>" selected><?= $v->nom; ?></option>
                  <?php else : ?>
                    <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-2"><h4 style="font-family: script" class="pull-right">SUB-CATEGORY </h4></div>
            <div class="col-md-3">
              <span class ='form-control-feedback left fa fa-code-fork'></span>
              <select name="enfant" class="form-control" style="padding: 0 42px" id="enfant" disabled>
                <option value="0">Show All</option>
                <?php foreach($categories as $v) : ?>
                  <?php if($v->id_categorie_parent == $_POST['id_parent']) : ?>
                    <?php if($_POST['enfant'] == $v->id) : ?>
                      <option value="<?= $v->id; ?>" selected><?= $v->nom; ?></option>
                    <?php else : ?>
                      <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-12" style="border-top: solid White 1px; padding-top: 10px; background-color: #ddd; position: relative; top: 10px;">
              <div class="col-md-2 pull-right"><?= $form->submit('restart', 'Restart', 'btn-danger', 'submit'); ?></div>
              <div class="col-md-1 pull-right"><button id='printButton' value="print" class="btn btn-success"><i class="fa fa-print"></i> Print</button> </div>
            </div>
          <?php else : ?>
            <div class="col-md-2"><h4 style="font-family: script" class="pull-right">CATEGORY </h4></div>
            <div class="col-md-3">
              <span class ='form-control-feedback left fa fa-code-fork'></span>
              <select name="parent" class="form-control" style="padding: 0 42px" id="parentChange" onchange="go()">
                <?php if(isset($_POST['enfant'])) : ?>
                  <?php $enfant = $this->loadModel('categorie')->find($_POST['enfant']); ?>
                  <?php foreach($categorie_parents as $v) : ?>
                    <?php if($enfant->id_categorie_parent == $v->id) : ?>
                      <option value="<?= $v->id; ?>" selected><?= $v->nom; ?></option>
                    <?php else : ?>
                      <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php else : ?>
                  <option value="0">Show All</option>
                  <?php foreach($categorie_parents as $v) : ?>
                    <option value="<?= $v->id; ?>"><?= $v->nom; ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>

            <div class="col-md-12" style="position: relative; top: 10px;">
              <div class="col-md-1 col-md-offset-2 pull-left"><?= $form->submit('submit', 'Show Selected', 'btn-primary', 'submit'); ?></div>
            </div>
          <?php endif; ?>
        </div>
      </form>
      
      <?php if(isset($_POST['parent'])) : ?>
        <?php if($_POST['parent'] == 0) : ?>
          <?php $balance = isset($_POST['balance']) ? $_POST['balance'] : null; ?>
          <?php if(!is_null($balance)) : ?>
            <?php $gTotal = 0; ?>
            <?php foreach($categorie_parents as $v) : ?>
              <?php foreach($categories as $w) : ?>
                <?php
                
                  $total = 0;
                  
                  foreach($transactions as $x) {

                    if($x->date >= $initial_date AND $x->date <= $final_date) {

                      if($x->id_categorie == $w->id) {

                        $total += $x->montant;
                      }
                    }
                  }
                ?>

                <?php 
                
                  if($v->type == 'entree') {

                    $total = +$total;
                  }else {

                    $total = -$total;
                  }
                ?>

                <?php if($w->id_categorie_parent == $v->id) : ?>
                  <?php $gTotal += $total; ?>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endforeach; ?>
            <div class="balanceView col-md-4 col-md-offset-4"><?= $gTotal; ?> Frs</div>
          <?php else : ?>
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Category</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Description</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Amount</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php $gTotal = 0; ?>
                <?php foreach($categorie_parents as $v) : ?>
                  <?php $type = isset($_POST['type']) ? $_POST['type'] : null; ?>
                  <?php if(!is_null($type)) : ?>
                    <?php if($v->type == strtolower($type)) : ?>
                      <tr>
                        <td colspan="4" style="text-align: center; text-transform: uppercase; font-family: script; font-size: 1.5em; background-color: rgb(102, 5, 90); color: white; text-shadow: 1px 2px 3px #111"><?= $v->nom ?></td>
                      </tr>
                      <?php foreach($categories as $w) : ?>
                        <?php
                        
                          $total = 0;
                          
                          foreach($transactions as $x) {

                            if($x->date >= $initial_date AND $x->date <= $final_date) {

                              if($x->id_categorie == $w->id) {

                                $total += $x->montant;
                              }
                            }
                          }
                        ?>

                        <?php if($w->id_categorie_parent == $v->id) : ?>
                          <?php $gTotal += $total; ?>
                          <tr>
                            <td><?= $w->nom; ?></td>
                            <td><?= $w->description; ?></td>
                            <td><?= $total; ?></td>
                            <td class="noDisturb">
                              <form class="inline" method="post" action="viewElement">
                                <input type="hidden" name="table" value="transaction" />
                                <input type="hidden" name="id" value="<?= $v->id; ?>" />
                                <button type="submit" id="sell" class="act" name="viewTransaction"><span class="fa fa-eyes"></span> View Details</button>
                              </form>
                            </td>
                          </tr>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="4" style="text-align: center; text-transform: uppercase; font-family: script; font-size: 1.5em; background-color: rgb(102, 5, 90); color: white; text-shadow: 1px 2px 3px #111"><?= $v->nom ?></td>
                    </tr>
                    <?php foreach($categories as $w) : ?>
                      <?php
                      
                        $total = 0;
                        
                        foreach($transactions as $x) {

                          if($x->date >= $initial_date AND $x->date <= $final_date) {

                            if($x->id_categorie == $w->id) {

                              $total += $x->montant;
                            }
                          }
                        }
                      ?>

                      <?php 
                      
                        if($v->type == 'entree') {

                          $total = +$total;
                        }else {

                          $total = -$total;
                        }

                      ?>

                      <?php if($w->id_categorie_parent == $v->id) : ?>
                        <?php $gTotal += $total; ?>
                        <tr>
                          <td><?= $w->nom; ?></td>
                          <td><?= $w->description; ?></td>
                          <td><?= $total; ?></td>
                          <td class="noDisturb">
                            <form class="inline" method="post" action="viewElement">
                              <input type="hidden" name="table" value="transaction" />
                              <input type="hidden" name="id" value="<?= $v->id; ?>" />
                              <button type="submit" id="sell" class="act" name="viewTransaction"><span class="fa fa-eyes"></span> View Details</button>
                            </form>
                          </td>
                        </tr>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                  <td colspan="2" style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Final Balance :</td>
                  <td colspan="2" style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111"><?= $gTotal ?> Frs CFA</td>
                </tr>
              </tbody>
            </table>
          <?php endif; ?>
        <?php endif; ?>
      <?php elseif(isset($_POST['enfant'])) : ?>
        <?php if(isset($_POST['enfant'])) : ?>
          <?php if($_POST['enfant'] == 0) : ?>
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Category</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Description</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Amount</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php $gTotal = 0; ?>
                <?php foreach($categories as $v) : ?>
                  <?php if($v->id_categorie_parent == $_POST['id_parent']) : ?>
                    <tr>
                      <td colspan="4" style="text-align: center; text-transform: uppercase; font-family: script; font-size: 1.5em; background-color: rgb(102, 5, 90); color: white; text-shadow: 1px 2px 3px #111"><?= $v->nom ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php foreach($transactions as $w) : ?>
                    <?php if($v->id_categorie_parent == $_POST['id_parent']) : ?>
                      <?php if($w->id_categorie == $v->id) : ?>
                        <?php if($w->date >= $initial_date AND $w->date <= $final_date) : ?>
                          <?php $gTotal += $w->montant; ?>
                          <tr>
                            <td><?= $w->nom; ?></td>
                            <td><?= $w->description; ?></td>
                            <td><?= $w->montant; ?></td>
                            <td class="noDisturb">
                              <form class="inline" method="post" action="viewElement">
                                <input type="hidden" name="table" value="transaction" />
                                <input type="hidden" name="id" value="<?= $v->id; ?>" />
                                <button type="submit" id="sell" class="act" name="viewTransaction"><span class="fa fa-eyes"></span> View Details</button>
                              </form>
                            </td>
                          </tr>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endforeach; ?>
                <tr>
                  <td colspan="2" style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">General Amount :</td>
                  <td colspan="2" style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111"><?= $gTotal ?> Frs CFA</td>
                </tr>
              </tbody>
            </table>
          <?php else : ?>
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Date</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Name</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Description</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Actor</th>
                  <th style="text-align: center; font-family: forte; font-size: 1.5em; background-color:#ddd; color: white; text-shadow: 1px 2px 3px #111">Amount</th>
                </tr>
              </thead>

              <tbody>
                <?php $gTotal = 0; ?>
                <?php foreach($transactions as $w) : ?>
                  <?php $acteur = $this->loadModel('acteur')->find($w->id_acteur); ?>
                  <?php if($w->id_categorie == $_POST['enfant']) : ?>
                    <?php if($w->date >= $initial_date AND $w->date <= $final_date) : ?>
                      <?php $gTotal += $w->montant; ?>
                      <tr>
                        <td><?= $w->date; ?></td>
                        <td><?= $w->nom; ?></td>
                        <td><?= $w->description; ?></td>
                        <td><?= $acteur->nom; ?></td>
                        <td><?= $w->montant; ?></td>
                      </tr>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                  <td colspan="3" style="text-align: center; font-family: forte; font-size: 1.5em; color: black; text-shadow: 1px 2px 3px #111">General Amount :</td>
                  <td colspan="2" style="text-align: center; font-family: forte; font-size: 1.5em; color: black; text-shadow: 1px 2px 3px #111"><?= $gTotal ?> Frs CFA</td>
                </tr>
              </tbody>
            </table>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<script type="text/javascript">
  var button = document.querySelector('#printButton');
  button.addEventListener('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    window.print();
  });
</script>

<script type="text/javascript">

  v = document.querySelector('#parentChange');
  b = document.querySelector('.btn-primary');

  function go() {
    
    text = v.options[v.selectedIndex].text;
    b.value = 'Show '+ text;
  }
</script>

