<?php
	
	namespace Core\Controller; // Un peu comme le repertoire du fichier actuel

	/**
	 * Class Controller
	 * @package Core\Controller
	 */
	class Controller{

		protected $viewPath; // Dossier dans le quel se trouve la vue
		protected $template; // Dossier dans le quel se trouve le template
		
		protected function render($view, $variables=[]){

			ob_start();
			if(isset($variables)){
				extract($variables);
			}
			require $this->viewPath.str_replace('.', '/', $view).'.php';
			$content = ob_get_clean();
			
			require($this->viewPath.'template/'.$_SESSION['aoadbfamtoidfnaomldfka'].'_'.$this->template.'.php');
		}

		protected function renderForbidden($view, $variables=[]){

			ob_start();
			if(isset($variables)){
				extract($variables);
			}
			require $this->viewPath.str_replace('.', '/', $view).'.php';
			$content = ob_get_clean();
			
			header("HTTP/1.0 403 Forbidden");
			require($this->viewPath.'template/forbidden.php');
		}

		protected function renderNoFound($view, $variables=[]){

			ob_start();
			if(isset($variables)){
				extract($variables);
			}
			require $this->viewPath.str_replace('.', '/', $view).'.php';
			$content = ob_get_clean();
			
			header("HTTP/1.0 404 Not Found");
			require($this->viewPath.'template/nofound.php');
		}
	}
?>