<?php

class Controller
{
    function __construct() {
        global $rep, $view; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
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
                    require ($rep.$view['Home.php']);
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

    function Reinit() {
        global $rep, $vues;

        $viewArr = array (
            'nom' => "",
            'age' => 0,
        );
        require ($rep.$vues['Home.php']);
    }

    function ValidationFormulaire(array $dVueErreur) {
        global $rep, $vues;

        //si exception, ca remonte
        $nom=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
        $age=$_POST['txtAge'];
        Validation::val_form($nom,$age,$dVueErreur);

        $model = new Simplemodel();
        $data=$model->get_data();

        $viewArr = array (
            'nom' => $nom,
            'age' => $age,
            'data' => $data,
        );
        require ($rep.$vues['Home.php']);
    }
}