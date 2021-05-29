<!--Lazar Ristic 0658/15-->
<input type="hidden" id="uoid" name="uoid" value="0">

<!-- HEADER STRANICE LOKALA -->
<div class="container mt-3">
	<div class="rez-form jumbotron pt-3 pb-2" >
		<div class="row">
			<!-- LEVI DEO ZAGLAVLJA -->
			<div class="col-md-5 pr-5 pl-0">
				<!-- CAROUSEL -->
				<div id="carouselExampleControls" class="carousel slide  granica" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="<?php if(array_key_exists(1,$slika)) echo base_url('img/uo/'.$slika[1]); else echo base_url('img/restoran.jpg');  ?>" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="<?php if(array_key_exists(2,$slika)) echo base_url('img/uo/'.$slika[2]); else echo base_url('img/restoran.jpg');  ?>" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="<?php if(array_key_exists(3,$slika)) echo base_url('img/uo/'.$slika[3]); else echo base_url('img/restoran.jpg');  ?>" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<!-- END CAROUSEL -->
			</div>
			<!-- END LEVI DEO ZAGLAVLJA -->


			<!-- DESNI DEO ZAGLAVLJA -->
			<div class="col-md-7 mb-8 px">
				
				<!-- NAZIV LOKALA I OCENA -->
				<div class="row">
					<div class="h4">
						<?php echo $data->Naziv ?>
						<span class="tag h6 py-1 text-white ml-2 px-3 bg-success"><?php echo $data->AvgOcena ?></span>	
					</div>
				</div>
				<!-- END NAZIV LOKALA I OCENA -->
				
				<div class="row">
					<div class="col-sm-7">
						<!-- ADRESA -->
							<div class="row mb-2">
								<div class="h6"><?php echo $data->Adresa ?></div>
							</div>	
						<!-- END ADRESA -->

						<!-- TAG VRSTA UO -->
						<div class="row mb-2">
							<span class="tag mr-2 px-3 bg-<?php if($data->JeRestoran) {echo 'primary text-white';}else{echo 'light';}?>">Restoran</span>
							<span class="tag mr-2 px-3 bg-<?php if($data->JeKafic) {echo 'primary text-white';}else{echo 'light';}?>">Kafić</span>
							<span class="tag mr-2 px-3 bg-<?php if($data->JeBrzaHrana) {echo 'primary text-white';}else{echo 'light';}?>">Brza hrana</span>
						</div>
						<!-- END TAG VRSTA UO -->

						<!-- RADNO VREME BLOCK -->
						<div class="row">
							<div class="h5">Radno vreme:</div>
						</div>
						<div class="row mb-2">
							<div class="h6 col-sm-6">pon-pet:</div>
							<div class="h6 col-sm-6"><?php echo $data->PonPet?></div>
							<div class="h6 col-sm-6">subota:</div>
							<div class="h6 col-sm-6"><?php echo $data->Sub?></div>
							<div class="h6 col-sm-6">nedelja:</div>
							<div class="h6 col-sm-6"><?php echo $data->Ned?></div>
						</div>
						<!-- END RADNO VREME BLOCK -->
					</div>
					<div class="col-sm-5">
						<div class="">
							<img class="img-fluid img-thumbnail w-100"  src="<?php if(array_key_exists(2,$slika)) echo base_url('img/uo/'.$slika[2]); else echo base_url('img/restoran.jpg');  ?>" alt>
						</div>
					</div>
				</div>
				<!-- TAGOVI -->
				<div class="row mt-2">
					<span class="h5 mr-2">Tagovi:</span>
					<?php 
						$this->load->view('partials/tag.php',$tagovi);
					?>						
				</div>
				<!-- END TAGOVI -->
			</div>
			<!-- DESNI DEO ZAGLAVLJA -->

			<!--THUMBNAILOVI-->

			<div class="container mt-3" style="border-top: 1px solid #aaa;">
				<div class="row y-3 uo-slika-container">
					<img src="<?php if(array_key_exists(1,$slika)) echo base_url('img/uo/'.$slika[1]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-1">
					<img src="<?php if(array_key_exists(2,$slika)) echo base_url('img/uo/'.$slika[2]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-2">
					<img src="<?php if(array_key_exists(3,$slika)) echo base_url('img/uo/'.$slika[3]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-3">
					<img src="<?php if(array_key_exists(4,$slika)) echo base_url('img/uo/'.$slika[4]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-4">
					<img src="<?php if(array_key_exists(5,$slika)) echo base_url('img/uo/'.$slika[5]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-5">
					<img src="<?php if(array_key_exists(6,$slika)) echo base_url('img/uo/'.$slika[6]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-6">
					<img src="<?php if(array_key_exists(7,$slika)) echo base_url('img/uo/'.$slika[7]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-7">
					<img src="<?php if(array_key_exists(8,$slika)) echo base_url('img/uo/'.$slika[8]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-8">
					<img src="<?php if(array_key_exists(9,$slika)) echo base_url('img/uo/'.$slika[9]); else echo base_url('img/restoran.jpg');  ?>" class="uo-slika my-3" id="thumb-9">
				</div>
				<!--END THUMBNAILOVI-->
			</div>
		</div>
	</div>
</div>
<!-- END HEADER STRANICE LOKALA -->


<!-- OPIS -->
<div class="container">
	<div class="rez-form jumbotron ">
		<div class="h3">Opis:</div>
		<div id="opis"><p><?php echo $data->Opis?></p></div>
	</div>
</div>	
<!-- END OPIS -->

<!-- IZDVAJAMO SA MENIA - PO CEMU SE RAZLIKUJEMO OD DRUGIH - ZASTO DA DODJETE KOD NAS -->
<div class="container">
	<div class="row">
		<div class="col" style="height:inherit;">
			<div class="jumbotron rez-form  mb-0 h-100" style="height:inherit;">
				<div class="h4 text-center">Izdvajamo sa menija:</div>
				<div class="mt-4 text-center" id="samenija"><?php echo $data->Info1?></div>
			</div>
		</div>
		<div class="col" style="height:inherit;">
			<div class="jumbotron rez-form  mb-0 h-100" style="height:inherit;">
				<div class="h4 text-center">Po cemu se razlikujemo od drugih:</div>
				<div class="mt-4 text-center" id="razlike"><?php echo $data->Info2?></div>
			</div>
		</div>
		<div class="col" style="height:inherit;">
			<div class="jumbotron rez-form  mb-0 h-100" style="height:inherit;">
				<div class="h4 text-center">Zasto da dodjete kod nas:</div>
				<div class="mt-4 text-center"><?php echo $data->Info3?></div>
			</div>
		</div>
	</div>
</div>
<!-- END IZDVAJAMO SA MENIA - PO CEMU SE RAZLIKUJEMO OD DRUGIH - ZASTO DA DODJETE KOD NAS -->	
		
	<div class="container my-4 mb-5 pt-4">
		<div class="h2 mb-4" ><?php echo $komentari!=NULL?' Komentari:':'<center><i>Trenutno ne postoji nijedan komentar...</i></center>'; ?></div>
	</div>