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

	public function insertData($pass, $f_name, $mi, $l_name, $dsg, $dept, $bch, $status, $contact, $email, $table) {

		$sql = "INSERT INTO $table
		SET pass=:pass, f_name=:f_name, mi=:mi, l_name=:l_name, dsg=:dsg,  dept=:dept, bch=:bch, status=:status, contact=:contact, email=:email";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":pass" => $pass, ":f_name" => $f_name, ":mi" => $mi, ":l_name" => $l_name, ":dsg" => $dsg, ":dept" => $dept, ":bch" => $bch, ":status" => $status, ":contact" => $contact, ":email" => $email));
		if ($q) {
			return true;
		}
		
	}

	public function login_detail($user_id, $login_date) {
		$sql = "INSERT INTO employee_logs
		SET employee_id = :employee_id, log_in = :log_in";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":employee_id" => $user_id, ":log_in" => $login_date));
		if ($q) {
			return true;
		}
	}

	public function logout_detail($user_id, $logout_date) {
		$sql = "UPDATE employee_logs
		SET log_out = :log_out
		WHERE employee_id = :employee_id
		ORDER BY log_in DESC
		LIMIT 1";
		$q = $this->conn->prepare($sql);
		$q->execute(array(':log_out' => $logout_date, ':employee_id' => $user_id));
		return true;
	}

	
	public function updateData($id, $pass, $f_name, $mi, $l_name, $dsg, $dept, $bch, $status, $contact, $email, $table) {
		$sql = "UPDATE $table
		SET pass=:pass, f_name=:f_name, mi=:mi, l_name=:l_name, dsg=:dsg, dept=:dept, bch=:bch, status=:status, contact=:contact, email=:email
		WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":id" => $id, ":pass" => $pass, ":f_name" => $f_name, ":mi" => $mi, ":l_name" => $l_name, ":dsg" => $dsg, ":dept" => $dept, ":bch" => $bch, ":status" => $status, ":contact" => $contact, ":email" => $email));
		return true;
	}

	public function getDesignation($table) {
		$sql = "SELECT * FROM $table";
		$q = $this->conn->prepare($sql);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
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

	public function getBranch($table) {
		$sql = "SELECT * FROM $table";
		$q = $this->conn->prepare($sql);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function login($email, $pass) {
		$sql = "SELECT * FROM employee WHERE email = :email AND pass = :pass";
		$q = $this->conn->prepare($sql);

		$q->execute(array(':email' => $email, ':pass' => $pass));

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}

		$count = $q->rowCount();

		@$result = array($data, $count);


		return $result;
	}


	public function getEmployee($id) {

		$sql = "SELECT * FROM employee WHERE id = :id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(':id' => $id));

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}

		return $data;
	}

	public function showEmployee($table) {
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

		$sql = "SELECT employee.*, designation.name AS 'designation', department.name AS 'department', branch.name AS 'branch' 
		FROM $table 
		JOIN designation ON employee.dsg = designation.id
		JOIN department ON employee.dept = department.id
		JOIN branch ON employee.bch = branch.id 
		LIMIT $start, $records_per_page";

		$q = $this->conn->query($sql) or die("Failed!");

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function searchData($condition) {
		$sql = "SELECT employee.*, designation.name AS 'designation', department.name AS 'department', branch.name AS 'branch' FROM employee 
		JOIN designation ON employee.dsg = designation.id
		JOIN department ON employee.dept = department.id
		JOIN branch ON employee.bch = branch.id 
		WHERE f_name LIKE ?";
		$q = $this->conn->prepare($sql);
		$q->execute(array('%'.$condition.'%'));

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}
	public function sortData($condition, $records_per_page = 5) {
		$start = 0;

		if (isset($_GET['page_no'])) {
			$start = ($_GET['page_no'] - 1) * $records_per_page;
		}
		
		$sql = "SELECT employee.*, designation.name AS 'designation', department.name AS 'department', branch.name AS 'branch' 
		FROM employee
		JOIN designation ON employee.dsg = designation.id
		JOIN department ON employee.dept = department.id
		JOIN branch ON employee.bch = branch.id
		ORDER BY $condition LIMIT $start, $records_per_page";

		$q = $this->conn->query($sql) or die("Failed!");


		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;

	}


}