<!--Lazar Ristic 0658/15,Milos Stupar 0669/15-->
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
<div class="my-5 mx-5">
	<div class="h3 mt-5 mb-4">Podaci o ugostiteljskom objektu: </div>
	<form method="post" name="UOform"  action=" <?php if($data['id'] != NULL) echo site_url('Vlasnik/ubaciUO/'.$data['id']); else  echo site_url('Vlasnik/ubaciUO');?> " enctype="multipart/form-data">
		<!-- NAZIV -->
		<div class="form-group row mb-1">
		<label for="naziv" class="col-sm-4 col-form-label text-right">Naziv:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control uo-polje" required id="naziv" name="naziv" value="<?php if($data['id'] != NULL) echo $data['naziv'];?>">
		
		</div>
		</div>

		<!-- ADRESA -->
		<div class="form-group row mb-1">
			<label for="adresa" class="col-sm-4 col-form-label text-right">Adresa:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control uo-polje" required id="adresa" name="adresa" value="<?php if($data['id'] != NULL) echo $data['adresa'];?>" >
			</div>
		</div>

		<!-- GOOGLE MAPS -->
		<div class="form-group row mb-1">
			<label for="gmaps" class="col-sm-4 col-form-label text-right">Google maps:</label>
			<div class="col-sm-4">
				<input type="text" class="form-control uo-polje" id="gmaps"  name="mapa" value="<?php if($data['id'] != NULL) echo $data['gmaps'];?>" >
			</div>
		</div>

		<!-- TIP UGOSTITELJSKOG OBJEKTA -->
		<div class="my-5 py-2 row jumbotron pl-3">
			<div class="h5 col-sm-4">Tip ugostiteljskog objekta: </div>
			<div class="col-sm-8">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="restoran"  name="restoran"<?php if($data['id'] != NULL) echo $data['jerestoran']==1?'checked':'' ?> value="1">
					<label class="form-check-label" for="restoran">Restoran</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="kafic" name="kafic" <?php if($data['id'] != NULL) echo $data['jekafic']==1?'checked':'' ?> value="1">
					<label class="form-check-label" for="kafic">Kafic</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" id="brza-hrana"  name="brza" <?php if($data['id'] != NULL) echo $data['jebrzahrana']==1?'checked':'' ?> value="1">
					<label class="form-check-label" for="brza-hrana">Brza hrana</label>
				</div>
			</div>
		</div>

		<!-- RADNO VREME -->
		<div class="py-2">
			<div class="h5">Radno vreme: </div>
			<div class="form-group row mb-1">
				<label for="naziv" class="col-sm-4 col-form-label text-right">Pon - Pet:</label>
				<div class="col-sm-4">
					<div class="row justify-content-center">
						<label for="nesto" class=" col-sm-1 col-form-label text-right mr-3">od: </label>
							<select class="form-control col-sm-3" name="ponpetOd" id="exampleFormControlSelect1" value="">
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='00'?'selected':''; ?> >00</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='01'?'selected':''; ?> >01</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='02'?'selected':''; ?> >02</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='03'?'selected':''; ?> >03</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='04'?'selected':''; ?> >04</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='05'?'selected':''; ?> >05</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='06'?'selected':''; ?> >06</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='07'?'selected':''; ?> >07</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='08'?'selected':''; ?> >08</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='09'?'selected':''; ?> >09</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='10'?'selected':''; ?> >10</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='11'?'selected':''; ?> >11</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='12'?'selected':''; ?> >12</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='13'?'selected':''; ?> >13</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='14'?'selected':''; ?> >14</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='15'?'selected':''; ?> >15</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='16'?'selected':''; ?> >16</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='17'?'selected':''; ?> >17</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='18'?'selected':''; ?> >18</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='19'?'selected':''; ?> >19</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='20'?'selected':''; ?> >20</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='21'?'selected':''; ?> >21</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='22'?'selected':''; ?> >22</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='23'?'selected':''; ?> >23</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][0]=='24'?'selected':''; ?> >24 </option>
							</select>
							<label for="nesto" class=" col-sm-1 col-form-label text-right mr-3">do: </label>
						<select class="form-control col-sm-3 " name="ponpetDo" id="exampleFormControlSelect1">
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='00'?'selected':''; ?> >00</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='01'?'selected':''; ?> >01</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='02'?'selected':''; ?> >02</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='03'?'selected':''; ?> >03</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='04'?'selected':''; ?> >04</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='05'?'selected':''; ?> >05</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='06'?'selected':''; ?> >06</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='07'?'selected':''; ?> >07</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='08'?'selected':''; ?> >08</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='09'?'selected':''; ?> >09</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='10'?'selected':''; ?> >10</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='11'?'selected':''; ?> >11</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='12'?'selected':''; ?> >12</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='13'?'selected':''; ?> >13</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='14'?'selected':''; ?> >14</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='15'?'selected':''; ?> >15</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='16'?'selected':''; ?> >16</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='17'?'selected':''; ?> >17</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='18'?'selected':''; ?> >18</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='19'?'selected':''; ?> >19</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='20'?'selected':''; ?> >20</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='21'?'selected':''; ?> >21</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='22'?'selected':''; ?> >22</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='23'?'selected':''; ?> >23</option>
									<option <?php if($data['id'] != NULL ) echo $data['ponpet'][1]=='24'?'selected':''; ?> >24 </option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group row mb-1">
				<label for="adresa" class="col-sm-4 col-form-label text-right">Subota:</label>
				<div class="col-sm-4">
				<div class="row justify-content-center">
						<label for="nesto" class=" col-sm-1 col-form-label text-right mr-3">od: </label>
							<select class="form-control col-sm-3 " name="subOd" id="exampleFormControlSelect1">
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='00'?'selected':''; ?> >00</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='01'?'selected':''; ?> >01</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='02'?'selected':''; ?> >02</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='03'?'selected':''; ?> >03</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='04'?'selected':''; ?> >04</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='05'?'selected':''; ?> >05</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='06'?'selected':''; ?> >06</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='07'?'selected':''; ?> >07</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='08'?'selected':''; ?> >08</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='09'?'selected':''; ?> >09</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='10'?'selected':''; ?> >10</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='11'?'selected':''; ?> >11</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='12'?'selected':''; ?> >12</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='13'?'selected':''; ?> >13</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='14'?'selected':''; ?> >14</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='15'?'selected':''; ?> >15</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='16'?'selected':''; ?> >16</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='17'?'selected':''; ?> >17</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='18'?'selected':''; ?> >18</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='19'?'selected':''; ?> >19</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='20'?'selected':''; ?> >20</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='21'?'selected':''; ?> >21</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='22'?'selected':''; ?> >22</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='23'?'selected':''; ?> >23</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][0]=='24'?'selected':''; ?> >24 </option>
							</select>
							<label for="nesto" class=" col-sm-1 col-form-label text-right mr-3">do: </label>
						<select class="form-control col-sm-3 " name="subDo" id="exampleFormControlSelect1">
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='00'?'selected':''; ?> >00</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='01'?'selected':''; ?> >01</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='02'?'selected':''; ?> >02</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='03'?'selected':''; ?> >03</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='04'?'selected':''; ?> >04</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='05'?'selected':''; ?> >05</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='06'?'selected':''; ?> >06</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='07'?'selected':''; ?> >07</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='08'?'selected':''; ?> >08</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='09'?'selected':''; ?> >09</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='10'?'selected':''; ?> >10</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='11'?'selected':''; ?> >11</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='12'?'selected':''; ?> >12</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='13'?'selected':''; ?> >13</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='14'?'selected':''; ?> >14</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='15'?'selected':''; ?> >15</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='16'?'selected':''; ?> >16</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='17'?'selected':''; ?> >17</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='18'?'selected':''; ?> >18</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='19'?'selected':''; ?> >19</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='20'?'selected':''; ?> >20</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='21'?'selected':''; ?> >21</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='22'?'selected':''; ?> >22</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='23'?'selected':''; ?> >23</option>
									<option <?php if($data['id'] != NULL ) echo $data['sub'][1]=='24'?'selected':''; ?> >24 </option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group row mb-1">
				<label for="gmaps" class="col-sm-4 col-form-label text-right">Nedelja:</label>
				<div class="col-sm-4">
				<div class="row justify-content-center">
						<label for="nesto" class=" col-sm-1 col-form-label text-right mr-3">od: </label>
							<select class="form-control col-sm-3 " name="nedOd" id="exampleFormControlSelect1">
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='00'?'selected':''; ?> >00</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='01'?'selected':''; ?> >01</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='02'?'selected':''; ?> >02</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='03'?'selected':''; ?> >03</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='04'?'selected':''; ?> >04</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='05'?'selected':''; ?> >05</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='06'?'selected':''; ?> >06</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='07'?'selected':''; ?> >07</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='08'?'selected':''; ?> >08</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='09'?'selected':''; ?> >09</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='10'?'selected':''; ?> >10</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='11'?'selected':''; ?> >11</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='12'?'selected':''; ?> >12</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='13'?'selected':''; ?> >13</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='14'?'selected':''; ?> >14</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='15'?'selected':''; ?> >15</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='16'?'selected':''; ?> >16</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='17'?'selected':''; ?> >17</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='18'?'selected':''; ?> >18</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='19'?'selected':''; ?> >19</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='20'?'selected':''; ?> >20</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='21'?'selected':''; ?> >21</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='22'?'selected':''; ?> >22</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='23'?'selected':''; ?> >23</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][0]=='24'?'selected':''; ?> >24 </option>
							</select>
							<label for="nesto" class=" col-sm-1 col-form-label text-right mr-3">do: </label>
						<select class="form-control col-sm-3 " name="nedDo" id="exampleFormControlSelect1">
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='00'?'selected':''; ?> >00</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='01'?'selected':''; ?> >01</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='02'?'selected':''; ?> >02</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='03'?'selected':''; ?> >03</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='04'?'selected':''; ?> >04</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='05'?'selected':''; ?> >05</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='06'?'selected':''; ?> >06</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='07'?'selected':''; ?> >07</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='08'?'selected':''; ?> >08</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='09'?'selected':''; ?> >09</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='10'?'selected':''; ?> >10</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='11'?'selected':''; ?> >11</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='12'?'selected':''; ?> >12</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='13'?'selected':''; ?> >13</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='14'?'selected':''; ?> >14</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='15'?'selected':''; ?> >15</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='16'?'selected':''; ?> >16</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='17'?'selected':''; ?> >17</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='18'?'selected':''; ?> >18</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='19'?'selected':''; ?> >19</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='20'?'selected':''; ?> >20</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='21'?'selected':''; ?> >21</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='22'?'selected':''; ?> >22</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='23'?'selected':''; ?> >23</option>
									<option <?php if($data['id'] != NULL ) echo $data['ned'][1]=='24'?'selected':''; ?> >24 </option>
						</select>
					</div>
				</div>
			</div>
		</div>

		<!-- TAGOVI -->
		<div class="py-2">
			<div class="h5 my-4">Tagovi:</div>
			<div class="form-group">
				<div class="row jumbotron">
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Pice:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v1" name="craft"<?php if($data['id'] != NULL) echo $tag['pice'][7]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v1">Craft pivo</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v2" name="kafaspec"<?php if($data['id'] != NULL) echo $tag['pice'][6]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v2">Kafa special</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v3" name="zestina"<?php if($data['id'] != NULL) echo $tag['pice'][5]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v3">Zestina</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v4" name="vina"<?php if($data['id'] != NULL) echo $tag['pice'][4]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v4">Vina</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v5" name="kokteli"<?php if($data['id'] != NULL) echo $tag['pice'][3]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v5">Kokteli</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v6" name="vitaminski"<?php if($data['id'] != NULL) echo $tag['pice'][2]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v6">Vitaminski napici</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v7" name="likeri"<?php if($data['id'] != NULL) echo $tag['pice'][1]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v7">Likeri</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s1v8" name="bezalkoholna"<?php if($data['id'] != NULL) echo $tag['pice'][0]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s1v8">Bezalkoholna pica</label>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Hrana:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v1" name="kuvana"<?php if($data['id'] != NULL) echo $tag['hrana'][7]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s2v1">Kuvana jela</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v2" name="dnevni"<?php if($data['id'] != NULL) echo $tag['hrana'][6]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s2v2">Dnevni meni</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v3" name="rostilj"<?php if($data['id'] != NULL) echo $tag['hrana'][5]==1?'checked':'';?>  value="1">
							<label class="form-check-label" for="s2v3">Rostilj</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v4" name="pizza"<?php if($data['id'] != NULL) echo $tag['hrana'][4]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s2v4">Pizza</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v5" name="salate"<?php if($data['id'] != NULL) echo $tag['hrana'][3]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s2v5">Obrok salate</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v6" name="pecenje"<?php if($data['id'] != NULL) echo $tag['hrana'][2]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s2v6">Pecenje</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v7" name="sushi"<?php if($data['id'] != NULL) echo $tag['hrana'][1]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s2v7">Sushi</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s2v8" name="sendvici"<?php if($data['id'] != NULL) echo $tag['hrana'][0]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s2v8">Sendvici</label>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Ambijent:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v1" name="basta"<?php if($data['id'] != NULL) echo $tag['ambijent'][7]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v1">Basta</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v2" name="pogled"<?php if($data['id'] != NULL) echo $tag['ambijent'][6]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v2">Pogled</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v3" name="reka"<?php if($data['id'] != NULL) echo $tag['ambijent'][5]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v3">Reka</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v4" name="centar"<?php if($data['id'] != NULL) echo $tag['ambijent'][4]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v4">Centar</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v5" name="balkon"<?php if($data['id'] != NULL) echo $tag['ambijent'][3]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v5">Balkon</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v6" name="svirka"<?php if($data['id'] != NULL) echo $tag['ambijent'][2]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v6">Ziva svirka</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v7" name="chill"<?php if($data['id'] != NULL) echo $tag['ambijent'][1]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v7">Chill</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s3v8" name="splav"<?php if($data['id'] != NULL) echo $tag['ambijent'][0]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s3v8">Splav</label>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 my-3">
						<h1 class="h3">Extra:</h1>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v1" name="wifi"<?php if($data['id'] != NULL) echo $tag['ekstra'][7]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v1">WiFi</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v2" name="pet"<?php if($data['id'] != NULL) echo $tag['ekstra'][6]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v2">Pet Frendly</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v3" name="parking" <?php if($data['id'] != NULL) echo $tag['ekstra'][5]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v3">Parking</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v4" name="baby" <?php if($data['id'] != NULL) echo $tag['ekstra'][4]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v4">Baby oprema</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v5" name="nosmoking"<?php if($data['id'] != NULL) echo $tag['ekstra'][3]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v5">No Smoking zona</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v6" name="dostava"<?php if($data['id'] != NULL) echo $tag['ekstra'][2]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v6">Dostava</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v7" name="happy"<?php if($data['id'] != NULL) echo $tag['ekstra'][1]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v7">Happy hour</label>
						</div>
						<div class="form-check np-polje">
							<input type="checkbox" class="form-check-input" id="s4v8" name="tv"<?php if($data['id'] != NULL) echo $tag['ekstra'][0]==1?'checked':'';?> value="1">
							<label class="form-check-label" for="s4v8">TV</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- SLIKE -->
		<div class="py-2">
			<div class="h5 mb-5">Slike: </div>

			<!-- PRVI RED SLIKA -->
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(1,$slika)) echo base_url('img/uo/'.$slika[1]); else echo base_url('img/restoran.jpg'); ?>" alt="" id="slika1">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika1"  onchange="previewImage('slika1','slika1src');" id="slika1src">
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(2,$slika)) echo base_url('img/uo/'.$slika[2]); else echo base_url('img/restoran.jpg');  ?>" alt="" id="slika2">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit"  name="slika2" onchange="previewImage('slika2','slika2src');" id="slika2src">
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(3,$slika)) echo base_url('img/uo/'.$slika[3]); else echo base_url('img/restoran.jpg');  ?> " alt="" id="slika3">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika3" onchange="previewImage('slika3','slika3src');" id="slika3src">
						</div>
					</div>
				</div>
			</div>

			<!-- DRUGI RED SLIKA -->
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src="  <?php if(array_key_exists(4,$slika)) echo base_url('img/uo/'.$slika[4]); else echo base_url('img/restoran.jpg');  ?>" alt="" id="slika4">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika4" onchange="previewImage('slika4','slika4src');" id="slika4src">
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(5,$slika)) echo base_url('img/uo/'.$slika[5]); else echo base_url('img/restoran.jpg');  ?>" alt="" id="slika5">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika5" onchange="previewImage('slika5','slika5src');" id="slika5src">
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(6,$slika)) echo base_url('img/uo/'.$slika[6]); else echo base_url('img/restoran.jpg');  ?>" alt="" id="slika6">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika6" onchange="previewImage('slika6','slika6src');" id="slika6src">
						</div>
					</div>
				</div>
			</div>

			<!-- TRECI RED SLIKA -->
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(7,$slika)) echo base_url('img/uo/'.$slika[7]); else echo base_url('img/restoran.jpg');  ?>" alt="" id="slika7">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika7" onchange="previewImage('slika7','slika7src');" id="slika7src">
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(8,$slika)) echo base_url('img/uo/'.$slika[8]); else echo base_url('img/restoran.jpg');  ?>" alt="" id="slika8">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika8" onchange="previewImage('slika8','slika8src');" id="slika8src">
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="row">
						<div class="col-sm-12">
							<img class= "img-fluid" src=" <?php if(array_key_exists(9,$slika)) echo base_url('img/uo/'.$slika[9]); else echo base_url('img/restoran.jpg');  ?>" alt="" id="slika9">
						</div>
						<div class="col-sm-12">
								<input class="btn btn-primary py-2" type="file" style="width:inherit" name="slika9" onchange="previewImage('slika9','slika9src');" id="slika9src">
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- OPIS -->
		<div class="pt-5 pb-2">
				<div class="h5 mb-3">Opis:</div>
				<textarea class="w-100 ml-3"  id="opis" rows="10" name="opis"><?php if($data['id'] != NULL) echo $data['opis']?></textarea>
		</div>

		<!-- IZDVAJAMO SA MENIA -->
		<div class="pt-5 pb-2">
			<div class="h5 mb-3">Izdvajamo sa menia:</div>
			<textarea class="w-100 ml-3"  id="info1" rows="10" name="samenija"><?php if($data['id'] != NULL) echo $data['info1']?></textarea>
		</div>

		<!-- PO CEMU SE RAZLIKUJEMO OD DRUGIH -->
		<div class="pt-5 pb-2">
				<div class="h5 mb-3">Po cemu se razlikujemo od drugih:</div>
				<textarea class="w-100 ml-3"  id="info2" rows="10" name="razlike" ><?php if($data['id'] != NULL) echo $data['info2']?></textarea>
		</div>

		<!-- ZASTO TREBA DA DODJETE KOD NAS -->
		<div class="pt-5 pb-2">
			<div class="h5 mb-3">Zasto treba da dodjete kod nas:</div>
			<textarea class="w-100 ml-3"  id="info3" rows="10" name="zasto"><?php if($data['id'] != NULL) echo $data['info3']?></textarea>
		</div>

		<div class="row py-5">
			<div class="col-md-6">
					<button  type="submit" class="btn btn-primary w-100 my-3 py-3" name="sacuvaj">
						<i class="fas fa-save mx-2"></i>
						Sacuvaj izmene
					</button>
			</div>
			<div class="col-md-6">
					<button class="btn btn-primary w-100 my-3 py-3" name="odbaci">
						<i class="fas fa-eraser mx-2"></i>
						Odbaci izmene
					</button>
			</div>
		</div>
	</form>
</div>	
