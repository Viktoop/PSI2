
<!--Viktor Galindo 0655/13-->
<div class="register-content">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<form action="<?php echo site_url('Gost/reg');?>" method="POST" 
				  class="jumbotron py-4 col-lg-4 col-sm-6 col-10 offset-lg-4 offset-sm-3 offset-1 register-form">
				<div class="form-group">
					<div class="h3 text-center">Register</div>
				</div>
				<div class="form-group mb-1">
					<label for="user">Korisnicko ime:</label>
					<input type="text" class="form-control" id="user" name="username" placeholder=""
						   value = "<?php if (isset($data['username'])) echo $data['username']; ?>">
				</div>

				<!-- PORUKA O GRESCI -->
				<div class='text-center mb-2' style='color:red; height:24px;'>
					<?php if (isset($poruka['username'])) echo $poruka['username']; ?>
				</div>
				<!-- END PORUKA O GRESCI -->

				<div class="form-group mb-1">
					<label for="lozinka">Lozinka:</label>
					<input type="password" class="form-control" id="lozinka" name="password" placeholder=""
						   value = "<?php if (isset($data['password'])) echo $data['password']; ?>">
				</div>

				<!-- PORUKA O GRESCI -->
				<div class='text-center mb-2' style='color:red; height:24px;'>
					<?php if (isset($poruka['password'])) echo $poruka['password']; ?>
				</div>
				<!-- END PORUKA O GRESCI -->

				<div class="form-group mb-1">
						<label for="potvrda">Potvrda lozinke:</label>
						<input type="password" class="form-control" id="potvrda" name="passwordconfirm" placeholder="">
				</div>

				<!-- PORUKA O GRESCI -->
				<div class='text-center mb-2' style='color:red; height:24px;'>
					<?php if (isset($poruka['confirm'])) echo $poruka['confirm']; ?>
				</div>
				<!-- END PORUKA O GRESCI -->

				<div class="form-group">
						<label for="tipKorisnika">Tip korisnika:</label>
						<div>
							<label> 
									&nbsp &nbsp
									<input type="radio" name="tipKorisnika" id="standardni" value="korisnik" checked>
								Standardni korisnik
							</label>
						</div>
						<div>
							<label> 
									&nbsp &nbsp
									<input type="radio" name="tipKorisnika" id="vlasnik" value="vlasnik">
								Vlasnik ugostiteljskog objekta
							</label>
						</div>
						
						
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary w-100">Register</button>
				</div>	
				
			</form>
		</div>
	</div>
</div>


