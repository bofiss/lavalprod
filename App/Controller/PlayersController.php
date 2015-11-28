<?php
use App\Core\Controller\Controller;
class PlayersController extends Controller
{
    public function index()
    {
        $this->view->render('players/index');
    }
    public function saveSound()
    {
         $OSList = array
    (
    'Windows 3.11' => 'Win16',
    'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
    'Windows 98' => '(Windows 98)|(Win98)',
    'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
    'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
    'Windows Server 2003' => '(Windows NT 5.2)',
    'Windows Vista' => '(Windows NT 6.0)',
    'Windows 7' => '(Windows NT 7.0)',
    'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
    'Windows ME' => 'Windows ME',
    'Open BSD' => 'OpenBSD',
    'Sun OS' => 'SunOS',
    'Linux' => '(Linux)|(X11)',
    'Mac OS' => '(Mac_PowerPC)|(Macintosh)',
    'QNX' => 'QNX',
    'BeOS' => 'BeOS',
    'OS/2' => 'OS/2',
    'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp)|(MSNBot)|(Ask Jeeves/Teoma)|(ia_archiver)'
    );
    // Loop through the array of user agents and matching operating systems
    foreach($OSList as $CurrOS=>$Match)
    {
        // Find a match
        if (mb_ereg($Match, $_SERVER['HTTP_USER_AGENT']))
        {
            // We found the correct match
            break;
        }
    }
    // if it is audio-blob
    if (isset($_FILES["audio-blob"])) {
        $uploadDirectory = 'uploads/'.$_POST["filename"].'.wav';
        if (!move_uploaded_file($_FILES["audio-blob"]["tmp_name"], $uploadDirectory)) {
            echo("Problem writing audio file to disk!");
        }
        
    }
    //return $uploadDirectory ;
     //$this->view->load_layout('players/index');
    }
    public function save(){
        $data = $_REQUEST;
        return $data;
    }
    
    public function soundLayout()
    {
        $this->view->load_layout('players/sound');
    }
    public function ttsLayout()
    {
        $this->view->load_layout('players/tts');
    }
    public function txtLayout()
    {
        $this->view->load_layout('players/txt');
    }
    public function recordLayout()
    {
        $this->view->load_layout('players/record');
    }
    public function imgLayout()
    {
        $this->view->load_layout('players/img');
    }
    
    
}