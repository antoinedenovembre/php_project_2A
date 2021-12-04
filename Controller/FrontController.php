<?php

class FrontController
{

	public function __construct()
	{
		global $rep, $vues;

		try {
			$stringActor = '';
			$actionList = array(
				'' => array(NULL, 'login'),
				'Admin' => array('addRSS', 'deleteRSS', 'modifRSS')
			);

			$action = $_GET['action'];

			$stringActor = array_search($action, $actionList, true);
			$mdlClass = $stringActor . "Model";

			$mdl = new $mdlClass();
			$actor = $mdl->isActor();

			if ($stringActor !== '') {
				new AdminController();
			} else {
				new Controller();
			}
		} catch (Exception $e) {
			$errorArr[] = $e->getMessage();
			require($rep.$vues['Error']);
		} catch (Error $e2) {
			$errorArr[] = $e2->getMessage();
			require($rep.$vues['Error']);
		}
	}
}