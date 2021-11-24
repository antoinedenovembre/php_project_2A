<?php

class Controller
{
    public function __construct() {
        global $rep, $view; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si nécessaire (préférez utiliser un modèle pour gérer votre session ou cookies)
        session_start();

        //on initialise un tableau d'erreur
        $errorArr = array ();

        try {
            $action=$_REQUEST['action'];

            switch($action) {
                //pas d'action, on reinitialise 1er appel
                case NULL:
                    $this->Reinit();
                    break;
                case "validationFormulaire":
                    $this->ValidationFormulaire($errorArr);
                    break;

                //mauvaise action
                default:
                    $errorArr[] =	"Bad php call";
                    require ($rep.$view['Error.php']);
                    break;
            }

        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $errorArr[] =	"Unexpected DB error";
            require ($rep.$view['Error.php']);

        }
        catch (Exception $e2) {
            $errorArr[] =	"Unexpected error";
            require ($rep.$view['Error.php']);
        }
        exit(0);
    }

    public function Reinit(): void {
        global $rep, $vues;

        require ($rep.$vues['Home.php']);
    }

    public function ValidationFormulaire(array $dVueErreur): void {
        global $rep, $vues;

    }
}