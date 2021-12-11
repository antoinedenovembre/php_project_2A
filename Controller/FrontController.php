<?php

class FrontController
{

	public function __construct()
	{
		global $rep, $vues;

		try {
			$actionList = array(
				'Visitor' => array(null, 'loginPage', 'login'),
				'Admin' => array('listRSS', 'addRSS', 'deleteRSS', 'modifRSS')
			);

            foreach ($actionList as $role => $actions) {
                if (in_array($_GET['action'], $actions, true)) {
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