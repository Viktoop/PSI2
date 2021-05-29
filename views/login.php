<!--Milica Soljaga 0656/13-->
<div class="login-content">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<form name="loginform" action="<?php echo site_url('Gost/ulogujse') ?>" method="post" 
				  class="jumbotron col-lg-4 col-sm-6 col-10 offset-lg-4 offset-sm-3 offset-1 login-form">
				<div class="form-group">
					<div class="h3 text-center mb-4">User login</div>
				</div>
				<div class="form-group">
					<label for="username">Korisnicko ime:</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="" required>
				</div>
				<div class="form-group">
					<label for="password">Lozinka:</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="" required>
				</div>

				<!-- PORUKA O GRESCI -->
				<div class='text-center' style='color:red; height:24px;'>
					<?php if (isset($poruka)) echo "Neispravni podaci!"; ?>
				</div>
				<!-- END PORUKA O GRESCI -->
				<div class="form-group">
					<button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
				</div>	
				<div class="row mt-4">
					<div class="col text-left">Nemate nalog?</div>
					<div class="col text-right">
						<a href="<?php echo site_url('Gost/registracija'); ?>" class="text-right" ><i>Registruj se!</i></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>