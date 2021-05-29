<!--Milos Stupar 0669/15-->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3" style = "background-color: #212529;">
			<div class="submenu text-white text-center">
				<div class="h3 py-lg-5 pt-2">Podesavanja</div>
				<div class="row sub-link-container">
					<div class="col-lg-12 col-md-3 col-sm-6 col-12 sub-link-wraper"> 
						<a class="sub-link <?php if( $subMenu == 1 ) echo 'trenutna-stranica' ?>" href=" <?php echo site_url('RK/podaci_korisnika'); ?> ">
							Podaci korisnika
						</a> 
					</div>
					
					<?php
						if ($this->session->userdata('tip') == 'vlasnik') $this->load->view("partials/link-podesavanja-SpisakUO-Vlasnik.php", array ("subMenu"=>$subMenu));
						if ($this->session->userdata('tip') == 'admin') $this->load->view("partials/link-podesavanja-SpisakUO-Admin.php", array ("subMenu"=>$subMenu));
					?>

					<div class="col-lg-12 col-md-3 col-sm-6 col-12 sub-link-wraper"> 
						<a class="sub-link <?php if( $subMenu == 3 ) echo 'trenutna-stranica' ?> " href="  <?php echo site_url('RK/promeni_lozinku'); ?>  ">
							Promeni lozinku
						</a> 
					</div>
					
					<?php
						if ($this->session->userdata('tip') == 'admin') $this->load->view("partials/link-podesavanja-OdobriStranicu.php", array ("subMenu"=>$subMenu));
					?>

				</div>
				
			</div>
		</div>
		<div class="col-lg-9">