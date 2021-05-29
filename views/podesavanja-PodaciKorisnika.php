<!--Viktor Galindo 0655/13-->
<!-- FUNKCIJA KOJA postavlja preview slike kada se klikne da se promeni-->
<script>
function previewImage(idslike,imefajla) {
    document.getElementById(idslike).style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById(imefajla).files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById(idslike).src = oFREvent.target.result;
    };
  };
</script>
			<!-- OVDE IDE KOD ZA RAZLICITE STRANICE UNUTAR PODESAVANJA -->
			<div class="my-5 mx-5">
				<div class="h3 mt-5 mb-4">
					Podaci korisnika:
				</div>
				<div class="py-4">
					<form method="post" name="userForm"  action=" <?php echo site_url('RK/promeni'); ?> " enctype="multipart/form-data">
						<div class="row">
						<div class="col-md-3 mb-3 px">
							<div class="col-sm-12  slika-korisnika">
								<img class="img-fluid img-thumbnail" src="<?php echo $data; ?>" id="profilna">
							</div>
							<div class="row">
							<div class="col-sm-12">
								<input class="btn btn-primary" type="file" style="width:inherit" name="profilnasrc" id="profilnasrc" onchange="previewImage('profilna','profilnasrc');">
							</div>
							</div>
						</div>
						</div>
						<div class="row py-5">
							<div class="col-md-6">
									<button class="btn btn-primary w-100 my-3 py-3">
										<i class="fas fa-save mx-2"></i>
										Sačuvaj izmene
									</button>
							</div>
							<div class="col-md-6">
									<button class="btn btn-primary w-100 my-3 py-3">
										<i class="fas fa-eraser mx-2"></i>
										Odbaci izmene
									</button>
							</div>
						</div>
					</form>
				</div>
			</div>



<!-- FOOTER -->

