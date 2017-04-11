<?php 

class Workstation {

	private $host = "localhost";
	private $user = "root";
	private $db = "nissan";
	private $pass = "";
	private $conn;

	public function __construct() {

		try {
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->pass);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}	

	public function updateData($id, $cpu_name, $employee, $blocked_sites, $table) {
		$sql = "UPDATE $table
		SET cpu_name=:cpu_name, employee=:employee, blocked_sites=:blocked_sites
		WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":id" => $id, ":cpu_name" => $cpu_name, ":employee" => $employee, ":blocked_sites" => $blocked_sites));

		return true;	

	}

	public function insertData($cpu_name, $employee, $blocked_sites, $table) {
		$sql = "INSERT INTO $table 
		SET cpu_name=:cpu_name, employee=:employee, blocked_sites=:blocked_sites";
		$q = $this->conn->prepare($sql);		
		$q->execute(array(":cpu_name" => $cpu_name, ":employee" => $employee, ":blocked_sites" => $blocked_sites));

		return true;
	}

	public function searchData($condition) {
		$sql = "SELECT * FROM workstation WHERE cpu_name LIKE ?";
		$q = $this->conn->prepare($sql);
		$q->execute(array('%'.$condition.'%'));
		
		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}
}