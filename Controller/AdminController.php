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
					$this->addRSS();
					break;

				case 'modifRSS':
					$this->modifRSS();
					break;

				case 'deleteRSS':
					$this->deleteRSS();
					break;

				default:
					$errorArr[] = "Bad php call";
					require ($rep.$vues['Error']);
					break;
			}

		} catch (PDOException $e) {
			$errorArr[] =	"Unexpected DB error";
			require ($rep.$vues['Error']);
		}
		catch (Exception $e2) {
			$errorArr[] =	"Unexpected error";
			require ($rep.$vues['Error']);
		}
		exit(0);
	}

	public function Init() : void {
		global $rep, $vues;

		$mdl = new Model();
		$tabNews = $mdl->getNews();
		$page = 1;
		$nbpage = $mdl->getNbPage();

		require($rep.$vues['Home']);
	}
}