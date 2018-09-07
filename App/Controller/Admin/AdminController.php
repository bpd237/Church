<?php

	namespace ChurchFinanceManager\Controller\Admin;


	class AdminController extends \ChurchFinanceManager\Controller\AppController {

		private function secureData($string) {

			if(ctype_digit($string)) {

				$string = intval($string);
			}else {

				$string = mysql_real_escape_string($string);
				$string = addcslashes($string, '%');
			}

			return $string;}
		private function postControl() {

			if(empty($_POST)) {

				header('Location: index');
				die();
			}}
		private function setTitle() {

			$p = stripcslashes(htmlentities($_GET['p']));
			$p = explode('.', $p);
			return 'Church Management - '.ucfirst($p[3]).'s';}
		private function adminVerification($type = 'manager') {

			if(!isset($_SESSION['aoadbfamtoidfnaomldfkajeiLEKA4ç_H'])) {

				header('Location: forbidden');
				die();
			}else {

				if($_SESSION['degreeaoejmfalnfma'] != $type) {

					$superUsers = $this->loadModel('user')->find($_SESSION['id_lkjapoijdmfa']);
					
					if($superUsers->level == 'administrator') {
					
						$_SESSION['authorizationsdioamkpàaç_rsslnf'] = 99;
					}else {
						header('Location : '.$_SERVER['HTTP_REFERER']);
						die();
					}
				}else {
					
					if($_SESSION['degreeaoejmfalnfma'] == 'manager') {

						$_SESSION['authorizationsdioamkpàaç_rsslnf'] = 1;
					}elseif($_SESSION['degreeaoejmfalnfma'] == 'administrator') {

						$_SESSION['authorizationsdioamkpàaç_rsslnf'] = 99;
					}
				}

			}}
		public function addElement() {

			$this->postControl();
			$this->adminVerification();
			
			$title = $this->setTitle();
			$table = $this->secureData($_POST['table']);
			$form = new \Core\HTML\BootstrapForm;

			$this->render('admin.form.add'.ucfirst($table), compact('title', 'form'));}
		public function modElement() {

			$this->postControl();
			$this->adminVerification('administrator');
			
			$title = $this->setTitle();
			$table = $this->secureData($_POST['table']);
			$id = $this->secureData($_POST['id']);
			$form = new \Core\HTML\BootstrapForm;

			$old = $this->loadModel($table)->find($id);

			$this->render('admin.form.add'.ucfirst($table), compact('title', 'form', 'old'));}
		public function delElement() {

			$table = $this->secureData($_POST['table']);
			$id = $this->secureData($_POST['id']);
			$_SESSION['success'] = 'Element deleted with Success !!!';			

			$this->loadModel($table)->delete($id);

			header('Location: '.$table);
			die();}
		public function __controlElement() {

			$this->postControl();
			$this->adminVerification();

			if(!isset($_POST['table'])) {

				die('Tu as fais comment pour arriver ici?');
			}else {

				$table = $this->secureData($_POST['table']);
				$id = $this->secureData($_POST['id']);

				if($table == 'categorie') { // Catégories des dépenses

					$id_categorie_parent = $this->secureData($_POST['id_categorie_parent']);
					$nom = $this->secureData($_POST['nom']);
					$description = $this->secureData($_POST['description']);
					$oldName = $this->secureData($_POST['oldName']);

					if(isset($_POST['modCategorie'])) {

						if($nom != $oldName) {

							if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

								$_SESSION['err'] = 'A same name of category already exist in Data base  !!!';
								
								header('Location: categorie');
								die();
							}
						}

						$this->loadModel($table)->update($id, ['id_categorie_parent' => $id_categorie_parent, 'nom' => $nom, 'description' => $description]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new category in database';

						header('Location: categorie');
						die();
					}else {

						if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

							$_SESSION['err'] = 'A same name of category already exist in Data base  !!!';
							
							header('Location: categorie');
							die();
						}

						$this->loadModel($table)->create(['id_categorie_parent' => $id_categorie_parent, 'nom' => $nom, 'description' => $description]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new category in database';

						header('Location: categorie');
						die();
					}
				}elseif($table == 'categorie_parent') { // Cathégories des dépenses

					$nom = $this->secureData($_POST['nom']);
					$description = $this->secureData($_POST['description']);
					$type = $this->secureData($_POST['type']);
					$oldName = $this->secureData($_POST['oldName']);

					if(isset($_POST['modCategorie_parent'])) {

						if($nom != $oldName) {

							if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

								$_SESSION['err'] = 'A same name of category already exist in Data base  !!!';
								
								header('Location: categorie_parent');
								die();
							}
						}

						$this->loadModel($table)->update($id, ['nom' => $nom, 'description' => $description, 'type' => $type]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new category in database';

						header('Location: categorie_parent');
						die();
					}else {

						if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

							$_SESSION['err'] = 'A same name of category already exist in Data base  !!!';
							
							header('Location: categorie_parent');
							die();
						}

						$this->loadModel($table)->create(['nom' => $nom, 'description' => $description, 'type' => $type]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new category in database';

						header('Location: categorie_parent');
						die();
					}
				}elseif($table == 'degree') {

					$nom = $this->secureData($_POST['nom']);
					$oldName = $this->secureData($_POST['oldName']);

					if(isset($_POST['modDegree'])) {

						if($nom != $oldName) {

							if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

								$_SESSION['err'] = 'A same name of degree already exist in Data base  !!!';
								
								header('Location: degree');
								die();
							}
						}

						$this->loadModel($table)->update($id, ['nom' => $nom]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new degree in database';

						header('Location: degree');
						die();
					}else {

						if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

							$_SESSION['err'] = 'A same name of degree already exist in Data base  !!!';
							
							header('Location: degree');
							die();
						}

						$this->loadModel($table)->create(['nom' => $nom]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new degree in database';

						header('Location: degree');
						die();
					}
				}elseif($table == 'acteur') { // 

					$nom = $this->secureData($_POST['nom']);
					$localisation = $this->secureData($_POST['localisation']);
					$type = $this->secureData($_POST['type']);
					$profession = $this->secureData($_POST['profession']);
					$oldName = $this->secureData($_POST['oldName']);

					if(isset($_POST['modActeur'])) {

						if($nom != $oldName) {

							if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

								$_SESSION['err'] = 'A same name of actor already exist in Data base  !!!';
								
								header('Location: acteur');
								die();
							}
						}

						$this->loadModel($table)->update($id, [
							'nom' => $nom,
							'localisation' => $localisation,
							'type' => $type,
							'profession' => $profession
						]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new actor in database';

						header('Location: acteur');
						die();
					}else {

						if($this->loadModel($table)->already_exist($nom, 'nom') == '1') {

							$_SESSION['err'] = 'A same name of actor already exist in Data base  !!!';
							
							header('Location: acteur');
							die();
						}

						$this->loadModel($table)->create([
							'nom' => $nom,
							'localisation' => $localisation,
							'type' => $type,
							'profession' => $profession
						]);

						$_SESSION['success'] = 'Sucessfully add '.$nom.' as new actor in database';

						header('Location: acteur');
						die();
					}
				}elseif($table == 'transaction') {

					$nom = $this->secureData($_POST['nom']);
					$description = $this->secureData($_POST['description']);
					$montant = $this->secureData($_POST['montant']);
					$date = $this->secureData($_POST['date']);
					$id_categorie = $this->secureData($_POST['id_categorie']);
					$id_acteur = $this->secureData($_POST['id_acteur']);

					$category = $this->loadModel('categorie')->find($id_categorie);

					if(isset($_POST['modTransaction'])) {

						$this->loadModel($table)->update($id, [
							'id_categorie' => $id_categorie,
							'id_acteur' => $id_acteur,
							'nom' => $nom,
							'montant' => $montant,
							'description' => $description,
							'date' => $date
							]);

						$_SESSION['success'] = $nom.' has successfully added in database';

						header('Location: transaction');
						die();
					}elseif(isset($_POST['addTransaction'])) {

						$this->loadModel('transaction')->create([
							'id_categorie' => $id_categorie,
							'id_acteur' => $id_acteur,
							'nom' => $nom,
							'montant' => $montant,
							'description' => $description,
							'date' => $date
							]);

						$_SESSION['success'] = $nom.' has successfully added in database';

						header('Location: transaction');
						die();
					}elseif(isset($_POST['addCategory'])) {
						
						$title = 'Church Management - Add Category';
						$form = new \Core\HTML\BootstrapForm;
						$this->render('admin.form.addCategorie', compact('form', 'title'));
						die();
					}elseif(isset($_POST['addActor'])) {
						
						$title = 'Church Management - Add Actor';
						$form = new \Core\HTML\BootstrapForm;
						$this->render('admin.form.addActeur', compact('form', 'title'));
						die();
					}else {

						die('Tu es trop fort !');
					}
				}elseif($table == 'user') {

					$full_name = $this->secureData($_POST['full_name']);
					$username = $this->secureData($_POST['username']);
					$password = isset($_POST['password'])? sha1(md5($this->secureData($_POST['password']))) : null;
					$level = $this->secureData($_POST['level']);
					$contact = $this->secureData($_POST['contact']);
					$localisation = $this->secureData($_POST['localisation']);
					$profession = $this->secureData($_POST['profession']);
					
					if(isset($_POST['modUser'])) {

						$this->loadModel($table)->update($id, [
							'full_name' => $full_name,
							'username' => $username,
							'level' => $level,
							'contact' => $contact,
							'localisation' => $localisation,
							'profession' => $profession
							]);

						$_SESSION['success'] = $username.' has successfully added in database';

						header('Location: user');
						die();
					}elseif(isset($_POST['addUser'])) {

						$this->loadModel($table)->create([
							'full_name' => $full_name,
							'username' => $username,
							'password' => $password,
							'level' => $level,
							'contact' => $contact,
							'localisation' => $localisation,
							'profession' => $profession
							]);

						$_SESSION['success'] = $username.' has successfully added in database';

						header('Location: user');
						die();
					}else {

						die('Tu es trop fort !');
					}
				}elseif($table == 'membre') {

					$full_name = $this->secureData($_POST['full_name']);
					$degree = $this->secureData($_POST['degree']);
					$phone = $this->secureData($_POST['phone']);
					$localisation = $this->secureData($_POST['localisation']);
					$salary = $this->secureData($_POST['salary']);
					$profession = $this->secureData($_POST['profession']);
					$date = $this->secureData($_POST['date']);
					
					if(isset($_POST['modMembre'])) {

						$this->loadModel($table)->update($id, [
							'full_name' => $full_name,
							'degree' => $degree,
							'phone' => $phone,
							'localisation' => $localisation,
							'salary' => $localisation,
							'entrance_date' => $date
							]);

						$_SESSION['success'] = $full_name.' has successfully added in database';

						header('Location: membre');
						die();
					}elseif(isset($_POST['addMembre'])) {

						$this->loadModel($table)->create([
							'full_name' => $full_name,
							'degree' => $degree,
							'phone' => $phone,
							'localisation' => $localisation,
							'salary' => $salary,
							'entrance_date' => $date
							]);

						$_SESSION['success'] = $full_name.' has successfully added in database';

						header('Location: membre');
						die();
					}elseif(isset($_POST['addDegree'])) {
						
						$form = new \Core\HTML\BootstrapForm;
						$title = 'Church Management - Add Degree';
						$this->render('admin.form.addDegree', compact('form', 'title'));
					}else {

						die('Tu es trop fort !');
					}
				}else {

					die('C\'est vous les don man non !!!');
				}
			}}
		public function controlLog() {

			$username = $this->secureData(strtoupper($_POST['username'])); 
			$admin = $this->loadModel('user')->all();

			foreach($admin as $v) {

				if(strtoupper($v->username) == $username) {
					$_SESSION['id_lkjapoijdmfa'] = $v->id;
				}
			}

			if(isset($_SESSION['id_lkjapoijdmfa'])) {

				$actualUser = $this->loadModel('user')->find($_SESSION['id_lkjapoijdmfa']);
				if(sha1(md5($this->secureData($_POST['password']))) == $actualUser->password) {
					$_SESSION['aoadbfamtoidfnaomldfkajeiLEKA4ç_H'] = $username;
					$_SESSION['degreeaoejmfalnfma'] = $actualUser->level;
					$_SESSION['success'] = 'Welcome '.$username.' !';
					header('Location: index');
					die();
				}else {
					$error = 'pass';
					header('Location: '.$_SERVER['HTTP_REFERER']);
					die();
				}
			}else {
				$error .= 'user';
				header('Location: '.$_SERVER['HTTP_REFERER']);
				die();
			}}
		public function out() {

			$this->adminVerification();
			$title = $this->setTitle();
			
			unset($_SESSION['aoadbfamtoidfnaomldfkajeiLEKA4ç_H']);
			unset($_SESSION['degreeaoejmfalnfma']);
			unset($_SESSION['authorizationsdioamkpàaç_rsslnf']);
			
			header('Location: forbidden');
			die();}
		public function forbidden() {

			$title = $this->setTitle();

			$this->renderForbidden('admin.home.forbidden', compact('title'));}
		public function nofound() {

			$title = $this->setTitle();

			$this->renderForbidden('admin.home.nofound', compact('title'));}
		public function index() {
			
			$this->adminVerification();

			$title = 'Church Management - Dashboard';
			$today = date('Y/m/d');

			$transactions = $this->loadModel('transaction')->all();
			$categories = $this->loadModel('categorie')->all();
			$categorie_parents = $this->loadModel('categorie_parent')->all();
			
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.home.index', compact('title', 'success', 'transactions', 'categories', 'categorie_parents'));}
		public function transaction() {
			
			$this->adminVerification();

			$title = $this->setTitle();
			$today = date('Y/m/d');

			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$err = isset($_SESSION['err']) ? $_SESSION['err'] : null;
			
			$transactions = $this->loadModel('transaction')->all();
			$categories = $this->loadModel('categorie')->all();
			$acteurs = $this->loadModel('acteur')->all();

			$_SESSION['success'] = null;
			$_SESSION['err'] = null;

			$this->render('admin.home.transaction', compact('title', 'success', 'err', 'transactions', 'categories', 'acteurs'));}
		public function rapport() {
			
			$this->adminVerification();

			$title = 'Church Management - Reports';
			$today = date('Y/m/d');
			$form = new \Core\HTML\BootstrapForm;

			$transactions = $this->loadModel('transaction')->all();
			$categorie_parents = $this->loadModel('categorie_parent')->all();
			$categories = $this->loadModel('categorie')->all();
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.home.rapport', compact('title', 'success', 'transactions', 'categorie_parents', 'categories', 'form'));}
		public function categorie() {
			
			$this->adminVerification('administrator');

			$title = 'Church Management - Actors';
			$today = date('Y/m/d');
			$form = new \Core\HTML\BootstrapForm;

			$categories = $this->loadModel('categorie')->all();
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.admin.categorie', compact('title', 'success', 'categories', 'form'));}
		public function categorie_parent() {
			
			$this->adminVerification('administrator');

			$title = 'Church Management - Actors';
			$today = date('Y/m/d');

			$categorie_parents = $this->loadModel('categorie_parent')->all();
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.admin.categorie_parent', compact('title', 'success', 'categorie_parents'));}
		public function degree() {
			
			$this->adminVerification('administrator');

			$title = 'Church Management - Actors';
			$today = date('Y/m/d');

			$degrees = $this->loadModel('degree')->all();
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.admin.degree', compact('title', 'success', 'degrees'));}
		public function acteur() {
			
			$this->adminVerification('administrator');

			$title = 'Church Management - Actors';
			$today = date('Y/m/d');

			$acteurs = $this->loadModel('acteur')->all();
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.admin.acteur', compact('title', 'success', 'acteurs'));}
		public function user() {
			
			$this->adminVerification('administrator');

			$title = 'Church Management - Gestionners';
			$today = date('Y/m/d');

			$users = $this->loadModel('user')->all();
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.admin.user', compact('title', 'success', 'users'));}
		public function membre() {
			
			$this->adminVerification('administrator');

			$title = 'Church Management - Members';
			$today = date('Y/m/d');

			$membres = $this->loadModel('membre')->all();
			$success = isset($_SESSION['success']) ? $_SESSION['success'] : null;
			$_SESSION['success'] = null;

			$this->render('admin.admin.membre', compact('title', 'success', 'membres'));}
	}
 ?>