<div class="container-fluid">
    <div class="row clearfix">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header bg-red">
	                <h2>
	                   Informations concernant l'Api orange
	                </h2>
	            </div>
	            <div class="body">
	                <div class="message"></div>
	                <br>
	                <br>
				    <div class="row clearfix">
		                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		                    <div class="card">
		                        <div class="header">
		                            <h2>
		                                API ORRANGE
		                                <small>Il est impermanent strict est reservé au super administrateur de modifier les informations de celle-ci.</small>
		                            </h2>
		                        
		                        </div>
		                        <div class="body">
		                        	<?php echo form_open(base_url().'update-api', array("class"=>"update-form-api validate-form","name"=>"update-form-api","id"=>"update-form-api","accept-charset"=>"utf-8")); ?>
			                            <?php foreach ($apiInfo as $api) {
			                            ?>
			                            	<input type="hidden" name="authorisation_user" class="authorisation_user">
			                            	<input type="hidden" value="<?php echo $api->id; ?>" name="id_api" class="id_api">
				                            <div class="row clearfix">
				                                <div class="col-sm-6">
				                                    <div class="form-group">
				                                        <div class="form-line focused">
				                                            <input type="text" class="form-control" value="<?php echo $api->application_id; ?>" name="application_id" placeholder="Id de l'application" required="" disabled/>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="col-sm-6">
				                                    <div class="form-group">
				                                        <div class="form-line">
				                                            <input type="text" class="form-control" value="<?php echo $api->client_id; ?>" name="client_id" placeholder="Id du client" disabled required=""/>
				                                        </div>
				                                    </div>
				                                </div>
				                            </div>
				                            <div class="row clearfix">
				                                <div class="col-sm-6">
				                                    <div class="form-group">
				                                        <div class="form-line">
				                                            <input type="text" class="form-control" value="<?php echo $api->client_secret; ?>" name="client_secret" disabled placeholder="Secret client" required=""/>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="col-sm-6">
				                                    <div class="form-group">
				                                        <div class="form-line">
				                                            <input type="text" class="form-control" value="<?php echo $api->basic_token; ?>" name="basic_token" placeholder="Jeton de base" disabled required=""/>
				                                        </div>
				                                    </div>
				                                </div>
				                            </div>
				                            <div class="row clearfix">
				                                <div class="col-sm-12">
				                                    <div class="form-group">
				                                        <div class="form-line">
				                                            <input type="text" class="form-control" value="<?php echo $api->marchant_key; ?>" name="marchant_key" disabled placeholder="Clé de Marchant" required=""/>
				                                        </div>
				                                    </div>
				                                </div>
				                            </div>
				                            <div class="text-center">
						                    	<input type="submit" name="submit" id="btn-update-api" value="Enregistrer" class="btn bg-pink btn-update-api" style="display: none;">
						                    </div>
			                            <?php 
			                            } ?>
		                            <?php echo form_close(); ?>
		                        </div>
		                    </div>
		                </div>
		            </div> 
				</div>  
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAsqAuthorization" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-red">
                <h4 class="modal-title" id="defaultModalLabel">
                    DEMANDE D'AUTOHRISATION<br>
                    <small style="color:#fff;" class="small-description-title">Verification du rôle super administrateur</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12">
                  	<h4 class="card-inside-title">Veuillez saisir votre code super administrateur</h4>
                    <div class="input-group">
                    	<span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                         	<input type="password" class="form-control code_super_admin" name="code_super_admin" placeholder="Code super administrateur" required="">
                        </div>
                    </div>   
                    <div class="message-admin-verif"></div>                     
                    <br>  
                    <div class="text-center">
                    	<input type="submit" name="submit" value="Soumettre" class="btn bg-pink btn-verif-code">
                    </div>                     
                    
                  </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect btn-close-modal" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>  
</div>