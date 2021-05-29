<!--Lazar Ristic 0658/15-->
<div class="spisak-uo-content mt-5 mx-5">
	
	<div class="row w-100">
        <div class="h4 my-3">Spisak stranica koje cekaju odobrenje:</div>
        
        <!-- Spisak ugostiteljskih objekata -->
		<div class="w-100 mt-4" style="margin-bottom:7vh;">
			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 py-4 my-3 jumbotron" style="border-radius:15px;">
				<div class="col-9">1. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-check"></i></a> </div>
			</div>
				<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 py-4 my-3 jumbotron" style="border-radius:15px;">
				<div class="col-9">2. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-check"></i></a> </div>
			</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 py-4 my-3 jumbotron" style="border-radius:15px;">
				<div class="col-9">3. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-check"></i></a> </div>
			</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 py-4 my-3 jumbotron" style="border-radius:15px;">
				<div class="col-9">4. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-check"></i></a> </div>
			</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 py-4 my-3 jumbotron" style="border-radius:15px;">
					<div class="col-9">5. Naziv ugostiteljskog objekta</div>
					<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
					<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
					<div class="col-1"> <a href="#"><i class="fas fa-check"></i></a> </div>
				</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 py-4 my-3 jumbotron" style="border-radius:15px;">
				<div class="col-9">6. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-check"></i></a> </div>
			</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->
			
			<?php
				if ($this->session->userdata('tip') == 'vlasnik'){
					$linkDodajStranicuUo = site_url('Vlasnik/dodaj_uo');
					echo '<div class="px-3">
					<a class ="btn btn-primary text-white w-100 text-center mt-5 py-2" href="'.$linkDodajStranicuUo.'"> 
						<i class="fas fa-plus mx-3"></i>
						Dodaj ugostiteljski objekat
					</a>
				</div>';
				}
			?>
			

		</div>
		<!-- END Spisak ugostiteljskih objekata -->
	</div>
</div>