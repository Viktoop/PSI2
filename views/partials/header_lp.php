<!--Lazar Ristic 0658/15-->
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url('css/nav.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('css/lp.css')?>">		
		<link rel="stylesheet" href="<?php echo base_url('css/footer.css')?>">


		<title>Click and Chill</title>
	</head>
	<body>


<!-- NAVIGACIJA -->

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
	<a class="navbar-brand" href=" <?php echo site_url(''); ?> ">Click and Chill</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<div class="ml-auto">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href=" <?php echo site_url('Gost/o_nama'); ?> ">O nama</a>
			</li>
			<li class="nav-item" style="border:none">
				<a class="nav-link" href=" <?php echo site_url('Gost/kontakt'); ?> ">Kontakt</a>
			</li>
		</ul>
		</div>
		<!-- UBACUjE U NAVBAR LOGIN DUGME ILI USER MENU U ZAVISNOSTI OD TOGA DA LI JE KORISNIK LOGINOVAN -->
		<?php 
			if ($this->session->userdata("username") == NULL) $this->load->view("partials/login_btn.php");
			else $this->load->view("partials/user_menu.php");
		?>
	</div>
</nav>

<!-- END NAVIGACIJA -->
