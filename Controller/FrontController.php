<?php

class FrontController
{
	public function __construct()
	{
		global $rep, $vues;

		try {
			$actionList = array(
				'Visitor' => array(null, 'loginPage', 'login', 'search'),
				'Admin' => array('listRSS', 'addRSS', 'addRSSPage', 'deleteRSS', 'delSelectRSS', 'modifRSS', 'modifRSSPage', 'logOut')
			);

			$action = $_GET['action'] ?? null;
			foreach ($actionList as $role => $actions) {
				if (in_array($action, $actions, true)) {
					$controller = $role;
					break;
				}
			}

            $admin = (new AdminModel())->isAdmin();
			if (!isset($controller) || $controller === 'Visitor') {
				new Controller($admin);
			} else if(isset($admin)) {
			    new AdminController($admin);
			} else {
			    $_GET['action'] = 'loginPage';
			    new Controller();
			}
		} catch (Throwable $e) {
            $errorArr[] = $e->getMessage();
            require($rep . $vues['Error']);
        }
	}
}