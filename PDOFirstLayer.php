<?php

/**
 * Description of Validation
 *
 * @author Aldson Diego
 */
class MyPDO {

    //connect to mysql
    private $db_host = 'localhost';
    private $db_name = 'caketest';
    private $db_user = 'root';
    private $db_pass = '';

    //useful
    private $conn;
    private $query;


    //Open Connection
    function __construct(){
        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        if (empty($this->conn)) {
            try {
                $this->conn = new PDO($dsn, $this->db_user, $this->db_pass, $opcoes);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    //Execute Query
    public function query($sql){
        try{
            $db = $this->conn->prepare($sql);
            $db->execute();
        }catch(PDOException $e){
            return false;
        }
        $this->query = $db;
        return true;
    }

    //Get Array List
    public function getAll($sql){

        if($this->query($sql)){
            $dados = array();
            try{
                $dados = $this->query->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                $dados = array();
                //$e->getMessage();
            }
            return $dados;
        }
        return null;
    }

    //Get Row
    public function getFirst($sql){
        $this->query($sql);
        return $this->query->fetch(PDO::FETCH_ASSOC);
    }

    // Close Connection
    function __destruct() {
        try {
            $this->conn = null; //Closes connection
        } catch (PDOException $e) {
            //file_put_contents("log/dberror.log", "Date: " . date('M j Y - G:i:s') . " ---- Error: " . $e->getMessage().PHP_EOL, FILE_APPEND);
            die($e->getMessage());
        }
    }//*/
}
?>

