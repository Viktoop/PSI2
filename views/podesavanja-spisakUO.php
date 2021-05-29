<!--Lazar Ristic 0658/15,Viktor Galindo 0655/13-->
<div class="spisak-uo-content mt-5 mx-5">
	
	<div class="row">
		<!-- Spisak ugostiteljskih objekata -->
		<div class="col-md-7 col">
			<div class="h4 my-3">Spisak ugostiteljskih objekata:</div>

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 pt-4">
				<div class="col-9">1. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="far fa-trash-alt"></i></a> </div>
			</div>
				<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 pt-4">
				<div class="col-9">2. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="far fa-trash-alt"></i></a> </div>
			</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 pt-4">
				<div class="col-9">3. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="far fa-trash-alt"></i></a> </div>
			</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 pt-4">
				<div class="col-9">4. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="far fa-trash-alt"></i></a> </div>
			</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 pt-4">
					<div class="col-9">5. Naziv ugostiteljskog objekta</div>
					<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
					<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
					<div class="col-1"> <a href="#"><i class="far fa-trash-alt"></i></a> </div>
				</div>
			<!-- END Jedan red u spisku ugostiteljskih objekata -->

			<!-- Jedan red u spisku ugostiteljskih objekata -->
			<div class="row px-3 pt-4">
				<div class="col-9">6. Naziv ugostiteljskog objekta</div>
				<div class="col-1"> <a href="#"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="#"><i class="far fa-trash-alt"></i></a> </div>
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

		<!-- Status stranice -->
		<div class="col-5 d-none d-md-block">
			<div class="jumbotron pt-3">
				<div class="h4 mb-3">Status stranice:</div>

				<div class="row px-3 pt-4">
					<div class="col"><input type="radio" name = "radio-status1" id = "radio11" checked> Vidljiva svima</div>
					<div class="col"><input type="radio" name = "radio-status1" id = "radio12"> Privatna </div>
				</div>
				

				<div class="row px-3 pt-4">
					<div class="col"><input type="radio" name = "radio-status2" id = "radio21" checked> Vidljiva svima</div>
					<div class="col"><input type="radio" name = "radio-status2" id = "radio22"> Privatna </div>
				</div>

				<div class="row px-3 pt-4">
					<div class="col"><input type="radio" name = "radio-status3" id = "radio31" > 
						<span class = "">Vidljiva svima</span>
					</div>
					<div class="col"><input type="radio" name = "radio-status3" id = "radio32" checked> Privatna </div>
				</div>

				<div class="row px-3 pt-4">
					<div class="col"><input type="radio" name = "radio-status4" id = "radio41" > Vidljiva svima</div>
					<div class="col"><input type="radio" name = "radio-status4" id = "radio42" checked> Privatna </div>
				</div>

				<div class="row px-3 pt-4">
					<div class="px-3 font-weight-bold"><i>Stranica ceka odobrenje Admina.</i></div>
				</div>

				<div class="row px-3 pt-4">
					<div class="px-3 font-weight-bold"><i>Stranica ceka odobrenje Admina.</i></div>
				</div>

				<div class="px-3">
					<a class ="btn btn-primary text-white w-100 text-center mt-5 py-2"> 
						<i class="fas fa-cloud-download-alt mr-3"></i>
						Sacvaj izmene
					</a>
				</div>

			</div>
		</div>
		<!-- END Status stranice -->
	</div>
</div>