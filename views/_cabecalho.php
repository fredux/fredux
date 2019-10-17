<html>
<head>
 	<title>Cadastro de Estações</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
  <script type="text/javascript" src="<?php echo ROOT_PATH; ?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo ROOT_PATH; ?>assets/js/jquery.maskedinput.js"></script>  
</head>
<body>
<script type="text/javascript"> 
  $(function($){
     $("#mac1").mask("**-**-**-**-**-**");
     $("#mac2").mask("**-**-**-**-**-**");
  });
</script> 
	<nav class="navbar navbar-default" style="background-color:#00205b;">
	 <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
				<!--	<img src="<?php echo ROOT_PATH; ?>images/logo.png"/> -->
        </div>
        <div id="navbar" class="collapse navbar-collapse" >
          <ul class="nav navbar-nav" >
             <li><a href="<?php echo ROOT_URL; ?>Home">Home</a></li>  
          </ul>

          <ul class="nav navbar-nav navbar-right" >
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
            <li><a href="<?php echo ROOT_URL; ?>">Bem-vindo <?php echo $_SESSION['user_data']['name']; ?></a></li>
						<?php if($_SESSION['user_data']['admin']==True) : ?>
								<li><a href="<?php echo ROOT_URL; ?>user/register">Registrar</a></li>
						<?php endif; ?>
            <li><a href="<?php echo ROOT_URL; ?>user/logout">Logout</a></li>
          <?php else : ?>
            <li><a href="<?php echo ROOT_URL; ?>user/login">Login</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
