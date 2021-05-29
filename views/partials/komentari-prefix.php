<!--Milos Stupar 0669/15-->
<div class="container">
	<div class="jumbotron px-0 py-1 my-4 mb-6">
		<!-- GALERIJA -->
		<div class="row mt-5 mb-1 ml-2">
			 <div class="col-5 ">
				<div id="carouselExampleControls" class="carousel slide  granica" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100 img-thumbnail" src="<?php echo base_url('img/restoran.jpg');?>" alt="First slide">
						</div>
					<div class="carousel-item">
						<img class="d-block w-100 img-thumbnail" src="<?php echo base_url('img/restoran.jpg');?>" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 img-thumbnail" src="<?php echo base_url('img/restoran.jpg');?>" alt="Third slide">
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
		<!-- </span> -->
		</div>
			<!-- INFO -->
		<div class="col-sm-7">
			<div class="row">
				<div class="col-sm-5 h2">
					Naziv Lokala 
				</div>
				<div class="col-sm-7 px-0">
					<div class="row h5">
						<span class="tag ml-2 px-3 py-1 bg-primary text-white">
							Kafić
						</span>
						<span class="tag ml-2 px-3 py-1 bg-light">
							Restoran
						</span>
						<span class="tag ml-2 px-3 py-1 bg-light">
							Brza hrana
						</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="row">
						<div class="h5 mx-2" id="ulica-lokala">
							<i class="fas fa-map-marker-alt mx-1"></i>Ulica i broj
						</div>
					</div>
					<div class="row h5 mx-0">
						<div class="my-2">Ocena:</div>
						<span class="tag text-white h2 ml-2 px-3 py-1 bg-success">
							<?php echo $ocena; ?>
						</span>			
					</div>
					<div class="row">
						<div class="h5 mx-3">
							Radno vreme:
						</div>
					</div>
					<div class="row col-sm-12 mx-0 px-0">
						<div class="row col-sm-12 mx-0 px-0">
							<div class="col-sm-4 px-0">pon-pet: </div>
							<div class="col-sm-8 px-0">09:00 - 23:00 </div>	
						</div>
						<div class="row col-sm-12 mx-0 px-0">
							<div class="col-sm-4 px-0">subota: </div>
							<div class="col-sm-8 px-0">09:00 - 23:00 </div>	
						</div>
						<div class="row col-sm-12 mx-0 px-0">
							<div class="col-sm-4 px-0">nedelja: </div>
							<div class="col-sm-8 px-0">09:00 - 23:00 </div>	
						</div>
					</div>
				</div>
				<div class="col-sm-5 px-0 ">
					<img class="img-fluid img-thumbnail w-100" src="<?php echo base_url('img/restoran.jpg');?>"  alt="First slide">
				</div>			
			</div>
		</div>
<!--------------------------------------  tagovi  ------------------------------------------>
		<div class="row mx-3 py-3">
					<div class="h5 mr-2">
						Tagovi:   
					</div>						
					<span class="tag text-white bg-info h5 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h5 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h5 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h5 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h5 ml-1 px-3">
						Kafić
					</span>
					<span class="tag text-white bg-info h5 ml-1 px-3">
						Kafić
					</span>
		</div>	



	<!--THUMBNAILOVI-->
		<div class="row justify-content-center">			
			<div class="col-sm-1 ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-1"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-2"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-3"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-4"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-5"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-6"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-7"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-8"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-9"></a></div>
				<div class="col-sm-1  ml-1 mr-1"><a href=""><img src="<?php echo base_url('img/restoran.jpg');?>" class="img-thumbnail img-fluid" alt="Cinque Terre" id="thumb-10"></a></div>	
			</div>	
		</div>			

		<!--Opis-->
		<div class="row justify-content-center">
			<div class="bg-white rounded p-3 mt-3 ml-5 mr-5 ">
				<div class="h3">Opis:</div>
				<div id="opis"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>
			</div>
		</div>
		<!--OSTALE-->
		<div class="row mt-4 mb-5 ml-5 mr-5 justify-content-center">
			<div class="col-sm-3 ml-4 mr-4 bg-primary text-light rounded jumbotron">
				<div >
					<div class="h3">Izdvajamo sa menija:</div>
					<div class="mt-3 text-center" id="samenija">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi</div>
				</div>
			</div>
			<div class="col-sm-3 ml-4 mr-4 jumbotron bg-primary text-light rounded">
				<div >
					<div class="h3">Po cemu se razlikujemo od drugih:</div>
					<div class="mt-3 text-center" id="razlike">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi</div>
				</div>
			</div>
		<div class="col-sm-3 ml-4 mr-4 jumbotron bg-primary text-light rounded">
				<div >
					<div class="h3">Zasto da dodjete kod nas:</div>
					<div class="mt-3 text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fi</div>
				</div>
			</div>
				
		</div>
		
		
		<!--Komentari-->
		
		
		<div class="containter-fluid mb-5 ml-5 mr-5 mt-5 justify-content-center">
			<div class="h2 mb-4" > Komentari:</div>
			