<?php

    include("init.php");
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
</head>
<body data-spy="scroll" data-target="#menu-section">

<?php

    include("meni.php");
 ?>
 <?php

     include("slider.php");
  ?>


<section id="services" >
<div class="container">
<div class="row text-center header">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
<h3>Ponuda</h3>
<hr />
</div>
</div>
<div class="row animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-document"></i>
<h3>Rezervacije</h3>
Rezervacije se vrse svakoga dana. Vrlo cesto nestanu sva slobodna mesta tako da par dana pred neki dogadjaj znamo da je nasa kafana puna.
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-volume-high"></i>
<h3>Najbolja muzika u gradu</h3>
Dodjite i uverite se zasto je kod nas najbolja muzika u gradu. Nedeljom je specijal, i za vas uvek svira i peva Zile Hram.
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-ios-wineglass"></i>
<h3>Najpovoljnije cene pica</h3>
Cene pica u nasoj kafani su verovatno najpovoljnije u Beogradu. Uvek postoje par promocija pica gde stvarno imate mogucnost ustede.
</div>
</div>

</div>
</div>
</section>
<!-- Glavna sekcija -->
<section>
  <div class="container">
  <div class="row text-center header">
  <h3>Eventovi</h3>
  <hr />

  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="services-wrapper">
    <?php
        include("eventClass.php");
        $event = new Event($mysqli);
        $event->allEvents();
        $result = $event->getResult();



	       if(count($result) >0) {
           ?>
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Naziv</th>
                  <th class="text-center">Izvodjac</th>
                  <th class="text-center">Datum</th>
                </tr>
              </thead>
              <tbody>
           <?php

		         foreach ($result as $red ) {
			            $id = $red['eventID'];
			            $name = $red['eventName'];
                  $performer = $red['performerName'];
                  $date = $red['date'];
                  ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $performer; ?></td>
                    <td><?php echo $date; ?></td>
                  </tr>


                  <?php

		         }

             ?>
           </tbody>
         </table>
             <?php
	     }else{
          ?>
          <h1> Nema rezultata u tabeli </h1>
         <?php
       }

     ?>

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
</body>

</html>
