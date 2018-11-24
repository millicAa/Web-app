<?php

    include("init.php");
    $msg = '';


    if(isset($_POST['register'])) {
    		require('userClass.php');
    		$user = new User($mysqli);
    		$user->registracijaKorisnika(trim($_POST['name']),trim($_POST['username']),trim($_POST['password']));
        if($user->getResult()){
          $msg="Uspesno registrovan korisnik";
        }else{
          $msg="Neuspesna registracija korisnika ";
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
            <h3>Registracija</h3>
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
                      <label for="name" class="cols-sm-2 control-label">Ime i prezime</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Ime i prezime"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="username" class="cols-sm-2 control-label">Korisnicko ime</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Korisnicko ime"/>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="password" class="cols-sm-2 control-label">Lozinka</label>
                        <div class="cols-sm-10">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input id="password" type="text" class="form-control" name="password" id="password"  placeholder="Lozinka"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-default btn-md text-left" id="generisiLozinku" style="float:left;">Generisi lozinku</button>
                    <br><br>
                    <div class="form-group ">
                      <input type="submit" name="register" class="btn btn-danger btn-lg " value="Registruj se">
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
<script>

$(document).ready(function() {

	$('#generisiLozinku').click(function() {

		$.ajax({
		  url: 'lozinka.php',
		  dataType: 'json',
		  success: function(json) {


		  		$('#password').val(json);


		  },
			error: function(json) {
		  	console.log(json,password +' error');


		  }
		});

	});

});
</script>
</body>

</html>
