<?php 

use App\Core\Model\Model;
use App\Core\Session;

/**
 * Class Media
 */
class Media extends Model{



    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $url;

    /**
     * @var
     */
    private $type;

    /**
     *
     */
    public function __construct(){
		parent::__construct('tmedias');
	}

    /**
     * @return mixed
     */
    public function getTitle(){
		return $this->title;
	}

    /**
     * @param $title
     */
    public function setTitle($title){
		$this->title = $title;
	}

    /**
     * @return mixed
     */
    public function getUrl(){
		return $this->url;
	}

    /**
     * @param $url
     */
    public function setUrl($url){
		$this->url= $url;
	}

    /**
     * @return mixed
     */
    public function getType(){
		return $this->type;
	}

    /**
     * @param $type
     */
    public function setType($type){
		$this->type= $type;
	}

    public function setFields(){
        $this->setTabFields(['title'=>$this->title,  'url'=>$this->url, 'type'=>$this->type]);
    }



    /**
     * @return array|bool

    public function create(){
		$sql= "INSERT INTO tmedias (title, url, type) VALUES ('".$this->title."', '".$this->url."', '".$this->type."')";
		return $this->db->query($sql);
	}*/
    
    public function upload($datas, $names){
    	$target_path = 'medias/';
    	$uploadOk = 1 ;
    	for($i=0; $i<count($datas); $i++){
    		$name = $names[$i];
	    	$temp_name = $datas[$i];
	    	$target_path = $target_path.basename($name);
	    	if(file_exists($target_path)){
	    		$uploadOk = 0;
	    	}
	    
	    	if($uploadOk == 0){
	    		Session::setFlash('File already exist', 'warning');
	    	}else{
	    			
	    		if(move_uploaded_file($temp_name, $target_path)){
	    			Session::setFlash("The file ". basename($name). " has been uploaded.", 'warning');
	    		}else{
	    			Session::setFlash("Sorry, there was an error uploading your file", 'warning');
	    		}
	    			
	    	}
	   }
    	
    
    }
	
}
	
	


