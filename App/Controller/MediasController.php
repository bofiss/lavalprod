<?php
/**
 * Created by PhpStorm.
 * User: Bofiss
 * Date: 27/10/2015
 * Time: 19:48
 */



use App\Core\Controller\Controller;
use App\Core\View\View;
use App\Core\Session;
use App\Core\Request\Request;

class MediasController extends Controller
{
    public function __construct(){
        parent::__construct();

    }

    public function index($id= null){

        if ($id) {
            if ($idmedia= $this->Media->read($id)){
                $currentMedia= Request::cleanInput($idmedia);
                $this->view->currentMedia = $currentMedia;

            } else {
                Session::setFlash("This Media doesn't exist", "warning");
            }
        }
             $this->view->medias = $this->Media->read();
             $this->view->render('medias/index');
    }

    public function update($id){
        $this->Media->update($id);
        $this->render->redirect_to('/media/index');
    }

}