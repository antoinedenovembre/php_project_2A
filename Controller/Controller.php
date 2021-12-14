<?php

class Controller
{
	private Admin|null $adminAttr;

	/**
	 * @param Admin|null $adminAttr
	 */
    public function __construct(Admin $adminAttr = null)
    {
        global $rep, $vues;

		$this->adminAttr = $adminAttr;
        $errorArr = array ();

        $action = $_GET['action'] ?? NULL;
        try {

            switch($action) {
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
					// $stringSearch = $_POST['stringSearch'];
					// $this->search($stringSearch);
		            $this->init();
					break;

	            case 'orderBy':
					$this->sort();
					break;

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

	/**
	 * @return void
	 */
    public function init() : void
    {
        global $rep, $vues;

        $model = new Model();
        $page = 1;
		$order = 'asc';
		$type = 'date';
		$admin = $this->adminAttr;
        $tabNews = $model->getNews($page, $order, $type);
        $nbPage = $model->getNbPage();

	    require($rep.$vues['Home']);
    }

	/**
	 * @return void
	 */
    private function findNews() : void
    {
        global $rep, $vues;

        $model = new Model();
	    if(isset($_GET['type'], $_GET['order'])) {
		    $type = Validation::validString($_GET['type']);
		    $order = Validation::validString($_GET['order']);
	    } else {
		    $order = 'asc';
		    $type = 'date';
	    }
        $nbPage = $model->getNbPage();
        $page = Validation::validePage($_GET['page'], $nbPage);
        $tabNews = $model->getNews($page, $order, $type);
	    $admin = $this->adminAttr;

        require($rep.$vues['Home']);
    }

	/**
	 * @return void
	 */
    public function loginPage() : void
    {
        global $rep, $vues;

        require($rep.$vues['Login']);
    }

	/**
	 * @return void
	 */
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
	public function search(mixed $stringSearch): void
	{
		global $rep, $vues;

		$model = new Model();
		$nbPage = $model->getNbPage();
		$page = Validation::validePage($_GET['page'], $nbPage);
		$tabNews = $model->getNews($page);

		require($rep.$vues['Home']);
	}

	/**
	 * @return void
	 */
	public function sort(): void
	{
		global $rep, $vues;

		if(isset($_GET['type'], $_GET['order'])) {
			$type = Validation::validString($_GET['type']);
			$order = Validation::validString($_GET['order']);
		} else {
			$type = 'date';
			$order = 'asc';
		}

		$model = new Model();
		$nbPage = $model->getNbPage();

		if (isset($_GET['page'])) {
			$page = Validation::validePage($_GET['page'], $nbPage);
		} else {
			$page = 1;
		}
		$tabNews = $model->getNews($page, $order, $type);
		$admin = $this->adminAttr;

		require($rep.$vues['Home']);
	}
}