<!--Viktor Galindo 0655/13-->
<!-- OVO JE DROPDOWN KOJI VIDE ULOGOVANI KORISNICI -->
<div class="dropdown">
	<button class="btn btn-outline-light my-sm-0" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<!-- OVDE TREBA UBACITI USERNAME KORISNIKA -->
		<span class="mr-2 text-capitalize">
			<?php  echo $this->session->userdata('username'); ?>
		</span>
		<i class="fas fa-user-cog"></i>
	</button>
	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href=" <?php echo site_url('RK/podaci_korisnika'); ?> ">Podesavanja</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="<?php echo site_url('RK/logout'); ?>">Logout</a>
	</div>
</div>