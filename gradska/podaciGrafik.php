<?php
include("init.php");

	$array['cols'][] = array('label' => 'Event','type' => 'string');
    $array['cols'][] = array('label' => 'Broj rezervacija po eventu', 'type' => 'number');

		$sql="SELECT eventName,COUNT(r.reservationID) AS broj FROM event e JOIN reservation r ON (e.eventID=r.eventID) GROUP BY e.eventID";
			if (!$q=$mysqli->query($sql)){
					echo '{"greska":"Nastala je greška pri izvršavanju upita."}';
					exit();
			} else {
			if ($q->num_rows>0){

			$niz[] = array();
			while ($red=$q->fetch_object()){
			 $array['rows'][] = array('c' => array( array('v'=>$red->eventName),array('v'=>(int)$red->broj)) );

			}

			$niz_json = json_encode ($array);
			print ($niz_json);
			} else {
			//ako nema rezultata u bazi
			echo '{"greska":"Nema rezultata."}';
			}
		}


?>
