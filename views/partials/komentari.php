<!--Lazar Ristic 0658/15-->
<div class="row">
	<div class="col-sm-2">
		<img src="<?php echo base_url('img/restoran.jpg');?>" alt="..." class="img-thumbnail" id="userpic">
	</div>
	<div class="col-sm-7">
		<div class="h6" id="username">
            <?php echo $username; ?>
        </div>
		<div class="text py-1" id="komentar">
            <?php echo $komentar;?>
        </div>
	</div>
	<div class="col-sm-1-off h5">
        Ocena:<?php echo $ocena;?>
    </div>
</div>
<hr class="linija">
