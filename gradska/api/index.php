<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	echo('Popis ruta: <br>');
	echo('------------ <br>');

	echo('GET tipovi.json <br>');
	echo('GET events.json <br>');
	echo('POST ubaciKorisnika.json <br>');
	echo('POST events.json <br>');
});

Flight::register('db', 'Database', array('niz'));

Flight::route('GET /tipovi.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiTipove();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /events.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiEventove();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});


Flight::route('POST /ubaciKorisnika.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->ubaciKorisnika($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Greska!";

	}

	echo indent(json_encode($response));

});
Flight::route('POST /events.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->noviEvent($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response));

});

Flight::start();
?>
