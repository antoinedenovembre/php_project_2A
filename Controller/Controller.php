<?php

class Controller
{

    public function __construct()
    {
        global $rep, $vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si nécessaire (préférez utiliser un modèle pour gérer votre session ou cookies)



        //on initialise un tableau d'erreur
        $errorArr = array ();

        $action = $_GET['action'] ?? NULL;
        try {

            switch($action) {
                //pas d'action, on reinitialise 1er appel
                case NULL:
                    $this->init();
                    break;

                case 'findNews':
                    $this->findNews();
                    break;

                case 'loginPage':
                    $this->loginPage();
                    break;

                case 'login':
                    $this->login();
                    break;

	            case 'search':
					$stringSearch = $_POST['stringSearch'];
					$this->search($stringSearch);
					break;

	            case 'orderBy':
					break;

                //mauvaise action
                default:
                    $errorArr[] = "Bad php call";
                    require ($rep.$vues['Error']);
                    break;
            }

        } catch (Throwable $e) {
            $errorArr[] = $e->getMessage();
            require ($rep.$vues['Error']);
        }
        exit(0);
    }

    public function init() : void
    {
        global $rep, $vues;

        $model = new Model();
        $page = 1;
        $tabNews = $model->getNews($page);
        $nbPage = $model->getNbPage();

        require($rep.$vues['Home']);
    }

    private function findNews() : void
    {
        global $rep, $vues;

        $model = new Model();
        $nbPage = $model->getNbPage();
        $page = Validation::validePage($_GET['page'], $nbPage);
        $tabNews = $model->getNews($page);

        require($rep.$vues['Home']);
    }

    public function loginPage() : void
    {
        global $rep, $vues;

        require($rep.$vues['Login']);
    }

    public function login(): void
    {
        global $rep, $vues;

        $username = Validation::validString($_POST['username']);
        $password = Validation::validString($_POST['password']);

        $adminMdl = new AdminModel();
        $admin = $adminMdl->getAdmin($username, $password);

        if(isset($admin)) {
            $_SESSION['role'] = $admin->getRole();
            $_SESSION['username'] = $admin->getUsername();
            header('Location: index.php?action=listRSS');
        } else {
            $error = true;
            require($rep.$vues['Login']);
        }
    }

	/**
	 * @param mixed $stringSearch
	 * @return void
	 */
	public function search(mixed $stringSearch)
	{
		global $rep, $vues;

		$model = new Model();
		$nbPage = $model->getNbPage();
		$page = Validation::validePage($_GET['page'], $nbPage);
		$tabNews = $model->getNews($page);

		require($rep.$vues['Home']);
	}
}