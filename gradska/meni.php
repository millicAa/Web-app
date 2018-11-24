<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">

GRADSKA KAFANA

</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="index.php">HOME</a></li>
<li><a href="onama.php">O NAMA</a></li>
<li><a href="galerija.php">GALERIJA</a></li>
<li><a href="pesme.php">PESME</a></li>
<?php
  if(!empty($_SESSION['user'])){
    ?>
    <li><a href="rezervisi.php">REZERVISI</a></li>
    <?php
    if($_SESSION['user']['isAdmin']){
      ?>
      <li><a href="admin.php">ADMIN PANEL</a></li>
      <?php
    }
    ?>
    <li><a href="logout.php">LOGOUT</a></li>
    <?php
  }else{
    ?>
    <li><a href="register.php">REGISTER</a></li>
    <li><a href="login.php">LOGIN</a></li>
    <?php
  }
 ?>

</ul>
</div>

</div>
</div>
