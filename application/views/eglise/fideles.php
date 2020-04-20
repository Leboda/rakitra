<div class="container-fluid">
    <div class="row clearfix">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header bg-red">
	                <h2>
	                   Mes fidèles
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
					                <table class="table table-bordered table-striped table-hover list-demande-personne dataTable">
					                    <thead>
					                        <tr>
					                            <th>Nom</th>
						    					<th>Adresse</th>
						    					<th>Tél</th>
						    					<th>E-mail</th>
						    					<th>Depot</th>
						    					<th>Status</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <?php foreach ($fidele as $f) { ?>
						    					<tr>
						    						<td><?php echo utf8_encode($f->nom); ?></td>
						    						<td><?php echo utf8_encode($f->adresse); ?></td>
						    						<td><?php echo utf8_encode($f->tel); ?></td>
						    						<td><?php echo utf8_encode($f->mail); ?></td>
						    						<td>Ar <?php echo utf8_encode($this->transactionModel->getAmountByIdFidele($f->id)); ?></td>
						    						<td><?php echo utf8_encode($this->transactionModel->getStatusByIdFidele($f->id)); ?></td>
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