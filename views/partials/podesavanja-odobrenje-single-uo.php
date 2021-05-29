<div class="row px-3 py-4 my-3 jumbotron" style="border-radius:15px;">
				<div class="col-9"><?php echo ($data->Naziv); ?></div>
				<div class="col-1"> <a href="<?php echo site_url('Gost/stranica_lokala/'.$data->IDUO);?>"><i class="fas fa-eye"></i> </a> </div>
				<div class="col-1"> <a href="<?php echo site_url('Vlasnik/dodaj_uo/'.$data->IDUO);?>"><i class="fas fa-edit"></i> </a> </div>
				<div class="col-1"> <a href="<?php echo site_url('Admin/odobri_stranicu/'.$data->IDUO);?>"><i class="fas fa-check"></i></a> </div>
			</div>