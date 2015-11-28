<?php

use App\Core\Controller\Controller;
use App\Core\View\View;

class ErrorsController extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->msg = "Cette page n'existe pas";
        $this->view->render('errors/index');
    }

    function user(){
    	$this->view->msg = "Cette page n'existe pas";
        $this->view->render('error/user');
    }

    function edit(){
        $this->view->render('errors/index');
    }

}