<div class="container-fluid">
    <div class="row clearfix">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header bg-red">
	                <h2>
	                   Liste des versement effectués
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
					                <table class="table table-bordered table-striped table-hover list-versement dataTable">
					                    <thead>
					                        <tr>
						    					<th>Eglise</th>
					                            <th>Montant initial</th>
						    					<th>Montant versé</th>
						    					<th>Date operation</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <?php foreach ($versement as $v) { ?>
						    					<tr>
						    						<td><?php echo utf8_encode($this->egliseModel->getNameById($v->id_eglise)); ?></td>
						    						<td><?php echo utf8_encode($v->montant_initial); ?></td>
						    						<td><?php echo utf8_encode($v->montant_verser); ?></td>
						    						<td><?php echo utf8_encode(date('d-m-Y',$v->date)); ?></td>
						    						
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