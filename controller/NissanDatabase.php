<?php 

class NissanDatabase {

	private $host = 'localhost';
	private $user = 'root';
	private $db = 'nissan';
	private $pass = '';
	private $conn;

	public function __construct() {
		try {
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->pass);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}

	}

	public function showData($table, $records_per_page = 5) {
		$start = 0;
		if (isset($_GET['page_no'])) {
			$start = ($_GET['page_no'] - 1) * $records_per_page;
		}

		$sql = "SELECT * FROM $table LIMIT $start, $records_per_page";

		$q = $this->conn->query($sql) or die("Failed!");

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function getNumRows($table) {

		$sql = "SELECT * FROM $table";

		$q = $this->conn->query($sql) or die("Failed!");

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

	public function deleteData($id, $table) {

		$sql = "DELETE FROM $table WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(':id' => $id));

		return true;
	}

}
?>