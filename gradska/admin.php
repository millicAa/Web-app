<?php

    include("init.php");
    require('eventClass.php');
    $msg = '';


    if(isset($_POST['izmeni'])) {

    		$event = new Event($mysqli);
    		$event->izmenaImena(trim($_POST['event']),trim($_POST['ime']));
        if($event->getResult()){
          $msg="Uspesno izmenjeno ime eventa ";
        }else{
          $msg="Neuspesno izmenjeno ime eventa ";
        }
     }

     if(isset($_POST['unosEventa'])) {

     		$event = new Event($mysqli);
     		$event->unosEventa(trim($_POST['name']),trim($_POST['izvodjac']),trim($_POST['datum']));
         if($event->getResult()){
           $msg="Uspesno unet novi event ";
         }else{
           $msg="Neuspesno unosenje novog eventa ";
         }
      }
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Gradska kafana</title>
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/ionicons.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<link href="assets/css/animations.min.css" rel="stylesheet" />
<link href="assets/css/style-solid-black.css" rel="stylesheet" />
<link href="assets/css/jquery-ui.css" rel="stylesheet" />
</head>
<body data-spy="scroll" data-target="#menu-section">

<?php

    include("meni.php");
 ?>
 <?php

     include("slider.php");
  ?>

<!-- Glavna sekcija -->
<section>
    <div class="container">
      <div class="row text-center header">
            <h3>Admin panel</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3> ".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h3> Izmena imena eventa </h3>
            <div class="services-wrapper">
              <form name="changeEventName" method="post" action="">
                  <div class="form-group">
                      <label for="event" class="cols-sm-2 control-label">Event</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="event" >
                              <?php
                                  $event = new Event($mysqli);
                                  $event->allEvents();
                                  $result = $event->getResult();

                                  foreach ($result as $red ) {
                     			            $id = $red['eventID'];
                     			            $name = $red['eventName'];
                                      ?>
                                      <option value="<?php echo $id;?>"><?php echo $name;?></option>
                                      <?php
                                     }
                                     ?>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="ime" class="cols-sm-2 control-label">Novo ime eventa:</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="ime" id="ime"  placeholder="Novo ime eventa"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group ">
                      <input type="submit" name="izmeni" class="btn btn-danger btn-lg " value="Izmeni naziv eventa">
                    </div>
                  </form>
                  <hr />

                  <div class="form-group">
                      <label for="eventSearch" class="cols-sm-2 control-label">Event</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-music fa" aria-hidden="true"></i></span>
                            <select class="form-control" name="eventSearch"  id="eventSearch" onchange="search()">
                              <?php
                                  $event = new Event($mysqli);
                                  $event->allEvents();
                                  $result = $event->getResult();

                                  foreach ($result as $red ) {
                                      $id = $red['eventID'];
                                      $name = $red['eventName'];
                                      ?>
                                      <option value="<?php echo $id;?>"><?php echo $name;?></option>
                                      <?php
                                     }
                                     ?>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div id="tabela"> </div>
                    <hr/>
                      <form name="galerija" method="post" action="novaSlikaGalerija.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="file" class="cols-sm-2 control-label">Nova slika za galeriju:</label>
                            <div class="cols-sm-10">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                                <input type="file" class="form-control" name="file" placeholder="Ubacite sliku za galeriju"/>
                              </div>
                            </div>
                        </div>
                        <div class="form-group ">
                          <input type="submit" name="file" class="btn btn-danger btn-lg " value="Ubaci">
                        </div>
                      </form>
                      <hr/>
                      <h3> Unos eventa </h3>
                      <form name="unosEventa" method="post" action="">
                          <div class="form-group">
                              <label for="name" class="cols-sm-2 control-label">Naziv eventa</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Naziv eventa"/>
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="izvodjac" class="cols-sm-2 control-label">Izvodjac</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="izvodjac" id="izvodjac"  placeholder="Izvodjac"/>
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              <label for="datum" class="cols-sm-2 control-label">Datum</label>
                                <div class="cols-sm-10">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input id="datepicker" type="text" class="form-control" name="datum" id="datum"  placeholder="Datum"/>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group ">
                              <input type="submit" name="unosEventa" class="btn btn-danger btn-lg " value="Unesi event">
                            </div>
                          </form>
                          <br>
                          <hr>
                          <div id="divGrafik"></div>
            </div>
          </div>
        </div>
      </div>
</section>

<?php
    include("footer.php");

 ?>


<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/source/jquery.fancybox.js"></script>
<script src="assets/js/jquery.isotope.js"></script>
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<script src="assets/js/custom-solid.js"></script>
<script src="assets/js/jquery-ui.js"></script>

<script>

		function search(){

			var event = $("#eventSearch").val();
			$.ajax({
				url: "generisiPodatkeSearch.php",
				data: "eventID="+event,
				success: function(result){
				var text = '<table class="table"><thead><tr><th>Event</th><th>Korisnik</th><th>Tip rezervacije</th><th>Datum rezervacije</th><th>Na ime</th><th>Telefon</th><th>Brisanje</th></tr></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					text += '<tr>';
					text += '<td>'+val.eventName+'</td>';
					text += '<td>'+val.name+'</td>';
					text += '<td>'+val.typeName+'</td>';
          text += '<td>'+val.dateOfReservation+'</td>';
					text += '<td>'+val.reservationOnName+'</td>';
          text += '<td>'+val.phoneNumber+'</td>';
					text += '<td><a href="obrisi.php?id='+val.reservationID+'">Obrisi</a></td>';
					text += '</tr>';

					});

					text+='</tbody></table>';
					$('#tabela').html(text);
			}});
		}

</script>
<script>
		$( document ).ready(function() {
			search();
		});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(grafik);

    function grafik() {
      var jsonData = $.ajax({
      url: "podaciGrafik.php",
      dataType:"json",
      async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {'title':'Broj rezervacija po eventu',
     backgroundColor: { fill:'transparent' },
	    titleTextStyle: {
		textAlign: 'center',
        color: 'white',
				fontSize: 18},
	  		'width':800,
      	'height':500,
        is3D:true,
	  legend: {
        textStyle: {
			color: 'white'
        }
    },
	  };

 var chart = new google.visualization.PieChart(document.getElementById('divGrafik'));
 function selectHandler() {
				var selectedItem = chart.getSelection()[0];
				if (selectedItem) {
					alert( data.getValue(selectedItem.row,0));
				}
			}
			google.visualization.events.addListener(chart, 'select', selectHandler);

    chart.draw(data,  options);

  }



</script>
</body>

</html>
