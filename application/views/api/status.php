<style type="text/css">
	.card{
		background-color: rgba(0,0,0,.125) !important;
	}
</style>
  	<h1><a href="#">Retour et apréciation</a></h1>
  	<br>


  	<div class="row text-left">
  		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
	        <div class="card">
	            <div class="header bg-red">
	                <h2 class="text-center">
	                   Status paiement offrande
	                </h2>
	            </div>
	            <div class="body">
	                <div class="message"></div>
	                <br>
	                <br>
				    <div class="row clearfix">
					    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		                  
					        
						  	<?php if (isset($fideleInfo) && !is_null($fideleInfo)) {
						    	foreach ($fideleInfo as $fidele) { ?>
						    		<p>Fidéle : <?php echo htmlentities($fidele->nom); ?></p>
						    	<?php }
						    } ?>
						    <?php if (isset($paiementInfo) && !is_null($paiementInfo)) {
						    	foreach ($paiementInfo as $p) { ?>
						    		<p>Status du paiement : <?php echo htmlentities($p->status); ?></p>
						    		<p>Montant : Ar <?php echo htmlentities($p->montant); ?></p>
						    		<p>Date paiement : <?php echo date('d-m-Y',$p->date); ?></p>
						    		<p>Mode paiement : <span style="color: orange;">Orange money</span></p>
						    	<?php }
						    } ?>
						    <br>
						    <br>
						    <p class="text-center">
						    	<a class="boutton" href="<?php echo base_url(); ?>">Retourner à la page d'accueil</a>
						    </p>
					    </div>
					</div> 
				</div>  
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
	        <div class="card">
	            <div class="header bg-red">
	                <h2 class="text-center">
	                   Eglise
	                </h2>
	            </div>
	            <div class="body">
	                <div class="message"></div>
	                <br>
	                <br>
				    <div class="row clearfix">
					    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		                  
					        <?php  if (isset($egliseInfo) && !is_null($egliseInfo)) { 
					  			foreach ($egliseInfo as $e) { ?>
					  				<p>L'eglise <?php echo htmlentities($e->nom); ?> vous remercie pour cette offrande.</p>
					  				<p>Gloire à dieu. </p>
					  		<?php } } ?>
					    </div>
					</div> 
				</div>  
			</div>
		</div>
  	</div>