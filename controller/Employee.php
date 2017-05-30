<?php 

class Employee {

	private $host = 'localhost';
	private $user = 'root';
	private $db = 'nissan';
	private $pass = '';
	private $conn;

	public function __construct() {

		try {
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function insertData($pass, $f_name, $mi, $l_name, $dept, $status, $contact, $email, $table) {

		$sql = "INSERT INTO $table
		SET pass=:pass, f_name=:f_name, mi=:mi, l_name=:l_name, dept=:dept, status=:status, contact=:contact, email=:email";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":pass" => $pass, ":f_name" => $f_name, ":mi" => $mi, ":l_name" => $l_name, ":dept" => $dept, ":status" => $status, ":contact" => $contact, ":email" => $email));
		if ($q) {
			return true;
		}
		
	}

	public function searchData($condition) {
		$sql = "SELECT * FROM employee WHERE f_name LIKE ?";
		$q = $this->conn->prepare($sql);
		$q->execute(array('%'.$condition.'%'));

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function updateData($id, $pass, $f_name, $mi, $l_name, $dept, $status, $contact, $email, $table) {
		$sql = "UPDATE $table
		SET pass=:pass, f_name=:f_name, mi=:mi, l_name=:l_name, dept=:dept, status=:status, contact=:contact, email=:email
		WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":id" => $id, ":pass" => $pass, ":f_name" => $f_name, ":mi" => $mi, ":l_name" => $l_name, ":dept" => $dept, ":status" => $status, ":contact" => $contact, ":email" => $email));
		return true;
	}

	public function getDepartment($table) {

		$sql = "SELECT * FROM $table";
		$q = $this->conn->prepare($sql);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function showData($table, $records_per_page = 5) {
		$start = 0;
		if (isset($_GET['page_no'])) {
			$start = ($_GET['page_no'] - 1) * $records_per_page;
		}
		//SELECT employee.*, department.name FROM $table JOIN department ON employee.dept = department.id
		$sql = "SELECT employee.*, department.name AS 'department' FROM $table JOIN department ON employee.dept = department.id LIMIT $start, $records_per_page";

		$q = $this->conn->query($sql) or die("Failed!");

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}
}