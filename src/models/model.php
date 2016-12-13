<?php

namespace roommates\hw5\models;
require_once 'vendor/autoload.php';

use \roommates\hw5\configs as c;

/**
* This class is used for handling information needed by view.
*/
class Model{
	private $BASE_URL = "localhost";
	private $SERVERNAME = "localhost";
	private $USERNAME = "root";
	private $PASSWORD = null;
	private $DB = "Hw5";
	
	private $mysqli;
	private $select;
	private $insert;
	private $md5;
	private $UserName;
	private $wish;
	private $fountainNum;
	private $fountainName;
	private $fountainLocation;
	
	private $result;
	
	function __construct(){ // Singleton
		
		$this->mysqli = new \mysqli($this->SERVERNAME, $this->USERNAME, $this->PASSWORD);
		if ($this->mysqli->connect_error) {
		   throw new Exception("Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . 
						$this->mysqli->connect_error .	"<br>You may have forgotten to create the DB. ".
						"Try running CreateDB.php from the cmd");
		} 
		if($this->mysqli->query("use ". $this->DB) !== TRUE){
			throw new \Exception("Error: " . $this->mysqli->error);
		}
		
		if($this->select = $this->mysqli->prepare("SELECT * FROM Wishes WHERE md5 = ?")){
			$this->select->bind_param("s", $this->md5);
			$this->select->bind_result($this->result["md5"], 
									   $this->result["UserName"], 
									   $this->result["wish"],
									   $this->result["fountainNum"],
									   $this->result["fountainName"],
									   $this->result["fountainLocation"]
									   );
		}
		else{
			throw new Exception("Failure to prepare SELECT statement");
		}
		
		if($this->insert = $this->mysqli->prepare("INSERT INTO Wishes VALUES(?,?,?,?,?,?)") ){
			$this->insert->bind_param("sssiss", $this->md5, 
											  $this->UserName, 
											  $this->wish,
											  $this->fountainNum,
											  $this->fountainName,
											  $this->fountainLocation
											  );
		}
		else{
			throw new Exception("Failure to prepare INSERT statement");
		}
		
	}
	
	public function insert($md5, $UserName, $wish, $fountainNum, $fountainName, $fountainLocation){
		$this->md5 = $md5;
		$this->UserName = $UserName;
		$this->wish = $wish;
		$this->fountainNum = $fountainNum;
		$this->fountainName = $fountainName;
		$this->fountainLocation = $fountainLocation;
		$this->insert->execute();
	}
	
	public function select($md5){
		$this->md5 = $md5;
		$this->select->execute();
		$this->select->fetch(); 
		return $this->result;
	}
	
	public function closeConn(){
		$this->mysqli->close();
	}
	
}
