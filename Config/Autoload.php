<?php

class Autoload
{
    private static Autoload|null $_instance = null;

    public static function start() : void {
        if(null !== self::$_instance) {
            throw new RuntimeException(__CLASS__ . 'is already started');
        }

        self::$_instance = new self();

        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw new RuntimeException(__CLASS__ . ' : Could not start the autoload');
        }
    }

    public static function shutDown() : void {
        if(null !== self::$_instance) {
            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }

            self::$_instance = null;
        }
    }

    private static function _autoload($class) : void { // regarder avec le prof le fonctionnement
        global $rep;
        $filename = $class.'.php';
        $dir =array('./','Config/','Controller/','DAL/','Model/','View/');
        foreach ($dir as $d) {
            $file=$rep.$d.$filename;
            if (file_exists($file)) {
                include $file;
            }
        }
    }
}