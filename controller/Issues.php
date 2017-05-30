<?php  

class Issues {

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

	public function insertData($issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, $table) {
		$sql = "INSERT INTO $table 
		SET issue_concern=:issue_concern, description=:description, module_location=:module_location, date_reported=:date_reported, status=:status, user=:user, qa_in_charge=:qa_in_charge, cas_reference_no=:cas_reference_no, date_closed=:date_closed, reason_of_error=:reason_of_error, remarks=:remarks";
		$q = $this->conn->prepare($sql);		
		$q->execute(array(":issue_concern" => $issue_concern, ":description" => $description, ":module_location" => $module_location, ":date_reported" => $date_reported, ":status" => $status, ":user" => $user, ":qa_in_charge" => $qa_in_charge, ":cas_reference_no" => $cas_reference_no, ":date_closed" => $date_closed, ":reason_of_error" => $reason_of_error, ":remarks" => $remarks));
		return true;
	}

	public function searchData($condition) {
		$sql = "SELECT * FROM issues WHERE cas_reference_no LIKE ?";
		$q = $this->conn->prepare($sql);
		$q->execute(array('%'.$condition.'%'));

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function updateData($id, $issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, $table) {
		$sql = "UPDATE $table
		SET issue_concern=:issue_concern, description=:description, module_location=:module_location, date_reported=:date_reported, status=:status, user=:user, qa_in_charge=:qa_in_charge, cas_reference_no=:cas_reference_no, date_closed=:date_closed, reason_of_error=:reason_of_error, remarks=:remarks
		WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":id" => $id, ":issue_concern" => $issue_concern, ":description" => $description, ":module_location" => $module_location, ":date_reported" => $date_reported, ":status" => $status, ":user" => $user, ":qa_in_charge" => $qa_in_charge, ":cas_reference_no" => $cas_reference_no, ":date_closed"=>$date_closed, ":reason_of_error"=>$reason_of_error, ":remarks"=>$remarks));
		return true;	
	}

	public function getModule($table) {

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

		$sql = "SELECT issues.*, eric_module.module AS 'module' FROM $table JOIN eric_module ON issues.module_location = eric_module.id LIMIT $start, $records_per_page";

		$q = $this->conn->query($sql) or die("Failed!");

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}
}
