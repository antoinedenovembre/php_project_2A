<?php

class AdminController {

	public function __construct()
	{
		global $rep, $vues;
		session_start();

		$errorArr = array ();

		$action = $_GET['action'] ?? NULL;
		try {

			switch($action) {
				case NULL:
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
					$url = $_GET['feed'];
					$title = $_GET['title'];
					$this->modifRSS($url, $title);
					break;

				case 'modifRSSPage':
					$this->modifRSSPage();
					break;

				case 'deleteRSS':
					$url = $_GET['feed'];
					$this->deleteRSS($url);
					break;

				default:
					$errorArr[] = "Bad php call";
					require ($rep.$vues['Error']);
					break;
			}

		} catch (PDOException $e) {
			$errorArr[] =	$e->getMessage();
			require ($rep.$vues['Error']);
		}
		catch (Exception $e2) {
			$errorArr[] =	$e2->getMessage();
			require ($rep.$vues['Error']);
		}
		exit(0);
	}

	public function Init() : void {
		global $rep, $vues;

		$mdl = new AdminModel();
		$tabNews = $mdl->getFeeds();
		$page = 1;
		$nbPage = $mdl->getNbFeeds();

		require($rep.$vues['ListRSS']);
	}

	public function addRSS(string $url, string $title) : void {
		global $rep, $vues;

		$mdl = new AdminModel();
		$null = $mdl->addRSS($url, $title);

		require($rep.$vues['ListRSS']);
	}

	public function addRSSPage() : void {
		global $rep, $vues;

		require($rep.$vues['AddRSS']);
	}

	public function modifRSS(string $url, string $title) : void {
		global $rep, $vues;

		$mdl = new AdminModel();
		$mdl->updateRSS($url, $title);

		require($rep.$vues['ListRSS']);
	}

	public function modifRSSPage() : void {
		global $rep, $vues;

		require($rep.$vues['ModifRSS']);
	}

	public function deleteRSS(string $url) : void {
		global $rep, $vues;

		$mdl = new AdminModel();
		$mdl->deleteRSS($url);

		require($rep.$vues['ListRSS']);
	}
}