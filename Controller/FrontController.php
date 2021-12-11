<?php

class FrontController
{

	public function __construct()
	{
		global $rep, $vues;

		try {
			$actionList = array(
				'Visitor' => array(null, 'loginPage', 'login'),
				'Admin' => array('listRSS', 'addRSS', 'addRSSPage', 'deleteRSS', 'delSelectRSS', 'modifRSS', 'modifRSSPage')
			);

			$action = $_GET['action'] ?? null;
			foreach ($actionList as $role => $actions) {
				if (in_array($action, $actions, true)) {
					$controller = $role;
					break;
				}
			}

			if (!isset($controller) || $controller === 'Visitor') {
				new Controller();
			} else {
				$mdl = new AdminModel();
                $admin = $mdl->isAdmin();
                if(isset($admin)) {
                    new AdminController($admin);
                } else {
                    $_GET['action'] = 'loginPage';
                    new Controller();
                }
			}
		} catch (Throwable $e) {
            $errorArr[] = $e->getMessage();
            require($rep . $vues['Error']);
        }
	}
}