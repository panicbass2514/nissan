<?php 

class Inventory {

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

	public function insertData($name, $label, $model_name, $model_number, $serial_code, $po_no, $date_accquired, $remarks, $table) {
		$sql = "INSERT INTO $table 
		SET name=:name, label=:label, model_name=:model_name, model_number=:model_number, serial_code=:serial_code, po_no=:po_no, date_accquired=:date_accquired, remarks=:remarks";
		$q = $this->conn->prepare($sql);		
		$q->execute(array(":name" => $name, ":label" => $label, ":model_name" => $model_name, ":model_number" => $model_number, ":serial_code" => $serial_code, ":po_no" => $po_no, ":date_accquired" => $date_accquired, ":remarks" => $remarks));
		return true;
	}

	public function searchData($condition) {
		$sql = "SELECT * FROM item WHERE label LIKE ?";
		$q = $this->conn->prepare($sql);
		$q->execute(array('%'.$condition.'%'));

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function getInventory($table) {
		$sql = "SELECT * FROM $table";

		$q = $this->conn->query($sql) or die("Failed!");

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;

			$json_data = json_encode($data);
		}

		return $json_data;
  
	}

	public function updateData($id, $name, $label, $model_name, $model_number, $serial_code, $po_no, $date_accquired, $remarks, $table) {
		$sql = "UPDATE $table
		SET name=:name, label=:label, model_name=:model_name, model_number=:model_number, serial_code=:serial_code, po_no=:po_no, date_accquired=:date_accquired, remarks=:remarks
		WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":id" => $id, ":name" => $name, ":label" => $label, ":model_name" => $model_name, ":model_number" => $model_number, ":serial_code" => $serial_code, ":po_no" => $po_no, ":date_accquired" => $date_accquired, ":remarks" => $remarks));
		return true;	
	}
}