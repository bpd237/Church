<?php

	namespace ChurchFinanceManager\Table;
	use \Core\Table\Table;

	class Categorie_parentTable extends Table{

		public function findCategorie($elt) {

			return $this->query('
				SELECT *
				FROM '.$this->table.'
				WHERE type = ?
				', [$elt]);
		}

	}
?>