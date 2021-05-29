<!--Milica Soljaga 0656/13-->
<div class="text-center h4 text-danger"><i>Na zalost nismo pronasli ni jedan lokal koji odgovara opisu. </i></div>
<div class="text-center h5 text-secondary pb-1"><i>Molimo, pokusajte opet... </i></div>

    
        <form action="<?php echo site_url('Gost/pretragaKeyWords'); ?>" method="post">
            <div class="col-md-4 ml-auto mr-auto mt-4 " >
            <input type="text" id="pretraga" name="pretraga" class="form-control">
            <div class="row">
                <button class="btn btn-primary text-white col-md-4 col-6 ml-auto mr-auto mt-2" type="submit">Pretrazi</button>
            </div>
            </div>
        </form>
    
	<div class="container my-4 ">
            <div class=" my-2 py-1 row justify-content-center">
                <div class="jumbotron mx-4 px-2 py-2 my-2 col-3">
                    <a class="dp" href="<?php echo site_url('Gost/pretragaRestorani');?>">
                        <img class= "d-block w-100" src=" <?php echo base_url('img/restoran-ico.jpg'); ?> " alt="">
                        <div class="h6 text-center mt-2 mb-0 col-12">Restorani</div>
                    </a>
                </div>
                <div class="jumbotron mx-4 px-2 py-2 my-2 col-3">
                    <a class="dp" href="<?php echo site_url('Gost/pretragaKafici');?>">
                        <img class= "d-block w-100" src=" <?php echo base_url('img/kafa.jpg'); ?> " alt="">
                        <div class="h6 text-center mt-2 mb-0 col-12">Kafici</div>
                    </a>
                </div>
                <div class=" jumbotron mx-4 px-2 py-2 my-2 col-3">
                    <a class="dp" href="<?php echo site_url('Gost/pretragaBrzaHrana');?>">
                        <img class= "d-block w-100" src=" <?php echo base_url('img/fast.jpg'); ?> " alt="">
                        <div class="h6 text-center mt-2 mb-0 col-12">Brza hrana</div>
                    </a>
                </div>
            </div>  
        </div>