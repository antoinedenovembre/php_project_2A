<?php

class FrontController
{

	public function __construct()
	{
		global $rep, $vues;

		try {
			$actionList = array(
				'Visitor' => array(NULL, 'loginPage', 'login'),
				'Admin' => array('listRSS', 'addRSS', 'deleteRSS', 'modifRSS')
			);

			$controller = array_search($_GET['action'], $actionList, true);

			if ($controller === 'Visitor') {
				new Controller();
			} else {
                $admin = (new AdminModel())->isAdmin();
                if($admin) {
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