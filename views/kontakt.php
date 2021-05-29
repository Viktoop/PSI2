<!--Milos Stupar 0669/15-->
<!-- KONTAKT -->
<!-- KONTAKT OPIS -->
<div class="contact-content">
	<div class="container">
            <div class="jumbotron contact-form">
                <h1 class="text-center mb-3"> Kontakt </h1>
                <div class="row">
                    <div class="col 1 text-center">
                        <div class="col-md-5 ml-auto mr-auto mt-3 mb-4">
                            <img class= "d-block w-100" src=" <?php echo base_url('img/mail-kontakt.png'); ?> " alt="">
                        </div>
                        <h5>Ukoliko zelite da nas kontaktirate radi odobravanja ugostiteljskog objekta, zelite da uputite sugestiju, ili imate neko drugo pitanje, popunite formu sa desne strane i nas tim ce se potruditi da Vam odgovori u najkracem mogucem roku!</h5>
                    </div>
    <!-- END KONTAKT OPIS -->
    <!-- KONTAKT FORMA -->
                    <div class="col 1 mail-kontakt-border" >
                        <div class="ml-3 mt-0">
                             <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                                 <div class="row">
                                     <div class="col-md-11">
                                        <div class="md-form mb-0">
                                            <label for="name" class="mb-0">Ime:</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                        <div class="md-form mt-1">
                                            <label for="email" class="mb-0">e-mail:</label>
                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                        <div class="md-form mt-1">
                                            <label for="naslov" class="mb-0">Naslov:</label>
                                            <input type="text" id="naslov" name="naslov" class="form-control">
                                        </div>
                                        <div class="md-form mt-1">
                                            <label for="message">Poruka:</label>
                                            <textarea type="text" id="poruka" name="poruka" rows="2" class="form-control md-textarea"></textarea>
                                            
                                        </div>
                                        <div class="text-center text-md-left mt-3">
                                            <a class="btn btn-primary w-100 text-white" onclick="submit();">Posalji</a>
                                        </div>
                                    </div>
                                 </div>
                            </form>
                        </div>
    <!-- END KONTAKT FORMA --> 
                    </div>
                </div>
            </div>	
	</div>
</div>

