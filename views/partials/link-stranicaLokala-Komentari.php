<!--Milica Soljaga 0656/13-->
<div class="container mt-5">
	<div class="row mt-3">
		<div class="h4"> 
			Ostavite komentar:
		</div>
	</div>
	<form id="komentar" name="komentari" action="<?php echo site_url('RK/upis_komentara') ?>" method="post">
		<input type="hidden" id="uoid" name="uoid" value="<?php echo $ID ?>">
		<div class="row mt-2">
			<div class="col-md-11">
				<div class="form-group">
					<textarea class="form-control granica-3" required name="comment" rows="6" id="comment"></textarea>
				</div>
			</div>
			<div class="col-sm-1">
				<div class="h5">
						Ocena:
				</div>
				<select class="form-control px-2" name="ocena" id="exampleFormControlSelect1">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
		</div>
		<div class="row mt-1 mb-5 justify-content-center">
			<div class="col-md-4 align-self-center">
				<button type="submit" class="btn btn-primary btn-block mb-5">Posalji</button>
			</div>
		</div>
	</form>
</div>