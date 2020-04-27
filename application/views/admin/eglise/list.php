<div class="container-fluid">
    <div class="row clearfix">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header bg-red">
	                <h2>
	                   Liste des eglises
	                </h2>
	            </div>
	            <div class="body">
	                <div class="message"></div>
	                <br>
	                <br>
				    <div class="row clearfix">
					    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		                  
					        <div class="body">
					            <div class="table-responsive">
					                <table class="table table-bordered table-striped table-hover list-eglise dataTable">
					                    <thead>
					                        <tr>
					                            <th>Nom</th>
						    					<th>Adresse</th>
						    					<th>Solde (En Ar)</th>
						    					<th></th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <?php foreach ($eglise as $e) { 
					                        	$action = "";
					                        	if ($this->compteModel->getAllByIdEglise($e->id) == 0) {
					                        		$action .= "";
					                        	}
					                        	else{
					                        		$action .= '<a href="#" onclick="verser(this,'.$e->id.');" class="btn bg-pink">Verser</a>';
					                        	}
					                        	?>
						    					<tr class="eglise-line">
						    						<td class="eglise-name"><?php echo utf8_encode($e->nom); ?></td>
						    						<td><?php echo utf8_encode($e->adresse); ?></td>
						    						<td class="amount_init"><?php echo utf8_encode($this->compteModel->getAllByIdEglise($e->id)); ?></td>
						    						<td><?php echo $action; ?></td>
						    						
						    					</tr>
						    				<?php } ?>
					                        
					                    </tbody>
					                </table>
					            </div>
					        </div>
					    </div>
					</div> 
				</div>  
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalVersement" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h4 class="modal-title" id="defaultModalLabel">
                    VERSEMENT<br>
                    <small style="color:#fff;" class="small-description-title">Versmement à l'eglise</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12">
                      
                    <?php echo form_open(base_url().'add-versement', array("class"=>"suivi-dossier-form validate-form","name"=>"suivi-dossier-form","id"=>"suivi-dossier-form","accept-charset"=>"utf-8")); ?>
                            <h3 class="card-inside-title">Choisisser le type de versement</h3>
                            <div class="demo-radio-button">
                                <input name="choix_versement" type="radio" value="all" id="radio_1" checked />
                                <label for="radio_1">Complet</label>
                                <input name="choix_versement" type="radio" value="partial" id="radio_2" />
                                <label for="radio_2">Partiel</label>
                            </div>
                            <h4 class="title_amount_partial" style="display: none;">Montant à verser <small class="max_amount"></small></h4>
                            <div class="input-group imput-partial-amount" style="display: none;">
                            	<span class="input-group-addon">Ar</span> 
                                <div class="form-line">

                                 	<input type="text" class="form-control amount_partial" name="amount_partial" placeholder="Veuillez saisir le montant à verser">
                                </div>
                            </div>
                            <div class="message_versement"></div>
                            <br>  
                            <div class="text-center">
                            	<input type="hidden" name="amountInit" class="amountInit">
                            	<input type="hidden" name="idEglise" class="idEglise">
		                    	<input type="submit" name="submit" value="Envoyer" class="btn bg-pink btn-add-versement">
		                    </div>                      
                    <?php echo form_close(); ?>
                  </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>  
</div>
