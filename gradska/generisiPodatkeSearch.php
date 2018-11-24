<?php
include("init.php");
require('eventClass.php');
$eventID=$_GET['eventID'];
$event = new Event($mysqli);
$event->allReservationBySearch($eventID);
$result = $event->getResult();
$niz = array();
$iterator = 0;
while($red = mysqli_fetch_assoc($result)) {
      $niz[$iterator] = $red;
      $iterator++;
   }

   echo(json_encode($niz));


 ?>
