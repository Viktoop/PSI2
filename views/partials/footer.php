<!--Milos Stupar 0669/15,Milica Soljaga 0656/13-->
<!-- FOOTER -->

<footer class = "bg-primary text-white fixed-bottom footer">
	<div> Tim Kasnioci &copy; 2019</div>
</footer>

<!-- END FOOTER -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<?php 
			if ( strpos($_SERVER['REQUEST_URI'], "/stranica_lokala") !== false )  {
				echo '<script src="'.base_url('js/galerija.js').'"></script>';
			}

			if ( strpos($_SERVER['REQUEST_URI'], "/napredna_pretraga") !== false )  {
				echo '<script src="'.base_url('js/npAJAX.js').'"></script>';
			}

			if ( strpos($_SERVER['REQUEST_URI'], "/spisak_uo") !== false )  {
				echo '<script src="'.base_url('js/spisak_uo.js').'"></script>';
			}
		?>
	</body>
</html>