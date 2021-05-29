<!--Viktor Galindo 0655/13-->
<?php
	$tagovi = array( 
		array_reverse( array('Bezalkoholna pica', 'Likeri', 'Vitaminski napici', 'Kokteli', 'Vina', 'Zestina', 'Kafa special', 'Craft pivo' ) ),
		array_reverse( array('Sendvici', 'Sushi', 'Pecenje', 'Obrok salate', 'Pizza', 'Rostilj', 'Dnevni meni', 'Kuvana jela' ) ),
		array_reverse( array('Splav', 'Chill', 'Ziva svirka', 'Balkon', 'Centar', 'Reka', 'Pogled', 'Basta' ) ),
		array_reverse( array('TV', 'Happy hour', 'Dostava', 'No Smoking zona', 'Baby oprema', 'Parking', 'Pet Frendly', 'WiFi' ) ),
	);
	$grupa = array('Pice:', 'Hrana', 'Ambijent','Ektra');
?>

<div id="np-content" style="min-height:100vh">
	<div class="container">
			<div class="naslov">
				Napredna pretraga
			</div>
			<div class="form-group mb-0">
				<div class="row">
<?php 
			for ($i=1; $i<=4 ; $i++) { 
				echo '
					<div class="col-lg-3 col-md-6">
						<div class="jumbotron np-form">
							<h1 class="h3">'.$grupa[$i-1].'</h1>
				';
				for ($j=1; $j<=8; $j++) { 
					echo '
							<div class="form-check np-polje">
								<input type="checkbox" class="np-checkbox form-check-input" id="s'.$i.'v'.$j.'" name="s'.$i.'v'.$j.'" value="'.pow(2,$j-1).'">
								<label class="form-check-label" for="s'.$i.'v'.$j.'">'.$tagovi[$i-1][$j-1].'</label>
							</div>
					';
				}
				echo '
						</div>
					</div>
				';
			}
?>
				</div>
			</div>
			<div class="nadji mt-0 pt-0">
				<span class="btn btn-primary btn-lg w-25 " id="pogledaj-rezultate">Pogledaj rezultate
					<br>
					<span style="font-size:70%">
						Broj rezulata: 
						<span id="count"></span>
					</span>
				</span>
			</div>
	</div>
</div>
<div id="vrati-na-vrh" class="h1 text-primary"><i class="fas fa-arrow-circle-up"></i></div>		
<div id="np-rezultati" style="min-height:100vh; disaply:none"></div>