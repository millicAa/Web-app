<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "gradska";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function noviEvent($data) {
		$mysqli = new mysqli("localhost", "root", "", "gradska");
		$naziv = mysqli_real_escape_string($mysqli,$data["naziv"]);
		$izvodjac = mysqli_real_escape_string($mysqli,$data["izvodjac"]);
		$datum = mysqli_real_escape_string($mysqli,$data["datum"]);

		$sql = "INSERT INTO event (eventName,performerName,date) VALUES ('$naziv','$izvodjac','$datum')";

		if($mysqli->query($sql))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}


		function ubaciKorisnika($data) {
			$mysqli = new mysqli("localhost", "root", "", "gradska");
			$cols = '(name, username, password, isAdmin)';

			$name = mysqli_real_escape_string($mysqli,$data['name']);
			$username = mysqli_real_escape_string($mysqli,$data['username']);
			$password = mysqli_real_escape_string($mysqli,$data['password']);


			$values = "('".$name."','".$username."','".$password."',0)";

			$query = 'INSERT into user (name, username, password, isAdmin) VALUES '.$values;

			if($mysqli->query($query))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$mysqli->close();
		}

	function vratiEventove() {
		$mysqli = new mysqli("localhost", "root", "", "gradska");
		$q = 'SELECT * FROM event ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function vratiTipove() {
		$mysqli = new mysqli("localhost", "root", "", "gradska");
		$q = 'SELECT * FROM type ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}


	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
