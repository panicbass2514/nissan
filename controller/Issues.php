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

	public function updateData($id, $issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, $update_status, $table) {
		$sql = "UPDATE $table
		SET issue_concern=:issue_concern, description=:description, module_location=:module_location, date_reported=:date_reported, status=:status, user=:user, qa_in_charge=:qa_in_charge, cas_reference_no=:cas_reference_no, date_closed=:date_closed, reason_of_error=:reason_of_error, remarks=:remarks, update_status=:update_status
		WHERE id=:id";
		$q = $this->conn->prepare($sql);
		$q->execute(array(":id" => $id, ":issue_concern" => $issue_concern, ":description" => $description, ":module_location" => $module_location, ":date_reported" => $date_reported, ":status" => $status, ":user" => $user, ":qa_in_charge" => $qa_in_charge, ":cas_reference_no" => $cas_reference_no, ":date_closed"=>$date_closed, ":reason_of_error"=>$reason_of_error, ":remarks"=>$remarks, ":update_status" => $update_status));
		return true;	

	}

	public function insertData($issue_concern, $description, $module_location, $date_reported, $status, $user, $qa_in_charge, $cas_reference_no, $date_closed, $reason_of_error, $remarks, $update_status, $table) {
		$sql = "INSERT INTO $table 
		SET issue_concern=:issue_concern, description=:description, module_location=:module_location, date_reported=:date_reported, status=:status, user=:user, qa_in_charge=:qa_in_charge, cas_reference_no=:cas_reference_no, date_closed=:date_closed, reason_of_error=:reason_of_error, remarks=:remarks, update_status=:update_status";
		$q = $this->conn->prepare($sql);		
		$q->execute(array(":issue_concern" => $issue_concern, ":description" => $description, ":module_location" => $module_location, ":date_reported" => $date_reported, ":status" => $status, ":user" => $user, ":qa_in_charge" => $qa_in_charge, ":cas_reference_no" => $cas_reference_no, ":date_closed" => $date_closed, ":reason_of_error" => $reason_of_error, ":remarks" => $remarks, ":update_status" => $update_status));

		return true;
	}
}
?>