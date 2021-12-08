 <?php
	 require_once ('Config/config.php');
	 require_once('Config/Autoload.php');
	 Autoload::start();
	 session_start();
	 $cont = new FrontController();