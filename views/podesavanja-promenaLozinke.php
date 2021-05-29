<!--Milica Soljaga 0656/13,Viktor Galindo 0655/13-->
<!-- PROMENA LOZINKE -->
<div class="my-10 mx-10">
    <div class="h3 mt-5 mb-4 pl-5">Promena Lozinke: <i class="fas fa-key"></i></div>
    <form name="pass_change_form" action="<?php echo site_url('RK/promeni_password') ?>" method="post" >
        <div class="form-group row mb-1 mt-5">
        <label for="oldpass" class="col-sm-4 col-form-label text-right">Unesite staru lozinku:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control uo-polje" name="oldpass" id="oldpass" value="">
        </div>
        <div class='text-center' style='color:red; height:24px;'>
            <?php 
                $poruka = $this->session->userdata("oldpassporuka");
                if ($poruka != NULL) echo $poruka; 
            ?>
		</div>
        </div>
            <div class="form-group row mb-1 mt-5">
        <label for="newpass" class="col-sm-4 col-form-label text-right">Unesite novu lozinku:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control uo-polje" name="newpass" id="newpass" value="">
        </div>
        <div class='text-center' style='color:red; height:24px;'>
        <?php 
                $poruka = $this->session->userdata("passgreska");
                if ($poruka != NULL) echo $poruka; 
            ?>
        </div>
        </div>
            <div class="form-group row mb-1 mt-5">
        <label for="oldpass" class="col-sm-4 col-form-label text-right">Potvrdite novu lozinku:</label>
        <div class="col-sm-4">
            <input type="password" class="form-control uo-polje" name="confnewpass" id="confnewpass" value="">
        </div>
        <div class='text-center' style='color:red; height:24px;'>
        <?php 
                $poruka = $this->session->userdata("comppassgreska");
                if ($poruka != NULL) echo $poruka; 
            ?>
		</div>
        </div>
        <div class='text-center' style='color:green; height:24px;'>
        <?php 
                $poruka = $this->session->userdata("uspesnapromena");
                if ($poruka != NULL) echo $poruka; 
            ?>
		</div>
    <div class="form-group row mb-1 mt-5 justify-content-center">
        <button type="submit" class="btn btn-primary w-100 mt-3 col-sm-4">Promeni</button>
    </div>
    
    </form>
</div>