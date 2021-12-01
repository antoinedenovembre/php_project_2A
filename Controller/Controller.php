<?php

class Controller
{

    public function __construct() {
        global $rep, $vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si nécessaire (préférez utiliser un modèle pour gérer votre session ou cookies)
        session_start();

        //on initialise un tableau d'erreur
        $errorArr = array ();

        $action = $_GET['action'] ?? NULL;
        try {

            switch($action) {
                //pas d'action, on reinitialise 1er appel
                case NULL:
                    $this->Init();
                    break;

                case 'login':
                    $this->LoginPage();
                    break;

                //mauvaise action
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

    public function Login(): void {
        global $rep, $vues;

		$mdl = new AdminModel();
    }

    public function Init() : void {
        global $rep, $vues;

        $mdl = new Model();
        $tabNews = $mdl->getNews();
		$page = 1;
		$nbpage = $mdl->getNbPage();

        require($rep.$vues['Home']);
    }

    public function LoginPage() : void {
        global $rep, $vues;

        require($rep.$vues['Login']);
    }
}