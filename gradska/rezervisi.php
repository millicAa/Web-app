<?php

    include("init.php");
    require('eventClass.php');
    $msg = '';


    if(isset($_POST['rezervisi'])) {

    		$event = new Event($mysqli);
    		$event->rezervacija(trim($_POST['event']),trim($_POST['type']),trim($_POST['ime']),trim($_POST['phone']));
        if($event->getResult()){
          $msg="Uspesno rezervisano";
        }else{
          $msg="Neuspesna rezervacija ";
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
            <h3>Rezervacija</h3>
            <hr />
            <?php
              if($msg!=''){
                echo("<h3> ".$msg."</h3>");
              }
            ?>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="services-wrapper">
              <form name="registracija" method="post" action="">
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
                        <label for="type" class="cols-sm-2 control-label">Tip stola</label>
                          <div class="cols-sm-10">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-magic fa" aria-hidden="true"></i></span>
                              <select class="form-control" name="type" >
                                <?php
                                    $event = new Event($mysqli);
                                    $event->allTypes();
                                    $result = $event->getResult();

                                    foreach ($result as $red ) {
                       			            $id = $red['typeID'];
                       			            $name = $red['typeName'];
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
                      <label for="ime" class="cols-sm-2 control-label">Rezervacija na ime:</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="ime" id="ime"  placeholder="Rezervacija na ime"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="phone" class="cols-sm-2 control-label">Broj telefona</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i></span>
                            <input id="phone" type="text" class="form-control" name="phone" id="phone"  placeholder="Broj telefona"/>
                          </div>
                        </div>
                    </div>
                    <div class="form-group ">
                      <input type="submit" name="rezervisi" class="btn btn-danger btn-lg " value="Rezervisi">
                    </div>
                  </form>

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
