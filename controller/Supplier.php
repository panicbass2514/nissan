<?php 

class Supplier {

	private $host = 'localhost';
	private $user = 'root';
	private $db = 'nissan';
	private $pass = '';
	private $conn = '';

	public function __construct() {

		try {
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function insertData($sup_type, $sup_name, $sup_address_1, $sup_address_2, $sup_zipcode, $sup_telephone, $sup_cphone, $sup_faxphone, $sup_contact_person, $table) {

		$sql = "INSERT INTO $table 
		        SET sup_type=:sup_type, sup_name=:sup_name, sup_address_1=:sup_address_1, sup_address_2=:sup_address_2, sup_zipcode=:sup_zipcode, sup_telephone=:sup_telephone, sup_cphone=:sup_cphone, sup_faxphone=:sup_faxphone, sup_contact_person=:sup_contact_person";

		$q = $this->conn->prepare($sql);
		$q->execute(array(
			':sup_type' => $sup_type,
			':sup_name' => $sup_name,
			':sup_address_1' => $sup_address_1,
			':sup_address_2' => $sup_address_2,
			':sup_zipcode' => $sup_zipcode,
			':sup_telephone' => $sup_telephone,
			':sup_cphone' => $sup_cphone,
			':sup_faxphone' => $sup_faxphone,
			':sup_contact_person' => $sup_contact_person)
		);

		return true;
	}

	public function searchData($condition) {
		$sql = "SELECT * FROM supplier WHERE sup_name LIKE ?";
		$q = $this->conn->prepare($sql);
		$q->execute(array('%'.$condition.'%'));

		while($r = $q->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $r;
		}
		return $data;
	}

	public function udpateData($sup_type, $sup_name, $sup_address_1, $sup_address_2, $sup_zipcode, $sup_telephone, $sup_cphone, $sup_faxphone, $sup_contact_person, $table) {
		$sql = "UPDATE $table
		        SET sup_type=:sup_type, sup_name=:sup_name, sup_address_1=:sup_address_1, sup_address_2=:sup_address_2, sup_zipcode=:sup_zipcode, sup_telephone=:sup_telephone, sup_cphone=:sup_cphone, sup_faxphone=:sup_faxphone, sup_contact_person=:sup_contact_person
		        WHERE id=:id";
		        $q = $this->conn->prepare($sql);
		        $q->execute(array(
		        	':id' => $id,
					':sup_type' => $sup_type,
					':sup_name' => $sup_name,
					':sup_address_1' => $sup_address_1,
					':sup_address_2' => $sup_address_2,
					':sup_zipcode' => $sup_zipcode,
					':sup_telephone' => $sup_telephone,
					':sup_cphone' => $sup_cphone,
					':sup_faxphone' => $sup_faxphone,
					':sup_contact_person' => $sup_contact_person)
		); 
		return true;  
	}
}