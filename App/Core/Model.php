<?php namespace App\Core\Model;
 use App\Core\Database\Database;
use App\Core\Request\Request;

class Model {
  	
    protected $tab;
    protected $fields =[];
    protected $tab_fields =[];
    /* init database connection in model */

    public function __construct($tab)
    {
        $this->db = new Database(DB_NAME, DB_USER, DB_PASS, DB_HOST, $db_type = 'mysql');
        $this->tab = $tab;

    }

    public function setTabFields($field =[]){
        foreach ($field as $key => $value) {
            $this->fields[$key] = $value;
        }
    }

      /**
       * @param null $array
       * @return array|bool
       */
      public function create($array = null){
        $sql = "INSERT INTO $this->tab";
        (!is_null($array))? $sql .= $this->query_construct($array): $sql .= $this->query_construct($this->fields);
        return $this->db->query($sql);
    }

      /**
       * @param $tab
       * @return string
       */
      protected function query_construct($tab) {
        $sql="";
          $sql .= " (`".implode("`, `", array_keys($tab))."`)";
        $sql .= " VALUES ('".implode("', '", $tab)."') ";
        return $sql;
      }


    /**
     * @param null $id
     * @return array|bool
     */
    public function read($id = null){
          (is_null($id))? $sql = "SELECT * FROM $this->tab" : $sql = "SELECT * FROM $this->tab WHERE id=".$id;
          return $this->db->query($sql);
      }


      /**
       * @param $id
       * @return array|bool
       */
      public function update($id){
          $sql = "UPDATE $this->tab SET ";
          $temp =[];

          foreach ($this->fields as $key => $value) {
              $temp[] = $key.'= "'.$value.'"';
          }

          $sql .= implode(',', $temp);
          $sql .= 'WHERE id="'.$id;
          return $this->db->query($sql);
      }


      /**
       * delete selected id in database table
       *
       * @param $id
       * @return array|bool
       */
      public function delete($id){
          $sql = "DELETE FROM $this->tab WHERE id='".$id."'";
          return $this->db->query($sql);
      }


      public function retrieveId($field, $key){
          $sql = "SELECT id FROM $this->tab WHERE $field ='".$key."'";
          var_dump($sql);
          $data = Request::cleanInput($this->db->query($sql));
          return intval($data['id']);
      }

  }
 ?>
