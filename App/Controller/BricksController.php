<?php
use App\Core\Controller\Controller;
use App\Core\Request\Request;
use App\Core\View\View;
use App\Core\Session;
class BricksController extends Controller {
	
	function __construct(){
		parent::__construct('');
		$this->loadModel('media_Brick');
		$this->loadModel('media');
	}

	function index(){
		$data = $this->Brick->ReadAllTitleBricks();
		$this->view->data = $data;
		$this->view->render('bricks/index');

	}

	public function edit($id = null){
		if ($id) {
			if ($this->Brick->findById($id)) {
				$currentBrick = Request::cleanInput($this->Brick->findById($id));
				$this->view->currentBrick = $currentBrick;
				
			} else {
				$this->setFlash("This brick doesn't exist", "warning");
			}
		}
		$bricks =$this->Brick->ReadAllBrick();
	 	$this->view->bricks = $bricks;
	 	$this->view->render('bricks/edit');
					
	}   
	 
//-------------------------------------------------------------------------------------------------------------------------------
	public function CreateBrick (){
		$files = Request::cleanInput($_FILES);
		$datas = $files['tmp_name'];
		$names = $files['name'];

		$medias = [];
		   $name= Request::input('name');
		   $type= Request::input('type');
		   $media= Request::input('media');
		   if($type == "IMG" || $type=="WAV"){
		   	$medias =explode(",", $media);
		   }
		   	   
		   $data= $this->Brick->FindIDBrickByTitle($name);
			 // Title doesn't exists 
			 if ($data == 0) {
			 
			   for( $i=0; $i<count($medias); $i++){
				$this->Media->setTitle($medias[$i]);
				$this->Media->setUrl(URL.'medias/'.$medias[$i]);
				$this->Media->setType($type);
				$this->Brick->createBrick($name, $type, $medias[$i]); 
				$this->Media->setFields();
				$this->Media->create();

				 $this->Media_Brick->set_id_Bricks($this->Brick->FindIDBrickByTitle($name));
				 $this->Media_Brick->set_id_Medias($this->Media->retrieveId('title', $medias[$i]));
				 $this->Media_Brick->setFields();
				 $this->Media_Brick->create();
			   }
			 

				Session::setFlash("You have created your new brick !", 'success');
			 }
			 else {
				Session::setFlash(" This title already exists choose another one !", "danger");
			 }
			 //setFlash($message, $type = 'info', $title = null)
			 
		    $this->Media->upload($datas, $names);
		  $this->view->redirect_to('/brick/edit');
		   

	}

	public function delete($id){
		if ($this->Brick->findById($id)) {
	   		$this->Brick->delete($id);
	   		Session::setFlash('The brick has been deleted', "success");
	   		$this->view->redirect_to('/brick/edit');
		} else {
			Session::setFlash("This brick doesn't exist", "warning");
			$this->view->redirect_to('/brick/edit');

		}
	}
	
	public function UpdateBrick($id){
		$this->data = Request::all();
		if($this->Brick->UpdateBrick($id, $this->data)){
			Session::setFlash('The brick has been updated', "success");
			$this->view->redirect_to('/brick/edit');
		}else{
			Session::setFlash("Problem occur while updating", "warning");
			$this->view->redirect_to('/brick/edit');
		}
		
		
	}
   


}
