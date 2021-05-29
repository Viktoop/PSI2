<!--Lazar Ristic 0658/15,Milos Stupar 0669/15-->
<input type="hidden" id="uoid" name="uoid" value="<?php $data->IDUO?>">
<a href="<?php echo site_url('Gost/stranica_lokala/'.$data->IDUO);?>" class="a"> 
			<div class="row rez-uo rez-form jumbotron py-3" >
				<div class="row">
					<div class="col-md-3 slika">
						<div class="col-sm-12  slika-korisnika">
							<img class="img-fluid img-thumbnail w-100"  src="<?php if(array_key_exists(1,$slika)) echo base_url('img/uo/'.$slika[1]); else echo base_url('img/restoran.jpg');  ?>" alt>
						</div>
					</div>
					<div class="col-md-9 mb-8 px">
						<div class="col-sm-12">
							<div class="col-sm">
								<div class="row">
									<div class=" col-sm-5">
										<div class="row">
											<div class="h4">
                                            <?php echo $data->Naziv;?>
											</div>
										</div>
										<div class="row h5 mt-1">
											Ocena:
											<span class="tag text-white h6 ml-2 px-3 py-1 bg-success">
                                            <?php if($data->AvgOcena != NULL){ echo $data->AvgOcena;} else { echo '0';}?>
											</span>
										</div>
									</div>	
									
									<div class="col-sm-7">
										<div class="row">
											<div class="h6">
                                                <?php echo $data->Adresa;?>
											</div>
										</div>
										<div class="row">
											<span class="tag h6 ml-2 px-3 py-1 bg-<?php if($data->JeRestoran) {echo 'primary text-white';}else{echo 'light';}?>">
												Restoran
											</span>
											<span class="tag h6 ml-2 px-3 py-1 bg-<?php if($data->JeKafic) {echo 'primary text-white';}else{echo 'light';}?>">
												Kafić
											</span>
											<span class="tag h6 ml-2 px-3 py-1 bg-<?php if($data->JeBrzaHrana) {echo 'primary text-white';}else{echo 'light';}?>">
												Brza hrana
											</span>
										</div>
									</div>		
								</div>
								<div class="row">
									<div class="col-sm-5">
										<div class="row">
											<div class="h5">
												Radno vreme:
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="row">
													<div class="h6">
														pon-pet:
													</div>
												</div>	
												<div class="row">
													<div class="h6">
														subota:
													</div>
												</div>
												<div class="row">
													<div class="h6">
														nedelja:
													</div>
												</div>
											</div>
											<div class="col-sm-6">
											<div class="row">
												<div class="h6">
                                                    <?php echo $data->PonPet;?>
												</div>
											</div>	
											<div class="row">
												<div class="h6">
                                                    <?php echo $data->Sub;?>
												</div>
											</div>
											<div class="row">
												<div class="h6">
                                                    <?php echo $data->Ned;?>
												</div>
											</div>
										</div>
										</div>
										
									</div>
									
									<div class="col-sm-7">
										<div class="row">
											<div class="h5">
												Opis:
											</div>
										</div>
										<div class="row">
											<p>
                                            <?php echo (substr($data->Opis,0,180)).'...';?>
											</p>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
				<div class="row">
					<div class="h5 mr-2">
						Tagovi:   
					</div>						
					<?php 
							$this->load->view('partials/tag.php',$tagovi);
					?>
				</div>	
			</div>
    </a> 

        

