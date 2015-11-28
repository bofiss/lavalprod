<?php namespace App\Core\Controller;
use App\Core\View\View;
use App\Core\Session;
// Initialisation de la session dans tous les controleurs
Session::init();
 /**
  * @Controlleur principal
  */
 class Controller
 {
   protected $model =null;

   function __construct()
   {
   	/* main controller */

   	$this->view = new View();
   }

   public function loadModel($name){
     /* recupere le chemin du model */
        $n = ucfirst($name);
       $name .="S";

        $path = '../App/Model/'.$n.'.php';

        /* vérifie si le model exixte et l' initialise */

        if(file_exists($path)){
          require '../App/Model/'.$n.'.php';
          $this->$n = new $n($name); // modification, pour pourvoir faire par exemple $this->User->method
          // $this->model = new $name();
        }
   }

    

 }
