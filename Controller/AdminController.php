<?php

class AdminController {

    /**
     * @param Admin|null $admin
     */
	public function __construct(Admin $admin = null) {
		global $rep, $vues;
        $errorArr = array ();

        if (!isset($admin)) {
            $errorArr[] = "You must be logged in to access this page";
            require($rep . $vues['Error']);
        }
		$action = $_GET['action'] ?? NULL;
		try {
			switch($action) {
				case 'listRSS':
					$this->Init();
					break;

				case 'addRSS':
					$title = $_POST['title'];
					$url = $_POST['url'];
					$this->addRSS($url, $title);
					break;

				case 'addRSSPage':
					$this->addRSSPage();
					break;

				case 'modifRSS':
					$url = $_POST['url'];
					$title = $_POST['title'];
					$this->modifRSS($url, $title);
					break;

				case 'modifRSSPage':
					$this->modifRSSPage();
					break;

				case 'deleteRSS':
					$url = $_GET['feed'];
					$this->deleteRSS($url);
					break;

				case 'delSelectRSS':
					$arr = $_POST['feedsSelected'];
					$arr = explode(',', $arr);
					$this->delSelectRSS($arr);
					break;

				case 'logOut':
					$this->logOut();
					break;

				default:
					$errorArr[] = "Bad php call";
					require ($rep.$vues['Error']);
					break;
			}

		} catch (Throwable $e) {
			$errorArr[] =	$e->getMessage();
			require ($rep.$vues['Error']);
		}
		exit(0);
	}

    /**
     * @return void
     */
	public function Init() : void {
		global $rep, $vues;

		$mdl = new AdminModel();
        $page = 1;
        $tabFeeds = $mdl->getFeeds($page);
		$nbPage = $mdl->getNbPage();

		require($rep.$vues['ListRSS']);
	}

    /**
     * @param string $url
     * @param string $title
     * @return void
     */
	public function addRSS(string $url, string $title) : void {

		$mdl = new AdminModel();
		$mdl->addRSS($url, $title);

		header('Location: index.php?action=listRSS');
	}

    /**
     * @return void
     */
	public function addRSSPage() : void {
		global $rep, $vues;

		$title = NULL;
		$url = NULL;

		require($rep.$vues['AddRSS']);
	}

    /**
     * @param string $url
     * @param string $title
     * @return void
     */
	public function modifRSS(string $url, string $title) : void {

		$mdl = new AdminModel();
		$mdl->updateRSS($url, $title);

		header('Location: index.php?action=listRSS');
	}

    /**
     * @return void
     */
	public function modifRSSPage() : void {
		global $rep, $vues;

		$title = $_GET['title'];
		$url = $_GET['feed'];

		require($rep.$vues['ModifRSS']);
	}

    /**
     * @param string $url
     * @return void
     */
	public function deleteRSS(string $url) : void {

		$mdl = new AdminModel();
		$mdl->deleteRSS($url);

		header('Location: index.php?action=listRSS');
	}

    /**
     * @param array $urls
     * @return void
     */
	public function delSelectRSS(array $urls) : void {

		$mdl = new AdminModel();
		foreach($urls as $url) {
			$mdl->deleteRSS($url);
		}

		header('Location: index.php?action=listRSS');
	}

    /**
     * @return void
     */
	public function logOut(): void
	{
		session_unset();
		session_destroy();
		$_SESSION = array();

		header('Location: index.php?');
	}
}