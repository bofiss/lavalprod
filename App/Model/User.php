<?php
use App\Core\Model\Model;
/*
 * Gestion des données utilisateur
 */
class User extends Model{

	public function __contruct(){
		parent::__construct('tusers');

	}

	/*
	 * Enregistre un utilisateur en base de donnée
	 */

	public function save(array $user){
		$this->db->query("INSERT INTO tusers (firstName, lastName, mail, password) VALUES ('".$user['firstName']."', '".$user['lastName']."', '".$user['mail']."', '".md5($user['password'])."')");
	}

	/*
	 * Fonction de modification d'un utilisateur*
	 * $this->update($_POST['user']);
	 */

	public function updates(array $user){
		$this->db->query("UPDATE tusers (firstName, lastName, mail, password) VALUES ('".$user['firstName']."', '".$user['lastName']."', '".$user['mail']."', '".md5($user['password'])."')");
	}

	/*
	 * Valide l'email et le mot de passe d'un utilisateur pour la connexion
	 * Utilisation : User->fetchValidUser($_POST['user'])
	 */

	public function fetchValidUser(array $user) {
		$data = $this->db->query("SELECT * FROM tusers WHERE mail = '".$user["mail"]."' AND password = '".md5($user['password'])."'");
		return ($data)? $data[0] : false;
	}

	/*
	 * Trouve un utilisateur en fonction de son mail
	 * Utilisation : User->findByMail(mail)
	 */

	public function findByMail($mail){
		$data = $this->db->query("SELECT * FROM tusers WHERE mail='$mail'");
		return $data;
	}

	/*
	 * Trouve l'utilisateur actuellement connecté
	 * Utilisation : User->findCurrent($_SESSION['user'])
	 */

	public function findCurrent(array $user){
		$data = $this->db->query('SELECT * FROM tusers WHERE id='.$user['id']);
		return $data;
	}

	/*
	 * Supprime un utilisateur
	 * Utilisation : User->delete(25)
	 */

	private function deletes($id){
		$this->db->query("DELETE FROM tusers WHERE id=".$id);
	}
}
