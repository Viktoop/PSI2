<!--Milos Stupar 0669/15-->
<!-- KOMENTAR -->
<div class="container jumbotron rez-form">
    <div class="row">
            <div class="col-sm-2">
                <img src="<?php if($AvatarPath != NULL) echo base_url('img/profil/'.$AvatarPath); else echo base_url('img/profil/account.jpg')?>" alt="..." class="img-thumbnail" id="userpic">
            </div>
            
            <div class="col-sm-8">
                <div class="h3" id="username"><?php echo $Username ?></div>
                <div class="text" id="komentar"><?php echo $Komentar ?></div>
            </div>
            
            <div class="col-sm-1 h5">Ocena:<?php echo $Ocena ?></div>
            <div class="col-sm-1 h5"><a  href="<?php echo site_url("Admin/obrisi_komentar/");?><?php echo $IDKomiOcena.'/'.$IDUO ?>"><i class="fas fa-trash-alt"></i></a></div>
    </div>
</div>	
<!-- END KOMENTAR -->