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
		}

		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}	

	public function showData($table, $records_per_page = 5) {
		$start = 0;

		if (isset($_GET['page_no'])) {
			$start = ($_GET['page_no'] - 1) * $records_per_page;
		}

		$sql = "SELECT * FROM $table LIMIT $start, $records_per_page";

		$q = $this->conn->query($sql) or die("failed!");

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}

		return $data;
	}

	public function getNumRows($table) {
		$sql = "SELECT * FROM $table";

		$q = $this->conn->query($sql) or die("Failed");

		$row = $q->rowCount();

		return $row;
	}

	public function getById($id, $table) {

		$sql = "SELECT * FROM $table WHERE id = :id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(':id' => $id));
		$data = $q->fetch(PDO::FETCH_ASSOC);

		return $data;
	}

	public function updateData($id, $name, $label, $model_name, $model_number, $serial_code, $po_no, $date_accquired, $remarks, $table) {
		$sql = "UPDATE $table
		SET name=:name, label=:label, model_name=:model_name, model_number=:model_number, serial_code=:serial_code, po_no=:po_no, date_accquired=:date_accquired, remarks=:remarks
		WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":id" => $id, ":name" => $name, ":label" => $label, ":model_name" => $model_name, ":model_number" => $model_number, ":serial_code" => $serial_code, ":po_no" => $po_no, ":date_accquired" => $date_accquired, ":remarks" => $remarks));
		return true;	

	}

	public function insertData($name, $label, $model_name, $model_number, $serial_code, $po_no, $date_accquired, $remarks, $table) {
		$sql = "INSERT INTO $table 
		SET name=:name, label=:label, model_name=:model_name, model_number=:model_number, serial_code=:serial_code, po_no=:po_no, date_accquired=:date_accquired, remarks=:remarks";
		$q = $this->conn->prepare($sql);		
		$q->execute(array(":name" => $name, ":label" => $label, ":model_name" => $model_name, ":model_number" => $model_number, ":serial_code" => $serial_code, ":po_no" => $po_no, ":date_accquired" => $date_accquired, ":remarks" => $remarks));

		return true;
	}

	public function deleteData($id, $table) {

		$sql = "DELETE FROM $table WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(':id' => $id));

		return true;
	}
}