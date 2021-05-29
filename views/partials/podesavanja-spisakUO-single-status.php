<!--Viktor Galindo 0655/13-->
<div class="row px-3 py-0 mt-4 uo-vidljivost">
		<div class="col">
			<a class="a" href="<?php echo site_url('Vlasnik/postavi_vidljiva/'.$data->IDUO);?>">
				<span   
						name = "radio-status<?php echo($data->IDUO); ?>" 
						id = "radio11" 
						class="
							w-100
							btn 	
							<?php 
								if($data->Vidljivost == 1) echo 'btn-primary';
							else echo 'btn-outline-secondary';
							?>
						"
				> 
				Javna
				</span>
			</a> 
		</div>
		<div class="col">
			<a class="a" href="<?php echo site_url('Vlasnik/postavi_privatna/'.$data->IDUO);?>">
				<span  
					name = "radio-status<?php echo($data->IDUO); ?>" 
					id = "radio12" 
					class="
						btn
						w-100
						<?php 
							if($data->Vidljivost == 0) echo'btn-primary';
							else echo 'btn-outline-secondary';
						?>
					"
				>  
				Privatna 
				</span>
			</a> 
		</div>
	</div>