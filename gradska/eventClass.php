<?php

class Event {

	private $conn;
	private $result;


	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function getResult(){
		return $this->result;
	}

	public function setResult($res){
			$this->result = $res;
	}

	public function allEvents() {

		$curl_zahtev = curl_init("http://localhost/gradska/api/events.json");

		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);
		$this->setResult($json_objekat);
	}

	public function allTypes() {

		$curl_zahtev = curl_init("http://localhost/gradska/api/tipovi.json");

		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);
		$this->setResult($json_objekat);
	}

	public function allReservationBySearch($eventID) {
		$eventID = mysqli_real_escape_string($this->conn,$eventID);

		$q = mysqli_query($this->conn, "SELECT * FROM reservation r join event e on r.eventID= e.eventID join type t on r.typeID=t.typeID join user u on u.userID=r.userID where r.eventID = $eventID");
		$this->setResult($q);
	}


	public function rezervacija($eventID,$typeID,$ime,$phone) {

			$eventID = mysqli_real_escape_string($this->conn,$eventID);
			$typeID = mysqli_real_escape_string($this->conn,$typeID);
			$ime = mysqli_real_escape_string($this->conn,$ime);
			$phone = mysqli_real_escape_string($this->conn,$phone);
			$userID=$_SESSION["user"]["userID"];
			$now =date("Y-m-d H:i:s");
			$sql = "INSERT INTO reservation (typeID,eventID,userID, reservationOnName,phoneNumber,dateOfReservation) VALUES ($typeID,$eventID,$userID, '$ime','$phone','$now')";

		if(mysqli_query($this->conn, $sql)){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}

	public function unosEventa($naziv,$izvodjac,$datum) {

			$naziv = mysqli_real_escape_string($this->conn,$naziv);
			$izvodjac = mysqli_real_escape_string($this->conn,$izvodjac);
			$datum = mysqli_real_escape_string($this->conn,$datum);

			$data = Array (
	    "naziv" => $naziv,
	    "izvodjac" => $izvodjac,
	    "datum" => $datum
	    );

				$zaSlanje = json_encode($data);

				$curl_zahtev = curl_init("http://localhost/gradska/api/events.json");
				curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
				curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $zaSlanje);
				curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
				$curl_odgovor = curl_exec($curl_zahtev);
				$json_objekat=json_decode($curl_odgovor, true);
				curl_close($curl_zahtev);

				if($json_objekat == "Uspesno!") {
					$this->setResult(true);
				}
				else {
					$this->setResult(false);
				}

	}


	public function izmenaImena($eventID,$ime) {

		$eventID = mysqli_real_escape_string($this->conn,$eventID);
		$ime = mysqli_real_escape_string($this->conn,$ime);

		if(mysqli_query($this->conn, "UPDATE event SET eventName='$ime' where eventID=$eventID")){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}



}

?>
