<?php
				if ($this->session->userdata('tip') == 'vlasnik'){
					$linkDodajStranicuUo = site_url('Vlasnik/dodaj_uo');
					echo '<div class="px-3 mb-5">
					<a class ="btn btn-primary text-white w-100 text-center mt-5 py-2" href="'.$linkDodajStranicuUo.'"> 
						<i class="fas fa-plus mx-3"></i>
						Dodaj ugostiteljski objekat
					</a>
				</div>';
				}
			?>
			

		</div>
		<!-- END Spisak ugostiteljskih objekata -->

		<!-- Status stranice -->
		<div class="col-5 d-none d-md-block">
			<div class="jumbotron pt-3">
				<div class="h4 mb-3">Status stranice:</div>
